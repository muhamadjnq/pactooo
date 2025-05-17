@extends('layouts.user')
@section('content')
<div class="content-wrapper">
                <!-- Content -->
                <div class="flex-grow-1 container-p-y container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 mb-4">
                            <div class="card card-border-shadow-primary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2 pb-1">
                                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-primary">
                                                <i class="ti ti-truck ti-md"></i>
                                            </span>
                                        </div>
                                        <h4 class="ms-1 mb-0">{{ $totalOrders }}</h4>
                                    </div>
                                    <p class="mb-1">تعداد سفارشات</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-4">
                            <div class="card card-border-shadow-warning">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2 pb-1">
                                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-warning">
                                                <i class="ti ti-alert-triangle ti-md"></i>
                                            </span>
                                        </div>
                                        <h4 class="ms-1 mb-0">{{ number_format($totalPayments, 0) }} تومان</h4>
                                    </div>
                                    <p class="mb-1">مجموع پرداخت ها</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-4">
                            <div class="card card-border-shadow-danger">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2 pb-1">
                                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-danger">
                                                <i class="ti ti-git-fork ti-md"></i>
                                            </span>
                                        </div>
                                        <h4 class="ms-1 mb-0">{{ count($tickets) }}</h4>
                                    </div>
                                    <p class="mb-1">تیکت ها</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-4">
                            <div class="card card-border-shadow-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2 pb-1">
                                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-info">
                                                <i class="ti ti-clock ti-md"></i>
                                            </span>
                                        </div>
                                        <h4 class="ms-1 mb-0">0</h4>
                                    </div>
                                    <p class="mb-1">کمپین ها</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="content-wrapper">
                      @foreach ($categoriess as $category)
                            <div class="row mb-4">
                                @foreach ($category->random_products as $product)
                                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                          <div class="d-flex align-items-start">
                                          <div class="d-flex align-items-start avatar avatar-xl me-3">
                                            <img alt="{{ $product->name }}" class="rounded-circle" src="{{ asset('storage/' . $product->image) }}" style="width: 40px;height:40px;">
                                          </div>
                                          <h6 class="mb-0">{{ $product->title }}</h5>
                                          </div>
                                            <small class="text-muted d-block">{{ $product->description }}</small>
                                            <p class="mb-0 fw-medium">قیمت: {{ number_format($product->price, 0) }} تومان</p>
                                            <form action="{{ route('user.products.order', $product->id) }}" method="POST">
                                                @csrf
                                                <input hidden class="form-control" value="1" min="1" type="number" name="quantity">
                                                <button class="btn btn-primary waves-effect waves-light" data-bs-target="#pricingModal" data-bs-toggle="modal" type="submit"> ثبت سفارش</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div> -->
                    <div class="row mb-5">
                      @foreach ($categories as $categorie)
                      <div class="col-md-6 col-lg-4">
                          <div class="card mb-3">
                              <div class="card-body">
                                  <h5 class="card-title">سفارش تبلیغات {{ $categorie->name }}</h5>
                                  <p class="card-text">{{ $categorie->description }}</p>
                                  <a class="btn btn-primary waves-effect waves-light" href="/user/categories/{{ $categorie->slug }}">ثبت سفارش</a>
                              </div>
                          </div>
                      </div>
                        @endforeach
                    </div>
                    <!--/ Card Border Shadow -->
                    <div class="col-md-12 col-xl-12 col-lg-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="card-title m-0 me-2">
                                        <h5 class="m-0 me-2">کمپین های محبوب و موفق</h5>
                                    </div>
                                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                                      <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="/user/campaign/example"><h6 class="m-0 me-2">مشاهده همه</h6></a>
                                      </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <ul class="p-0 m-0">
                                      <div class="row">
                                      @foreach ($campaignProducts as $campaign)
                                      <div class="col-md-6 col-xl-3 mb-4">
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="me-3">
                                                <img alt="{{ $campaign->name }}" class="rounded" src="/assets/img/pacto-logo.jpg" width="46">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0">{{ $campaign->name }}</h6>
                                                    <small class="text-muted d-block">{{ $campaign->description }}</small>
                                                </div>
                                                <div class="user-progress d-flex align-items-center gap-1">
                                                    <p class="mb-0 fw-medium">قیمت: {{ number_format($campaign->price, 0) }} تومان</p>
                                                </div>
                                                <form action="{{ route('user.orders.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $campaign->id }}">
                                                    <input hidden class="form-control" value="1" min="1" type="number" name="quantity">
                                                    <button class="btn btn-primary waves-effect waves-light" data-bs-target="#pricingModal" data-bs-toggle="modal" type="submit"> ثبت سفارش</button>
                                                </form>
                                            </div>
                                            <hr>
                                        </li>
                                        </div>
                                        @endforeach
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <!-- Card Border Shadow -->
                        <!-- On route vehicles Table -->
                        <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                              <div class="card h-100">
                                  <div class="card-header d-flex justify-content-between">
                                      <h5 class="card-title m-0 me-2">آخرین پرداخت&zwnj;ها</h5>
                                  </div>
                                  <div class="table-responsive">
                                      <table class="table table-borderless border-top">
                                          <thead class="border-bottom">
                                          <tr>
                                            <th>مبلغ</th>
                                            <th>وضعیت</th>
                                            <th>تاریخ پرداخت</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($payments as $payment)
                                            <tr role="row" class="odd">
                                              <td>{{ number_format($payment->amount) }} تومان</td>
                                              <td>
                                                @if ($payment->status === 'pending')
                                                    <span class="badge bg-warning">در انتظار پرداخت</span>
                                                @elseif ($payment->status === 'confirmed')
                                                    <span class="badge bg-success">پرداخت شده</span>
                                                @else
                                                    <span class="badge bg-secondary">نامشخص</span>
                                                @endif
                                              </td>
                                              <td>{{ \Hekmatinasser\Verta\Verta::instance($payment->created_at)->formatJalaliDatetime() }}</td>
                                            </tr>
                                            @endforeach
                                          @if(count($payments) == 0)
                                          <tr><td colspan="7" style="text-align: center">هیچ پرداختی تاکنون ثبت نکرده اید!</td></tr>
                                          @endif
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <h5 class="card-title m-0 me-2">آخرین سفارش ها</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless border-top">
                                            <thead class="border-bottom">
                                            <tr>
                                              <th>محصولات</th>
                                              <th>مجموع قیمت</th>
                                              <th>وضعیت</th>
                                              <th>تاریخ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($orders as $order)
                                              <tr role="row" class="odd">
                                                  <td>
                                                      <ul>
                                                          @foreach($order->items as $item)
                                                              <li>{{ $item->product->name }}</li>
                                                          @endforeach
                                                      </ul>
                                                  </td>
                                                  <td>{{ number_format($order->total_price) }} تومان</td>
                                                  <td>
                                                    @if ($order->status === 'pending')
                                                        <span class="badge bg-warning">در انتظار پرداخت</span>
                                                    @elseif ($order->status === 'confirmed')
                                                        <span class="badge bg-success">پرداخت شده</span>
                                                    @else
                                                        <span class="badge bg-secondary">نامشخص</span>
                                                    @endif
                                                  </td>
                                                  <td>{{ \Hekmatinasser\Verta\Verta::instance($order->created_at)->formatJalaliDatetime() }}</td>
                                              </tr>
                                              @endforeach
                                            @if(count($orders) == 0)
                                            <tr><td colspan="7" style="text-align: center">هیچ سفارشی تاکنون ثبت نکرده اید!</td></tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ On route vehicles Table -->
                </div>
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>
@endsection
