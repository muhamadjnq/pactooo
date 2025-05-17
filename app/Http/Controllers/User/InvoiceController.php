<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $invoices1 = Invoice::with('order.user')->latest()->paginate(10);
        $invoices = auth()->user()->invoices()->latest()->paginate(15);
        return view('user.invoices.index', compact('invoices','categories'));
    }

    public function show(Invoice $invoice)
    {
        $categories = Category::with('products')->get();
        $invoice->load('order.items.product', 'order.user');
        return view('user.invoices.show', compact('invoice','categories'));
    }

    public function generate(Order $order)
    {
        $categories = Category::with('products')->get();
        // چک کردن اینکه آیا فاکتور قبلاً ایجاد شده است
        if ($order->invoice) {
            return redirect()->route('user.orders.show', $order)->with('error', 'فاکتور برای این سفارش قبلاً ایجاد شده است.');
        }
        // ایجاد فاکتور جدید
        $invoice = Invoice::create([
            'order_id' => $order->id,
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'total_amount' => $order->total_price,
            'invoice_date' => now(),
        ]);
        return redirect()->route('user.invoices.show', $invoice,'categories')->with('success', 'فاکتور با موفقیت ایجاد شد.');
    }

    // دانلود فاکتور به صورت PDF
    public function downloadPdf(Invoice $invoice)
    {
        $categories = Category::with('products')->get();
        // لود کردن اطلاعات فاکتور و سفارش
        $invoice->load('order.items.product', 'order.user');
        // تولید PDF از ویو
        $pdf = PDF::loadView('user.invoices.pdf', compact('invoice','categories'));
        // برگرداندن فایل PDF برای دانلود
        return $pdf->download('invoice-' . $invoice->invoice_number . '.pdf');
    }
}
