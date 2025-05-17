<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::with('products')->get();
        $orders = Order::where('user_id', auth()->id())->latest()->take(10)->get();
        $payments = Payment::where('user_id', auth()->id())->latest()->take(10)->get();
        $tickets = Ticket::where('user_id', auth()->id())->latest()->take(10)->get();
        // آمار سفارش‌ها
        $totalOrders = Order::where('user_id', $user->id)->count();
        $pendingOrders = Order::where('user_id', $user->id)->where('status', 'pending')->count();
        $completedOrders = Order::where('user_id', $user->id)->where('status', 'completed')->count();
        // آمار پرداخت‌ها
        $totalPayments = Payment::where('user_id', $user->id)->sum('amount');
        $successfulPayments = Payment::where('user_id', $user->id)->where('status', 'success')->sum('amount');
        $failedPayments = Payment::where('user_id', $user->id)->where('status', 'failed')->count();
        $campaignProducts = Product::where('type', 'campaign')->distinct()->take(8)->get();
        $categoriess = Category::all()->map(function ($category) {
        $category->random_products = $category->products()->inRandomOrder()->take(4)->get();
        return $category;
    });
        return view('user.dashboard.index', compact('orders', 'payments', 'tickets', 'categories','user',
            'totalOrders','pendingOrders','completedOrders','totalPayments','successfulPayments','failedPayments','campaignProducts','categoriess'
        ));
    }
}
