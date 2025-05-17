@extends('admin.layout')
@section('content')
<div class="content-wrapper">
                <!-- Content -->
                <div class="flex-grow-1 container-p-y container-fluid">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-9 col-md-8 col-12 mb-m">
                            <div class="card invoice-preview-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                                        <div class="mb-xl-0 mb-4">
                                            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                                <span class="app-brand-text fw-bold fs-4"> جزئیات سفارش #{{ $order->id }}</span>
                                            </div>
																						<p class="mb-2">کاربر: {{ $order->user->name }}</p>
                                        </div>
                                        <div>
                                            <h4 class="fw-medium mb-2">وضعیت:
                                              @if ($order->status === 'pending')
                                                  <span class="badge bg-warning">در انتظار پرداخت</span>
                                              @elseif ($order->status === 'confirmed')
                                                  <span class="badge bg-success">پرداخت شده</span>
                                              @else
                                                  <span class="badge bg-secondary">لغو شده</span>
                                              @endif
                                            </h4>
                                            <div class="mb-2 pt-1">
                                                <p><strong>مبلغ سفارش: </strong> {{ number_format($order->total_price) }} تومان</p>
                                                <p><strong>مالیات (20%): </strong> {{ number_format($order->total_price * 0.2) }} تومان</p>
                                                <p><strong>مبلغ نهایی: </strong> {{ number_format($order->total_price * 1.2) }} تومان</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
																@foreach($order->items as $item)
                                <hr class="my-0">
                                <div class="card-body">
                                    <div class="row p-sm-3 p-0">
                                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                            <h6 class="mb-3">{{ $item->product->title }}</h6>
                                            <p class="mb-1"> تعداد: {{ $item->quantity }}</p>
                                        </div>
                                        <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                            <h6 class="mb-3"> قیمت: {{ $item->price }}</h6>
                                        </div>
                                    </div>
                                </div>
																@endforeach
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                            <div class="card">
                                <div class="card-body">
                                  <form action="{{ route('admin.orders.create-invoice', $order) }}" method="POST" class="d-inline">
                                      @csrf
                                    <button class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light" type="submit">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap">
                                            <i class="ti ti-send ti-xs me-2"></i>
                                            ایجاد فاکتور
                                        </span>
                                    </button>
                                    </form>
                                    <a href="{{ route('admin.orders.index') }}">
                                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap">
                                            بازگشت
                                        </span>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>
@endsection
