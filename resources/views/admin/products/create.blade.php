@extends('admin.layout')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">ایجاد محصول جدید</h5>
                                <div class="card-body">
                                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" >
                                      @csrf
                                        <!-- Account Details -->
                                        <div class="col-12">
                                            <h6>1. جزئیات حساب</h6>
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="title">عنوان محصول:</label>
                                            <input class="form-control" type="text" name="title" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6 fv-plugins-icon-container">
                                          <label class="form-label" for="name">نام محصول:</label>
                                          <input class="form-control" type="text" name="name" required>
                                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6 fv-plugins-icon-container">
                                        <label class="form-label" for="link">لینک محصول:</label>
                                        <input class="form-control" type="text" name="link" required>
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                  </div>
                                        <!-- Choose Your Plan -->
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="description">توضیحات:</label>
                                            <textarea class="form-control" name="description" rows="3"></textarea>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6 fv-plugins-icon-container">
                                          <label class="form-label" for="price">قیمت:</label>
                                          <input class="form-control" type="number" name="price" required>
                                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6">
                                          <label class="form-label" for="categories[]">دسته‌بندی‌ها:</label>
                                          <select class="form-select" name="categories[]" required>
                                              @foreach($categories as $category)
                                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                    <div class="col-md-6 fv-plugins-icon-container">
                                        <label class="form-label" for="formValidationName">عکس محصول:</label>
                                        <input class="form-control" type="file" name="image" accept="image/*" required>
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                  </div>
                                  <div class="col-md-6">
                                        <label class="form-label" for="type">نوع محصول:</label>
                                        <select class="form-select" name="type" required>
                                            <option value="fixed">تعرفه ای</option>
                                            <option value="view_based">بازدیدی</option>
                                            <option value="package">پکیج</option>
                                        </select>
                                    </div>
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">ایجاد محصول</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
