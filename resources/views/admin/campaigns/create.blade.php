@extends('admin.layout')
@section('content')
</head>
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">{{ isset($campaign) ? 'ویرایش کمپین' : 'ایجاد کمپین جدید' }}</h5>
                                <div class="card-body">
                                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ isset($campaign) ? route('admin.campaign.update', $campaign) : route('admin.campaign.store') }}" id="formValidationExamples" novalidate="novalidate">
                                      @csrf
                                      @if(isset($campaign))
                                          @method('PUT')
                                      @endif
                                        <!-- Account Details -->
                                        <div class="col-12">
                                            <h6>1. جزئیات حساب</h6>
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="formValidationName">نام کمپین:</label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $campaign->name ?? '') }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6">
                                            <label class="form-label" for="status">وضعیت:</label>
                                            <select class="form-select" id="status" name="status" required="">
                                                <option value="pending" {{ old('status', $campaign->status ?? '') == 'pending' ? 'selected' : '' }}>در انتظار</option>
                                                <option value="active" {{ old('status', $campaign->status ?? '') == 'active' ? 'selected' : '' }}>فعال</option>
                                                <option value="completed" {{ old('status', $campaign->status ?? '') == 'completed' ? 'selected' : '' }}>تکمیل شده</option>
                                                <option value="cancelled" {{ old('status', $campaign->status ?? '') == 'cancelled' ? 'selected' : '' }}>لغو شده</option>
                                            </select>
                                        </div>
                                        <!-- Choose Your Plan -->
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="formValidationBio">توضیحات:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $campaign->description ?? '') }}</textarea>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">{{ isset($campaign) ? 'ذخیره تغییرات' : 'ایجاد کمپین' }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
