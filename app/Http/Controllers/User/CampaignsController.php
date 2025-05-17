<?php

namespace App\Http\Controllers\User;

use App\Models\Campaign;
use App\Models\Product;
use App\Models\Category;
use App\Models\Payment;
use App\Models\CampaignReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CampaignProduct;
use Illuminate\Support\Facades\Http;
use Morilog\Jalali\Jalalian;
use App\Utils\PersianNumberConverter;

class CampaignsController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $campaigns = Campaign::with('products')->latest()->paginate(15);
        return view('user.campaign.index', compact('campaigns','categories'));
    }
    public function example()
    {
        $categories = Category::with('products')->get();
        $campaigns = Product::where('type', 'campaign')->distinct()->get();
        return view('user.campaign.example', compact('campaigns','categories'));
    }

    public function create()
    {
        $categories = Category::with('products')->get();
        $products = Product::all();
        return view('user.campaign.create', compact('products','categories'));
    }
    public function store(Request $request)
    {
      $validated = $request->validate([
        'selected_products' => 'required|string', // اعتبارسنجی برای محصولات انتخاب‌شده
    ]);
    $jalalistartdate = $request->input('start_date'); // مثال: ۱۴۰۳/۱۰/۰۶
    $jalalienddate = $request->input('end_date');
    $startDate = PersianNumberConverter::toEnglish($jalalistartdate);
    $endDate = PersianNumberConverter::toEnglish($jalalienddate);
    $start = Jalalian::fromFormat('Y/m/d', $startDate);
    $starting = $start->toCarbon()->format('Y-m-d');
    $end = Jalalian::fromFormat('Y/m/d', $endDate);
    $ending = $end->toCarbon()->format('Y-m-d');
      // گرفتن محصولات انتخابی از درخواست
    $productIds = json_decode($validated['selected_products'], true);
    // محاسبه جمع قیمت محصولات انتخابی
    $totalBudget = Product::whereIn('id', $productIds)->sum('price');
    $campaign = Campaign::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'budget' => $totalBudget, // ذخیره بودجه محاسبه‌شده
        'start_date' => $starting,
        'end_date' => $ending,
        'content_link' => $request->input('content_link'),
        'goal' => $request->input('goal'),
        'message' => $request->input('message'),
    ]);
      // ذخیره محصولات مرتبط
      $campaign->products()->sync($productIds);
      return redirect()->route('user.campaigns.index')->with('success', 'کمپین با موفقیت ذخیره شد.');
    }
    public function removeProduct($campaignId, $productId)
    {
      dd('ok');
        try {
            // پیدا کردن کمپین
            $campaign = Campaign::findOrFail($campaignId);

            // بررسی اینکه محصول به این کمپین تعلق دارد
            if (!$campaign->products()->where('products.id', $productId)->exists()) {
                return response()->json(['success' => false, 'message' => 'محصول مورد نظر در این کمپین یافت نشد.'], 404);
            }

            // حذف محصول از کمپین
            $campaign->products()->detach($productId);

            return response()->json(['success' => true, 'message' => 'محصول با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'خطایی در سرور رخ داد.'], 500);
        }
    }
    public function show($id)
    {
      $categories = Category::with('products')->get();
      // یافتن کمپین با محصولات مرتبط
    $campaign = Campaign::with('products')->findOrFail($id);
    return view('user.campaign.show', compact('campaign','categories'));;
    }

    public function getCampaignReports($campaignId)
    {
      $campaign = Campaign::with('reports')->findOrFail($campaignId);
      return response()->json($campaign);
    }
    public function loadCategories()
    {
        // دریافت همه دسته‌بندی‌ها
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    public function loadProducts(Request $request)
    {

      $categoryId = $request->query('category_id');
      $type = $request->query('type');
      $category = Category::where('id', $categoryId)
          ->with(['products' => function ($query) {
              $query->distinct();
          }])
          ->firstOrFail();
      $typeProducts = $category->products()->where('type', $type)->distinct()->get();
      return response()->json(['products' => $typeProducts]);
    }

      public function checkout(Campaign $campaign)
      {
          // بررسی وضعیت کمپین
          if ($campaign->status !== 'pending') {
              return redirect()->route('user.campaigns.index')->with('error', 'این کمپین قابل پرداخت نیست.');
          }
          // اطلاعات پرداخت
          $amount = $campaign->budget; // بودجه کمپین به تومان
          $taxAmount = $amount * 0.2; // محاسبه مالیات ۲۰ درصد
          $finalAmount = $amount + $taxAmount;
          $callbackUrl = route('user.campaigns.callback'); // آدرس بازگشت از درگاه
          // ارتباط با درگاه (برای مثال زرین‌پال)
          $response = Http::post('https://api.zarinpal.com/pg/v4/payment/request.json', [
              'merchant_id' => 'fe85a6ed-2911-42dd-9990-838410595219', // جایگزین با کد مرچنت خود
              'amount' => $finalAmount * 10, // تبدیل تومان به ریال
              'callback_url' => $callbackUrl,
              'description' => "پرداخت کمپین شماره {$campaign->id}",
          ]);
          $result = $response->json();
          if (isset($result['data']['code']) && $result['data']['code'] === 100) {
              // ذخیره تراکنش
              Payment::create([
                  'user_id' => auth()->id(),
                  'campaign_id' => $campaign->id, // اگر مربوط به کمپین است
                  'order_id' => $order->id ?? null, // اگر مربوط به سفارش است
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
      public function paymentCallback(Request $request)
      {
          $transactionId = $request->input('Authority');
          $status = $request->input('Status');
          $payment = Payment::where('transaction_id', $transactionId)->first();
          if (!$payment) {
              return redirect()->route('user.campaigns.index')->with('error', 'تراکنش یافت نشد.');
          }
          if ($status === 'OK') {
              // تایید تراکنش با درگاه
              $response = Http::post('https://api.zarinpal.com/pg/v4/payment/verify.json', [
                  'merchant_id' => 'fe85a6ed-2911-42dd-9990-838410595219', // مرچنت
                  'amount' => $payment->amount * 10, // مبلغ به ریال
                  'authority' => $transactionId,
              ]);
              $result = $response->json();
              if (isset($result['data']['code']) && $result['data']['code'] === 100) {
                  // به‌روزرسانی وضعیت کمپین
                  $payment->update(['status' => 'completed']);
                  $payment->campaign->update(['status' => 'active', 'is_paid' => true]);

                  return redirect()->route('user.campaigns.index')->with('success', 'پرداخت با موفقیت انجام شد.');
              }
          }
          // تراکنش ناموفق
          $payment->update(['status' => 'failed']);
          return redirect()->route('user.campaigns.index')->with('error', 'پرداخت ناموفق بود.');
      }

      public function checkoutWithCrypto(Campaign $campaign)
      {
          // دریافت نرخ ارز دیجیتال (USDT به IRT)
          $response = Http::get('https://api.bitpin.org/v4/mkt/prices/');
          if ($response->successful()) {
              $data = $response->json();
              $usdtIrt = collect($data)->firstWhere('code', 'USDT_IRT');
              if ($usdtIrt && isset($usdtIrt['price'])) {
                  $price = $usdtIrt['price'];
              } else {
                  return redirect()->back()->with('error', 'داده‌های مربوط به نماد USDT_IRT یافت نشد.');
              }
          } else {
              return redirect()->back()->with('error', 'خطا در دریافت اطلاعات از API.');
          }

          // اطمینان از وضعیت کمپین
          if ($campaign->status !== 'pending') {
              return redirect()->route('user.campaigns.index')->with('error', 'این کمپین قابل پرداخت نیست.');
          }

          $url = 'https://api.oxapay.com/merchants/request';

          // محاسبه مبلغ به USDT
          $amount = $campaign->budget; // مبلغ بودجه کمپین به تومان
          $usdtAmount = $amount / $price;
          $currency = 'USDT'; // ارز دیجیتال مورد نظر
          $callbackUrl = route('user.campaigns.crypto.callback'); // آدرس بازگشت از درگاه
          $returnUrl = route('user.campaigns.index'); // آدرس بازگشت موفق
          $description = "پرداخت کمپین شماره {$campaign->id}";
          $orderId = "CMP-{$campaign->id}";
          $email = auth()->user()->email; // ایمیل کاربر

          // داده‌های درخواست به OxaPay
          $data = [
              'merchant' => 'VCYPND-T5Y2UA-BH3AL9-4P2PW6',
              'amount' => $usdtAmount,
              'currency' => $currency,
              'lifeTime' => 30, // مدت زمان پرداخت به دقیقه
              'feePaidByPayer' => 0, // پرداخت کارمزد توسط کاربر
              'underPaidCover' => 2.5, // حداقل پوشش اختلاف پرداخت
              'callbackUrl' => $callbackUrl,
              'returnUrl' => $returnUrl,
              'description' => $description,
              'orderId' => $orderId,
              'email' => $email,
          ];

          // ارسال درخواست به OxaPay
          $options = [
              'http' => [
                  'header' => 'Content-Type: application/json',
                  'method' => 'POST',
                  'content' => json_encode($data),
              ],
          ];

          $context = stream_context_create($options);
          $response = file_get_contents($url, false, $context);
          $result = json_decode($response);

          if (isset($result->payLink)) {
              // ذخیره تراکنش
              Payment::create([
                  'user_id' => auth()->id(),
                  'campaign_id' => $campaign->id,
                  'order_id' => null, // چون مربوط به کمپین است
                  'amount' => $usdtAmount,
                  'status' => 'pending',
                  'transaction_id' => $result->trackId,
                  'gateway' => 'oxapay',
              ]);

              // هدایت به درگاه پرداخت
              return redirect($result->payLink);
          } else {
              // خطای اتصال به درگاه
              return redirect()->back()->with('error', $result->errors->message ?? 'مشکلی در اتصال به درگاه پرداخت پیش آمد.');
          }
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
                  // بررسی نوع پرداخت (کمپین یا سفارش)
                  if ($payment->campaign_id) {
                      // به‌روزرسانی وضعیت کمپین
                      $payment->campaign->update(['status' => 'paid']);
                      return redirect()->route('user.campaigns.index')->with('success', 'پرداخت کمپین با موفقیت انجام شد.');
                  } elseif ($payment->order_id) {
                      // به‌روزرسانی وضعیت سفارش
                      $payment->order->update(['status' => 'paid']);
                      return redirect()->route('user.orders.index')->with('success', 'پرداخت سفارش با موفقیت انجام شد.');
                  }
              } else {
                  $payment->update([
                      'status' => 'failed',
                  ]);
                  // مدیریت خطا برای کمپین یا سفارش
                  if ($payment->campaign_id) {
                      return redirect()->route('user.campaigns.index')->with('error', 'پرداخت کمپین انجام نشد.');
                  } elseif ($payment->order_id) {
                      return redirect()->route('user.orders.index')->with('error', 'پرداخت سفارش انجام نشد.');
                  }
              }
          }
          // اگر تراکنش معتبر نبود
          return redirect()->route('user.campaigns.index')->with('error', 'تراکنش معتبر یافت نشد.');
      }
}
