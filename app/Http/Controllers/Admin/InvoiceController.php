<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('order.user')->latest()->paginate(10);
        return view('admin.invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('order.items.product', 'order.user');
        return view('admin.invoices.show', compact('invoice'));
    }

    public function generate(Order $order)
    {
        // چک کردن اینکه آیا فاکتور قبلاً ایجاد شده است
        if ($order->invoice) {
            return redirect()->route('admin.orders.show', $order)->with('error', 'فاکتور برای این سفارش قبلاً ایجاد شده است.');
        }

        // ایجاد فاکتور جدید
        $invoice = Invoice::create([
            'order_id' => $order->id,
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'total_amount' => $order->total_price,
            'invoice_date' => now(),
        ]);

        return redirect()->route('admin.invoices.show', $invoice)->with('success', 'فاکتور با موفقیت ایجاد شد.');
    }

    // دانلود فاکتور به صورت PDF
    public function downloadPdf(Invoice $invoice)
    {
        // لود کردن اطلاعات فاکتور و سفارش
        $invoice->load('order.items.product', 'order.user');

        // تولید PDF از ویو
        $pdf = PDF::loadView('admin.invoices.pdf', compact('invoice'));

        // برگرداندن فایل PDF برای دانلود
        return $pdf->download('invoice-' . $invoice->invoice_number . '.pdf');
    }
}
