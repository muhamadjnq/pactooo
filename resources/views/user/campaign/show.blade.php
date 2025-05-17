@extends('layouts.user')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content-wrapper">
    <!-- Content -->
    <div class="flex-grow-1 container-p-y container-fluid">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-m">
                <div class="card invoice-preview-card">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <h5 style="color:red;">پرداخت با ارز دیجیتال بدون مالیات است.</h5>
                        </div>
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                    <span class="app-brand-text fw-bold fs-4">جزئیات کمپین {{ $campaign->name }}</span>
                                </div>
                                <p class="mb-2"><strong>توضیحات:</strong> {{ $campaign->description }}</p>
                                <p class="mb-2"><strong>هزینه کمپین:</strong> {{ number_format($campaign->budget, 0) }} تومان</p>
                                <p class="mb-2"><strong>تاریخ شروع:</strong> {{ \Hekmatinasser\Verta\Verta::instance($campaign->start_date)->format('Y/m/d') }}</p>
                                <p class="mb-2"><strong>تاریخ پایان:</strong> {{ \Hekmatinasser\Verta\Verta::instance($campaign->end_date)->format('Y/m/d') }}</p>
                            </div>
                            <div>
                                <p><strong>لینک محتوا:</strong> <a href="{{ $campaign->content_link }}">{{ $campaign->content_link }}</a></p>
                                <p><strong>هدف کمپین:</strong> {{ $campaign->goal }}</p>
                                <p><strong>یادداشت‌ها:</strong> {{ $campaign->message }}</p>
                                <p><strong>مالیات (20%): </strong> {{ number_format($campaign->budget * 0.2) }} تومان</p>
                                <p><strong>مبلغ نهایی: </strong> {{ number_format($campaign->budget * 1.2) }} تومان</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @if($campaign->products->isEmpty())
                        <p>هیچ محصولی برای این کمپین ثبت نشده است.</p>
                    @else
                        <div class="col-sm-12">
                            <table id="productsTable" class="table text-md-nowrap dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>آیتم‌های کمپین</th>
                                        <th>قیمت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($campaign->products as $index => $product)
                                    <tr data-product-id="{{ $product->id }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price, 0) }} تومان</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm remove-product"
                                                data-id="{{ $product->id }}"
                                                data-campaign-id="{{ $campaign->id }}">
                                                حذف
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const productsTable = document.querySelector('#productsTable');
    productsTable.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-product')) {
            const productId = e.target.getAttribute('data-id');
            const campaignId = e.target.getAttribute('data-campaign-id');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟')) {
                fetch(`/user/campaign/${campaignId}/products/${productId}/delete`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('خطا در حذف محصول');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const row = document.querySelector(`tr[data-product-id="${productId}"]`);
                        row.remove();
                        alert(data.message);
                    } else {
                        alert('خطا: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('خطا:', error);
                    alert('خطایی در سرور رخ داد.');
                });
            }
        }
    });
});
</script>
@endsection
