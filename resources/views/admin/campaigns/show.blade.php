@extends('admin.layout')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>جزئیات کمپین #{{ $campaign->id }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>نام کمپین:</strong> {{ $campaign->name }}</p>
                    <p><strong>بودجه کمپین:</strong> {{ number_format($campaign->budget) }} تومان</p>
                    <p><strong>تاریخ شروع:</strong> {{ $campaign->start_date }}</p>
                    <p><strong>تاریخ پایان:</strong> {{ $campaign->end_date }}</p>
                    <p><strong>وضعیت:</strong>
                        @if ($campaign->status === 'pending')
                            <span class="badge bg-warning">در انتظار</span>
                        @elseif ($campaign->status === 'active')
                            <span class="badge bg-success">فعال</span>
                        @elseif ($campaign->status === 'completed')
                            <span class="badge bg-secondary">تکمیل شده</span>
                        @else
                            <span class="badge bg-danger">لغو شده</span>
                        @endif
                    </p>
                    <p><strong>اهداف کمپین:</strong> {{ $campaign->objectives }}</p>
                    <p><strong>توضیحات:</strong> {{ $campaign->description }}</p>
                </div>
                <div class="card-footer">
                    <h6>آیتم‌های کمپین:</h6>
                    @foreach ($campaign->products as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p><strong>نام محصول:</strong> {{ $item->title }}</p>
                                <p><strong>تعداد:</strong> {{ $item->quantity }}</p>
                                <p><strong>قیمت:</strong> {{ number_format($item->price) }} تومان</p>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('admin.campaign.index') }}" class="btn btn-secondary">بازگشت</a>
                    <a href="{{ route('admin.campaign.edit', $campaign) }}" class="btn btn-primary">ویرایش کمپین</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
