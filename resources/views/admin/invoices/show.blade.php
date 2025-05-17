@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h1>مشاهده فاکتور</h1>
    <div class="card mb-4">
        <div class="card-header">
            <h4>فاکتور شماره: {{ $invoice->invoice_number }}</h4>
        </div>
        <div class="card-body">
            <p><strong>نام مشتری:</strong> {{ $invoice->order->user->name }}</p>
            <p><strong>تاریخ فاکتور:</strong>{{ \Hekmatinasser\Verta\Verta::instance($invoice->invoice_date)->formatJalaliDatetime() }}</p>
            <p><strong>مبلغ کل:</strong> {{ number_format($invoice->total_amount, 2) }} تومان</p>
            <p><strong>شماره سفارش:</strong> #{{ $invoice->order->id }}</p>
        </div>
    </div>

    <h3>جزئیات سفارش:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>نام محصول</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th>جمع</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->order->items as $item)
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} تومان</td>
                    <td>{{ number_format($item->quantity * $item->price, 2) }} تومان</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary">بازگشت به لیست فاکتورها</a>
        <a href="{{ route('admin.invoices.download-pdf', $invoice) }}" class="btn btn-primary">دانلود PDF</a>
    </div>
</div>
@endsection
