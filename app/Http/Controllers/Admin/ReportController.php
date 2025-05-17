<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth());
        $endDate = $request->get('end_date', Carbon::now());

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        $totalIncome = $orders->sum('total_price');
        $totalOrders = $orders->count();

        return view('admin.reports.index', compact('orders', 'totalIncome', 'totalOrders', 'startDate', 'endDate'));
    }
}
