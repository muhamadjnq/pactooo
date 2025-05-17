@extends('layouts.user')
@section('content')
<div class="content-wrapper">
                <!-- Content -->
                <div class="flex-grow-1 container-p-y container-fluid">
                  <h3>جزئیات پرداخت</h3>
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-9 col-md-8 col-12 mb-m">
                            <div class="card invoice-preview-card">
                                <div class="card-body">
                                  <div class="alert alert-danger" role="alert"><h5 style="color:red;">پرداخت با ارزدیجیتال بدون مالیات هستش</h5></div>
                                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                                        <div class="mb-xl-0 mb-4">
                                            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                                <span class="app-brand-text fw-bold fs-4">پرداخت شماره: {{ $payment->id }}</span>
                                            </div>
                                            <p><strong>شناسه تراکنش:</strong> {{ $payment->transaction_id }}</p>
                                            <p><strong>تاریخ پرداخت:</strong> {{ $payment->created_at->format('Y/m/d H:i') }}</p>
                                            @if ($payment->description)
                                                <p><strong>توضیحات:</strong> {{ $payment->description }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="fw-medium mb-2">وضعیت:
                                              @if ($payment->status == 'paid')
                                                  <span class="badge bg-success">پرداخت شده</span>
                                              @else
                                                  <span class="badge bg-danger">پرداخت نشده</span>
                                              @endif
                                            </h4>
                                            <div class="mb-2 pt-1"><p class="mb-2">نام کاربری: {{ $payment->user->name }}</p></div>
                                            <div class="mb-2 pt-1">
                                                <p><strong>مبلغ سفارش: </strong> {{ number_format($payment->total_price) }} تومان</p>
                                                <p><strong>مالیات (20%): </strong> {{ number_format($payment->total_price * 0.2) }} تومان</p>
                                                <p><strong>مبلغ نهایی: </strong> {{ number_format($payment->total_price * 1.2) }} تومان</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                            <div class="card">
                                <div class="card-body">
                                  <!-- <form action="{{ route('user.orders.create-invoice', $payment) }}" method="POST" class="d-inline">
                                      @csrf
                                    <button class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light" type="submit">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap">
                                            <i class="ti ti-send ti-xs me-2"></i>
                                            ایجاد فاکتور
                                        </span>
                                    </button>
                                    </form> -->
                                    @if($payment->status === 'pending')
                                    <a href="{{ route('user.payment.checkout', $payment) }}" class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">پرداخت ریالی</a>
                                    <a href="{{ route('user.crypto.checkout', $payment) }}" class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">پرداخت با ارزدیجیتال</a>
								                    @else
                                    <a class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">پرداخت شده</a>
								                    @endif
                                    <a href="{{ route('user.payments.index') }}">
                                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap">
                                            بازگشت به لیست پرداخت‌ها
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
