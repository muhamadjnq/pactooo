<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::query();

        // فیلتر بر اساس وضعیت پرداخت
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // مرتب‌سازی بر اساس تاریخ
        $payments = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.payments.index', compact('payments'));
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,failed',
        ]);

        $payment->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.payments.index')->with('success', 'وضعیت پرداخت با موفقیت تغییر کرد.');
    }
}
