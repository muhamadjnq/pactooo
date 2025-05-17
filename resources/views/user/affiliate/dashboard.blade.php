@extends('layouts.user')
@section('title', 'Affiliate Dashboard')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
  <h1 class="ms-1 mb-0">پنل کسب درآمد</h1>
  <br>
    <div class="row">
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-clock ti-md"></i>
                            </span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $affiliate->orders }}</h4>
                    </div>
                    <p class="mb-1">تعداد سفارشات رفرال شما:</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-alert-triangle ti-md"></i>
                            </span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ number_format($affiliate->total_commission, 0) }} تومان</h4>
                    </div>
                    <p class="mb-1">درآمد شما:</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-git-fork ti-md"></i>
                            </span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $affiliate->clicks }}</h4>
                    </div>
                    <p class="mb-1">تعداد کلیک  رفرال شما:</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('user.affiliate.referral') }}" class="btn btn-primary mt-3">
        دریاقت لینک کسب درآمد (رفرال)
    </a>
  </div>
@endsection
