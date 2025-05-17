@extends('admin.layout')
@section('content')
<div class="container-fluid mt-4">
    <h3>مدیریت پرداخت‌ها</h3>

    <!-- فیلتر پرداخت‌ها -->
    <form method="GET" action="{{ route('admin.payments.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="status" class="form-select">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>همه وضعیت‌ها</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>در انتظار</option>
                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>پرداخت شده</option>
                    <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>ناموفق</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">فیلتر</button>
            </div>
        </div>
    </form>

    <!-- جدول پرداخت‌ها -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>کاربر</th>
                        <th>مبلغ</th>
                        <th>وضعیت</th>
                        <th>تاریخ پرداخت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ number_format($payment->amount) }} تومان</td>
                            <td>
                                @if ($payment->status === 'pending')
                                    <span class="badge bg-warning">در انتظار</span>
                                @elseif ($payment->status === 'paid')
                                    <span class="badge bg-success">پرداخت شده</span>
                                @else
                                    <span class="badge bg-danger">ناموفق</span>
                                @endif
                            </td>
                            <td>{{ \Hekmatinasser\Verta\Verta::instance($payment->created_at)->formatJalaliDatetime() }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.payments.updateStatus', $payment) }}" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select d-inline w-auto" onchange="this.form.submit()">
                                        <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>در انتظار</option>
                                        <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>پرداخت شده</option>
                                        <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>ناموفق</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">هیچ پرداختی یافت نشد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- صفحه‌بندی -->
            <div class="mt-3">
                {{ $payments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
