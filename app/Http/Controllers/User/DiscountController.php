<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Order;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function apply(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::findOrFail($request->order_id);
        $discount = Discount::where('code', $request->code)->first();

        if (!$discount || !$discount->isValid()) {
            return back()->withErrors(['code' => 'کد تخفیف نامعتبر یا منقضی شده است.']);
        }

        $order->discount_id = $discount->id;
        $order->final_price = $order->calculateFinalPrice();
        $order->save();

        $discount->increment('times_used');

        return redirect()->back()->with('success', 'تخفیف با موفقیت اعمال شد.');
    }
}
