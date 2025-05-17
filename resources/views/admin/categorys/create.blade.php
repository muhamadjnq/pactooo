@extends('admin.layout')
@section('content')
</head>
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">{{ isset($category) ? 'ویرایش دسته بندی' : 'ایجاد دسته بندی جدید' }}</h5>
                                <div class="card-body">
                                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ isset($category) ? route('admin.category.update', $category) : route('admin.category.store') }}" id="formValidationExamples" novalidate="novalidate">
                                      @csrf
                                      @if(isset($category))
                                          @method('PUT')
                                      @endif
                                        <!-- Account Details -->
                                        <div class="col-12">
                                            <h6>1. جزئیات حساب</h6>
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="formValidationName">نام دسته بندی:</label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6">
                                            <label class="form-label" for="status">وضعیت:</label>
                                            <select class="form-select" id="status" name="status" required="">
                                                <option value="pending" {{ old('status', $category->status ?? '') == 'pending' ? 'selected' : '' }}>در انتظار</option>
                                                <option value="active" {{ old('status', $category->status ?? '') == 'active' ? 'selected' : '' }}>فعال</option>
                                                <option value="completed" {{ old('status', $category->status ?? '') == 'completed' ? 'selected' : '' }}>تکمیل شده</option>
                                                <option value="cancelled" {{ old('status', $category->status ?? '') == 'cancelled' ? 'selected' : '' }}>لغو شده</option>
                                            </select>
                                        </div>
                                        <!-- Choose Your Plan -->
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="formValidationBio">توضیحات:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">{{ isset($category) ? 'ذخیره تغییرات' : 'ایجاد دسته بندی' }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
