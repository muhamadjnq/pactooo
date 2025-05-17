<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('user.category.index', compact('categories'));
    }

    public function show($slug)
    {
        $categories = Category::with('products')->get();
       // پیدا کردن دسته‌بندی با اسلاگ مورد نظر و لود محصولات مرتبط
       $category = Category::where('slug', $slug)
           ->with(['products' => function ($query) {
               $query->distinct();
           }])
           ->firstOrFail();
       // محصولات با قیمت ثابت
       $fixedProducts = $category->products()->where('type', 'fixed')->distinct()->get();
       // محصولات بازدیدی
       $variableProducts = $category->products()->where('type', 'view_based')->distinct()->get();
       $packageProducts = $category->products()->where('type', 'package')->distinct()->get();
       foreach ($category->products as $product) {
           $product->increment('views_count');
       }
        return view('user.category.show',[
            'category' => $category,
            'categories' => $categories,
            'fixedProducts' => $fixedProducts,
            'variableProducts' => $variableProducts,
            'packageProducts' => $packageProducts,
        ]);
    }
}
