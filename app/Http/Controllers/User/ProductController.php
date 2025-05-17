<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * نمایش لیست محصولات
     */
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('user.products.index', compact('categories'));
    }

    /**
     * نمایش جزئیات یک محصول
     */
    public function show($slug)
    {
        $categories = Category::with('products')->get();
        $product = Product::where('slug', $slug)->with('categories')->firstOrFail();
        return view('user.products.show', compact('product','categories'));
    }

    /**
     * ثبت سفارش محصول
     */
    public function order(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // اعتبارسنجی
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'visit_count' => $product->type === 'variable' ? 'required|integer|min:1' : 'nullable',
        ]);

        // قیمت کل
        $price = $product->type === 'fixed'
            ? $product->price * $request->quantity
            : $product->price * $request->visit_count;


            if ($product->type === 'fixed') {
                $price = $product->price * $request->quantity;
            } elseif ($product->type === 'package') {
                $price = $product->price * $request->quantity;
            } elseif ($product->type === 'view_based') {
                $price = $product->price * $request->visit_count;
            } elseif ($product->type === 'campaign') {
                $price = $product->price * $request->quantity;
            } else {
                throw new \Exception('نوع محصول نامعتبر است.');
            }
        // ایجاد سفارش
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $price,
            'status' => 'pending',
        ]);

        // افزودن محصول به سفارش
        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $price,
        ]);

        return redirect()->route('user.orders.index')->with('success', 'Order placed successfully!');
    }
    public function search(Request $request)
    {
        // دریافت دسته‌بندی‌ها برای نمایش در فرم
      $categories = Category::with('products')->get();
      // ساخت کوئری جستجو
      $query = Product::query();
      // فیلتر بر اساس دسته‌بندی
      if ($request->filled('category_id')) {
          $query->where('category_id', $request->category_id);
      }
      // فیلتر بر اساس نوع محصول
      if ($request->filled('type')) {
          $query->where('type', 'like', '%' . $request->type . '%');
      }
      // فیلتر بر اساس قیمت
      if ($request->filled('min_price')) {
          $query->where('price', '>=', $request->min_price);
      }
      if ($request->filled('max_price')) {
          $query->where('price', '<=', $request->max_price);
      }
      // مرتب‌سازی
      if ($request->filled('sort_by')) {
          switch ($request->sort_by) {
              case 'highest_price':
                  $query->orderBy('price', 'desc');
                  break;
              case 'lowest_price':
                  $query->orderBy('price', 'asc');
                  break;
              case 'best_selling':
                  $query->orderBy('sales_count', 'desc');
                  break;
              case 'most_viewed':
                  $query->orderBy('views_count', 'desc');
                  break;
          }
      }
      // دریافت نتایج
      $products = $query->get();
      // اگر درخواست از طریق AJAX بود، داده‌ها به صورت JSON ارسال می‌شوند
      if ($request->ajax()) {
          return response()->json($products);
      }
        return view('user.search.index', compact('products','categories'));
    }
}
