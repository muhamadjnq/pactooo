<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاکتور</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            direction: rtl;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>فاکتور شماره {{ $invoice->invoice_number }}</h1>
    <p><strong>تاریخ فاکتور:</strong> {{ $invoice->invoice_date }}</p>
    <p><strong>نام مشتری:</strong> {{ $invoice->order->user->name }}</p>
    <p><strong>مجموع مبلغ:</strong> {{ number_format($invoice->total_amount, 2) }} تومان</p>

    <h3>جزئیات سفارش:</h3>
    <table>
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
</body>
</html>
