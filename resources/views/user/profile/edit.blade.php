@extends('layouts.user')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">ویرایش پروفایل</h5>
                                <div class="card-body">
                                      <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('user.profile') }}" enctype="multipart/form-data">
                                          @csrf
                                          @method('PATCH')
                                        <!-- Account Details -->
                                        <hr class="mt-0">
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="title">نام:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                        <!-- Choose Your Plan -->
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="description">ایمیل:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                      <div class="col-md-6 fv-plugins-icon-container">
                                          <label for="profile_image" class="form-label">تصویر پروفایل</label>
                                          <input type="file" class="form-control" id="profile_image" name="profile_image">
                                      </div>
                                      @if ($user->profile_image)
                                          <div class="col-md-12 fv-plugins-icon-container">
                                              <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="Profile Image" class="rounded-circle" width="150">
                                          </div>
                                      @endif
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">ذخیره تغییرات</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
