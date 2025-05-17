<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Category;
use App\Http\Controllers\Controller;

    class ProductSearchController extends Controller
    {
      public function search(Request $request)
      {
          $categories = Category::with('products')->get();
          $query = $request->input('query');
          // جستجوی کمپین‌ها
          $campaigns = Product::where('type', 'campaign')
              ->where(function ($subQuery) use ($query) {
                  $subQuery->where('name', 'LIKE', "%$query%")
                           ->orWhere('description', 'LIKE', "%$query%");
              })
              ->distinct()
              ->get();
          // جستجوی دسته‌بندی
          $category = Category::where('name', $query)
              ->with(['products' => function ($query) {
                  $query->distinct();
              }])
              ->firstOrFail();
          // مقدار حداقل بازدید از جدول دسته‌بندی
          $minimumViews = $category->minimum_views ?? 1;
          // محصولات ثابت
          $fixeds = $category->products()->where('type', 'fixed')->distinct()->get();
          // محصولات بر اساس بازدید
          $variables = $category->products()->where('type', 'view_based')->distinct()->get();
          // بسته‌ها
          $packages = $category->products()->where('type', 'package')->distinct()->get();
          return view('user.search.result', [
              'categories' => $categories,
              'query' => $query,
              'fixeds' => $fixeds,
              'variables' => $variables,
              'packages' => $packages,
              'campaigns' => $campaigns,
              'minimumViews' => $minimumViews, // ارسال حداقل بازدید به ویو
          ]);
      }
    }
