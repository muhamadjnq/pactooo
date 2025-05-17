@extends('layouts.user')
@section('content')
<div class="content-wrapper">
                <!-- Content -->
                <div class="flex-grow-1 container-p-y container-fluid">
                    <!--/ Card Border Shadow -->
                    <div class="col-md-12 col-xl-12 col-lg-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="card-title m-0 me-2">
                                        <h5 class="m-0 me-2">کمپین های محبوب و موفق</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="p-0 m-0">
                                      <div class="row">
                                      @foreach ($campaigns as $campaign)
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
                </div>
            </div>
@endsection
