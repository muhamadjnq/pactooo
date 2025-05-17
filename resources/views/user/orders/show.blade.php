@extends('layouts.user')
@section('content')
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
                                  <div class="alert alert-danger" role="alert"><h5 style="color:red;">پرداخت با ارزدیجیتال بدون مالیات هستش</h5></div>
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
										                              <bdi class="badge bg-warning">در انتظار پرداخت</bdi>
										                          @elseif ($order->status === 'confirmed')
										                              <bdi class="badge bg-success">پرداخت شده</bdi>
										                          @else
										                              <span class="badge bg-secondary">لغو شده</span>
										                          @endif
                                            </h4>
                                            <div class="mb-2 pt-1">
																							@if ($order->discount)
																									<span class="fw-medium">تخفیف اعمال شده: {{ $order->discount->code }}</span>
                                                  <p><strong>مبلغ سفارش: </strong> {{ number_format($order->final_price) }} تومان</p>
                                                  <p><strong>مالیات (20%): </strong> {{ number_format($order->final_price * 0.2) }} تومان</p>
                                                  <p><strong>مبلغ نهایی: </strong> {{ number_format($order->final_price * 1.2) }} تومان</p>
																							@else
                                                  <p><strong>مبلغ سفارش: </strong> {{ number_format($order->total_price) }} تومان</p>
                                                  <p><strong>مالیات (20%): </strong> {{ number_format($order->total_price * 0.2) }} تومان</p>
                                                  <p><strong>مبلغ نهایی: </strong> {{ number_format($order->total_price * 1.2) }} تومان</p>
																							@endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addProductModal">افزودن محصول به سفارش</button>

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
                                            <h6 class="mb-3"> قیمت: {{ number_format($item->price) }} تومان</h6>
                                        </div>
                                    </div>
                                </div>
																@endforeach
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                            <div class="card">
                                <div class="card-body">
                                  <form action="{{ route('user.orders.create-invoice', $order) }}" method="POST" class="d-inline">
                                      @csrf
                                    <button class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light" type="submit">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap">
                                            <i class="ti ti-send ti-xs me-2"></i>
                                            ایجاد فاکتور
                                        </span>
                                    </button>
                                    </form>
																		@if($order->status === 'pending')
								                    <a href="{{ route('user.payment.checkout', $order) }}" class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">پرداخت ریالی</a>
                                    <a href="{{ route('user.crypto.checkout', $order) }}" class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">پرداخت با ارزدیجیتال</a>
								                    @else
								                    <a class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">پرداخت شده</a>
								                    @endif
                                    <a href="{{ route('user.orders.index') }}">
                                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap">
                                            بازگشت
                                        </span>
                                    </button>
                                    </a>
                                </div>
                            </div>
														<br>
														<div class="card">
                                <div class="card-body">
																	<form action="{{ route('user.orders.apply-discount') }}" method="POST" class="d-inline">
																			@csrf
																			<input type="hidden" name="order_id" value="{{ $order->id }}">
																			<div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="code">کد تخفیف:</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="code" id="code" type="text">
                                        </div>
                                    </div>
																			<button class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light" type="submit">
																					<span class="d-flex align-items-center justify-content-center text-nowrap">
																							اعمال تخفیف
																					</span>
																			</button>
																	</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>

            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">انتخاب محصول</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="categoryTabs" role="tablist">
                    @foreach($categories as $category)
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                id="tab-{{ $category->id }}"
                                data-bs-toggle="tab"
                                data-bs-target="#content-{{ $category->id }}"
                                type="button"
                                role="tab"
                                aria-controls="content-{{ $category->id }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                {{ $category->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="categoryTabsContent">
                    @foreach($categories as $category)
                        <div
                            class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="content-{{ $category->id }}"
                            role="tabpanel"
                            aria-labelledby="tab-{{ $category->id }}">

                            <!-- Sub-tabs for Product Types -->
                            <ul class="nav nav-pills mt-3" id="productTypeTabs-{{ $category->id }}" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link active"
                                        id="visit-tab-{{ $category->id }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#visit-content-{{ $category->id }}"
                                        type="button"
                                        role="tab"
                                        aria-controls="visit-content-{{ $category->id }}"
                                        aria-selected="true">
                                        تبلیغات بازدیدی
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link"
                                        id="rate-tab-{{ $category->id }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#rate-content-{{ $category->id }}"
                                        type="button"
                                        role="tab"
                                        aria-controls="rate-content-{{ $category->id }}"
                                        aria-selected="false">
                                        تبلیغات تعرفه‌ای
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link"
                                        id="special-tab-{{ $category->id }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#special-content-{{ $category->id }}"
                                        type="button"
                                        role="tab"
                                        aria-controls="special-content-{{ $category->id }}"
                                        aria-selected="false">
                                        پیشنهاد ویژه
                                    </button>
                                </li>
                            </ul>

                            <!-- Sub-tab Content -->
                            <div class="tab-content mt-3" id="productTypeContent-{{ $category->id }}">
                                <!-- Visit Products -->
                                <div
                                    class="tab-pane fade show active"
                                    id="visit-content-{{ $category->id }}"
                                    role="tabpanel"
                                    aria-labelledby="visit-tab-{{ $category->id }}">
                                    @include('components.product-table-view', ['products' => $category->products->where('type', 'view_based')])
                                </div>

                                <!-- Rate Products -->
                                <div
                                    class="tab-pane fade"
                                    id="rate-content-{{ $category->id }}"
                                    role="tabpanel"
                                    aria-labelledby="rate-tab-{{ $category->id }}">
                                    @include('components.product-table', ['products' => $category->products->where('type', 'fixed')])
                                </div>

                                <!-- Special Products -->
                                <div
                                    class="tab-pane fade"
                                    id="special-content-{{ $category->id }}"
                                    role="tabpanel"
                                    aria-labelledby="special-tab-{{ $category->id }}">
                                    @include('components.product-table', ['products' => $category->products->where('type', 'package')])
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
