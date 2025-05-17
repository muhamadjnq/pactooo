@extends('admin.layout')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">ایجاد کد تخفیف</h5>
                                <div class="card-body">
                                      <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.discounts.store') }}" method="POST">
                                          @csrf
                                        <!-- Account Details -->
                                        <div class="col-12">
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="code">کد تخفیف:</label>
                                            <input class="form-control" type="text" name="code" value="{{ old('code') }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6 fv-plugins-icon-container">
                                          <label class="form-label" for="percentage">درصد تخفیف (%):</label>
                                          <input class="form-control" type="text" name="percentage" value="{{ old('percentage') }}" required>
                                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6 fv-plugins-icon-container">
                                        <label class="form-label" for="fixed_amount">مبلغ ثابت تخفیف:</label>
                                        <input class="form-control" type="text" name="fixed_amount" value="{{ old('fixed_amount') }}" required>
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                  </div>
                                      <div class="col-md-6 fv-plugins-icon-container">
                                          <label class="form-label" for="usage_limit">چندبار استفاده بشه:</label>
                                          <input class="form-control" type="number" name="usage_limit" value="{{ old('usage_limit') }}" required>
                                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6 fv-plugins-icon-container">
                                        <label class="form-label" for="price">تاریخ انقضاء:</label>
                                        <input class="form-control" type="datetime-local" name="expires_at" value="{{ old('expires_at') }}" required>
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                  </div>
                                  </div>
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">ایجاد کد تخفیف</button>
                                        </div>
                                        <div class="col-12"><br class="mt-0"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
