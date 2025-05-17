<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class OrderController extends Controller
{
    // نمایش فرم ثبت سفارش
    public function create()
    {
        $categories = Category::with('products')->get();
        $products = Product::where('is_active', true)->get(); // فقط محصولات فعال
        return view('user.orders.create', compact('products','categories'));
    }

    // ثبت سفارش جدید
    public function store(Request $request)
    {
		$minimumViews = $product->category->minimum_views ?? 1;
      $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => ['required_if:type,view_based', 'integer', 'min:' . $minimumViews],
        ]);
        $categories = Category::with('products')->get();
        $product = Product::findOrFail($request->product_id);
        $product->increment('sales_count', $request->quantity);
        // محاسبه قیمت نهایی بر اساس نوع محصول
        $price = $product->calculatePrice($request->quantity ?? 1);

        // ایجاد سفارش اصلی
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $price,
            'status' => 'pending',
        ]);

        // افزودن آیتم به سفارش
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $product->isVariable() ? $request->quantity : null,
            'price' => $price,
        ]);

        return redirect()->route('user.orders.index')->with('success', 'سفارش با موفقیت ثبت شد.');
    }

    // نمایش لیست سفارشات کاربر
    public function index()
    {
      $categories = Category::with('products')->get();
        $orders = auth()->user()->orders()->with('items.product')->latest()->paginate(15);
        return view('user.orders.index', compact('orders','categories'));
    }

    // نمایش جزئیات یک سفارش
    public function show(Order $order)
    {
      $products = Product::all();
      $categories = Category::with('products')->get();
        if ($order->user_id != Auth::id()) {
            abort(403); // دسترسی غیرمجاز
        }

        $order->load('items.product');
        return view('user.orders.show', compact('order','categories','products'));
    }
    public function addProduct(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        $order->items()->create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $product->isVariable() ? $request->quantity : null,
            'price' => $product->price * $request->quantity,
        ]);

        // بروزرسانی قیمت نهایی سفارش
        $order->update(['total_price' => $order->items->sum('price')]);

        return redirect()->back()->with('success', 'محصول با موفقیت به سفارش اضافه شد.');
    }

    private function calculatePrice($product, $quantity)
    {
      // بررسی اینکه محصول متغیر باشد
      if ($product->is_variable) {
          return $quantity * $product->price_per_unit; // قیمت هر واحد
      }
      return $product->price; // قیمت ثابت
    }

    public function createInvoice(Order $order)
    {
        DB::beginTransaction();
        try {
            // محاسبه مبلغ کل سفارش
            $totalAmount = $order->items->sum(function ($item) {
                return $item->quantity * $item->price;
            });

            // تولید شماره فاکتور یکتا
            $invoiceNumber = 'INV-' . now()->format('Ymd') . '-' . $order->id;

            // ایجاد فاکتور
            $invoice = Invoice::create([
                'invoice_number' => $invoiceNumber,
                'invoice_date' => now(),
                'order_id' => $order->id,
                'total_amount' => $totalAmount,
            ]);

            DB::commit();

            return redirect()->route('user.invoices.show', $invoice)
                ->with('success', 'فاکتور با موفقیت ایجاد شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'مشکلی در ایجاد فاکتور رخ داد.');
        }
    }
}
