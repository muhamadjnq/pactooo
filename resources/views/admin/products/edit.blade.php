@extends('admin.layout')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">ویرایش محصول</h5>
                                <div class="card-body">
                                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="formValidationExamples" novalidate="novalidate">
                                      @csrf
                                      @method('PUT')
                                        <!-- Account Details -->
                                        <div class="col-12">
                                            <h6>1. جزئیات حساب</h6>
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="formValidationName">عنوان محصول:</label>
                                            <input class="form-control" type="text" id="name" name="title" value="{{ $product->title }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6 fv-plugins-icon-container">
                                          <label class="form-label" for="formValidationName">نام محصول:</label>
                                          <input class="form-control" type="text" id="name" name="name" value="{{ $product->name }}" required>
                                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                        <!-- Choose Your Plan -->
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="formValidationBio">توضیحات:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6 fv-plugins-icon-container">
                                          <label class="form-label" for="formValidationName">قیمت:</label>
                                          <input class="form-control" type="number" name="price" id="name" value="{{ $product->price }}" required>
                                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                     <div class="col-md-6">
                                           <label class="form-label" for="categories[]">دسته‌بندی‌ها:</label>
                                           <select class="form-select" name="categories[]" required>
                                             @foreach($categories as $category)
                                                 <option value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                     {{ $category->name }}
                                                 </option>
                                             @endforeach
                                           </select>
                                       </div>
                                    <div class="col-md-6 fv-plugins-icon-container">
                                        <label class="form-label" for="formValidationName">فعلی محصول:</label>
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                                        @endif
                                        <label class="form-label" for="formValidationName">جدید محصول:</label>
                                        <input class="form-control" type="file" name="image" accept="image/*" id="name" required>
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                  </div>
                                  <div class="col-md-6">
                                        <label class="form-label" for="type">نوع محصول:</label>
                                        <select class="form-select" name="type" required>
                                            <option value="fixed" {{ $product->type === 'fixed' ? 'selected' : '' }}>تعرفه ای</option>
                                            <option value="view_based" {{ $product->type === 'view_based' ? 'selected' : '' }}>بازدیدی</option>
                                            <option value="package" {{ $product->type === 'package' ? 'selected' : '' }}>پکیج</option>
                                        </select>
                                    </div>
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">ثبت</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
