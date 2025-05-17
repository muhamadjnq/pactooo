<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Services\OxaPayService;

class PaymentController extends Controller
{
  protected $oxaPay;

  public function __construct(OxaPayService $oxaPay)
  {
      $this->oxaPay = $oxaPay;
  }

    public function index()
    {
        $categories = Category::with('products')->get();
        $payments = Payment::where('user_id', auth()->id())->latest()->get();
        return view('user.payments.index', compact('payments','categories'));
    }

    public function show(Payment $payment)
    {
        $order = Order::where('id', $payment->order_id)->first();
        $categories = Category::with('products')->get();
        if ($payment->user_id !== auth()->id()) {
            abort(403);
        }
        return view('user.payments.show', compact('payment','categories','order'));
    }

    public function checkout(Order $order)
    {
        $categories = Category::with('products')->get();
        if ($order->status !== 'pending') {
            return redirect()->route('user.orders.index')->with('error', 'این سفارش قابل پرداخت نیست.');
        }

        // اطلاعات پرداخت
        $amount = $order->final_price ?: $order->total_price; // مبلغ به تومان
        $taxAmount = $amount * 0.2;
        $finalAmount = $amount + $taxAmount;

        $callbackUrl = route('user.payment.callback'); // آدرس بازگشت از درگاه

        // ارتباط با درگاه (برای مثال زرین‌پال)
        $response = Http::post('https://api.zarinpal.com/pg/v4/payment/request.json', [
            'merchant_id' => 'fe85a6ed-2911-42dd-9990-838410595219',
            'amount' => $finalAmount * 10, // تبدیل تومان به ریال
            'callback_url' => $callbackUrl,
            'description' => "پرداخت سفارش شماره {$order->id}",
        ]);

        $result = $response->json();

        if (isset($result['data']['code']) && $result['data']['code'] === 100) {
          // ذخیره تراکنش
          Payment::create([
              'user_id' => auth()->id(),
              'order_id' => $order->id,
              'campaign_id' => $campaign->id ?? null,
              'amount' => $finalAmount,
              'status' => 'pending',
              'transaction_id' => $result['data']['authority'],
              'gateway' => 'zarinpal',
          ]);
          // هدایت به درگاه
          return redirect('https://www.zarinpal.com/pg/StartPay/' . $result['data']['authority']);
        } else {
            // خطای نامشخص در اتصال به درگاه
            return redirect()->back()->with('error', $result['errors']['message'] ?? 'مشکلی در اتصال به درگاه پرداخت پیش آمد.');
        }
    }
    public function checkoutWithCrypto(Order $order)
    {
    $response = Http::get('https://api.bitpin.org/v4/mkt/prices/');
    if ($response->successful()) {
        $data = $response->json();
        $usdtIrt = collect($data)->firstWhere('code', 'USDT_IRT');
        if ($usdtIrt && isset($usdtIrt['price'])) {
            $price = $usdtIrt['price'];
        } else {
            return 'داده‌های مربوط به نماد USDT_IRT یافت نشد.';
        }
    } else {
        return 'خطا در دریافت اطلاعات از API.';
    }
    $categories = Category::with('products')->get();
    if ($order->status !== 'pending') {
        return redirect()->route('user.orders.index')->with('error', 'این سفارش قابل پرداخت نیست.');
    }
    $url = 'https://api.oxapay.com/merchants/request';
    // اطلاعات پرداخت
    $amount = $order->final_price ?: $order->total_price; // مبلغ به تومان
    $usdtamount = $amount / $price;
    $currency = 'USDT'; // ارز دیجیتال مورد نظر (مثلاً TRX، BTC، یا USDT)
    $callbackUrl = route('user.crypto.callback'); // آدرس بازگشت از درگاه
    $returnUrl = route('user.orders.index'); // آدرس بازگشت موفق
    $description = "پرداخت سفارش شماره {$order->id}";
    $orderId = "ORD-{$order->id}";
    $email = auth()->user()->email; // ایمیل کاربر
    // درخواست به OxaPay
    $data = array(
      'merchant' => 'VCYPND-T5Y2UA-BH3AL9-4P2PW6',
      'amount' => $usdtamount,
      'currency' => $currency,
      'lifeTime' => 30, // مدت زمان پرداخت به دقیقه
      'feePaidByPayer' => 0, // پرداخت کارمزد توسط کاربر
      'underPaidCover' => 2.5, // حداقل پوشش اختلاف پرداخت
      'callbackUrl' => $callbackUrl,
      'returnUrl' => $returnUrl,
      'description' => $description,
      'orderId' => $orderId,
      'email' => $email
    );

      $options = array(
        'http' => array(
            'header' => 'Content-Type: application/json',
            'method'  => 'POST',
            'content' => json_encode($data),
        ),
      );

      $context  = stream_context_create($options);
      $response = file_get_contents($url, false, $context);
      $result = json_decode($response);

    if (isset($result->payLink)) {
        // ذخیره تراکنش
        Payment::create([
            'user_id' => auth()->id(),
            'order_id' => $order->id,
            'campaign_id' => $campaign->id ?? null,
            'amount' => $usdtamount,
            'status' => 'pending',
            'transaction_id' => $result->trackId,
            'gateway' => 'oxapay',
        ]);

        // هدایت به درگاه
        return redirect($result->payLink);
    } else {
        // خطای اتصال به درگاه
        return redirect()->back()->with('error', $result->errors->message ?? 'مشکلی در اتصال به درگاه پرداخت پیش آمد.');
    }
}

    public function callback(Request $request)
    {
        $categories = Category::with('products')->get();
        $authority = $request->input('Authority');
        $status = $request->input('Status');

        // بررسی پرداخت
        $payment = Payment::where('transaction_id', $authority)->firstOrFail();

        if ($status === 'OK') {
            // تایید پرداخت
            $response = Http::post('https://api.zarinpal.com/pg/v4/payment/verify.json', [
                'merchant_id' => 'YOUR_MERCHANT_ID',
                'authority' => $authority,
                'amount' => $payment->amount * 10,
            ]);

            $result = $response->json();

            if ($result['data']['code'] === 100) {
                // به‌روزرسانی وضعیت پرداخت
                $payment->update(['status' => 'success']);

                // تغییر وضعیت سفارش
                $payment->order->update(['status' => 'confirmed']);

                return redirect()->route('user.orders.index')->with('success', 'پرداخت با موفقیت انجام شد.');
            }
        }

        // پرداخت ناموفق
        $payment->update(['status' => 'failed']);
        return redirect()->route('user.orders.index')->with('error', 'پرداخت انجام نشد.');
    }

    public function cryptocallback(Request $request)
    {
    // دریافت اطلاعات بازگشتی از درگاه
    $transactionId = $request->input('payment_id');
    $status = $request->input('status');
    // پیدا کردن تراکنش در دیتابیس
    $payment = Payment::where('transaction_id', $transactionId)->first();
    if ($payment) {
        if ($status === 'success') {
            $payment->update([
                'status' => 'success',
            ]);
            // به‌روزرسانی وضعیت سفارش
            $payment->order->update(['status' => 'paid']);
            return redirect()->route('user.orders.index')->with('success', 'پرداخت با موفقیت انجام شد.');
        } else {
            $payment->update([
                'status' => 'failed',
            ]);
            return redirect()->route('user.orders.index')->with('error', 'پرداخت انجام نشد.');
        }
    }
    return redirect()->route('user.orders.index')->with('error', 'تراکنش معتبر یافت نشد.');
}
}
