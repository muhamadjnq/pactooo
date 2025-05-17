@extends('admin.layout')

@section('content')
    <h1>گزارش سفارشات</h1>
    <form method="GET" action="{{ route('admin.reports.index') }}">
        <div class="form-group">
            <label>تاریخ شروع:</label>
            <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
        </div>
        <div class="form-group">
            <label>تاریخ پایان:</label>
            <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">فیلتر</button>
    </form>

    <h3>خلاصه گزارش:</h3>
    <p>درآمد کل: {{ $totalIncome }}</p>
    <p>تعداد سفارشات: {{ $totalOrders }}</p>

    <h3>لیست سفارشات:</h3>
    <table class="table">
        <thead>
            <tr>
                <th>شماره سفارش</th>
                <th>کاربر</th>
                <th>قیمت کل</th>
                <th>وضعیت</th>
                <th>تاریخ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
