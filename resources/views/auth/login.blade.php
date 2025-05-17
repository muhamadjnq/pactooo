@extends('layouts.auth')
@section('seo')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>پکتو | ورود</title>
@endsection
@section('content')
<div class="back-to-home rounded d-none d-sm-block"><a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a></div>
        <section class="bg-home d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="me-lg-5">
                            <img src="/assets/img/login.svg" class="img-fluid d-block mx-auto" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="card login-page bg-white shadow rounded border-0">
                            <div class="card-body">
                              <x-auth-session-status class="mb-4" :status="session('status')" />
                                <h4 class="card-title text-center">ورود</h4>
                                  <form method="POST" action="{{ route('login') }}" class="login-form mt-4">
                                      @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">ایمیل شما <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input type="email" class="form-control ps-5" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="ایمیل">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="Password">رمز عبور  <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="password" class="form-control ps-5" id="password" name="password" required autocomplete="current-password" placeholder="رمز عبور ">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">مرا به خاطر بسپار </label>
                                                    </div>
                                                </div>
                                                @if (Route::has('password.request'))
                                                <p class="forgot-pass mb-0"><a href="{{ route('password.request') }}" class="text-dark fw-bold">فراموشی رمز عبور؟ </a></p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">ورود </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-4 text-center">
                                            <h6>یا با آن وارد شوید</h6>
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <div class="d-grid">
                                                        <a href="{{ route('auth.google') }}" class="btn btn-light"><i class="mdi mdi-google text-danger"></i> گوگل </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">حسابی ندارید؟ </small> <a href="/register" class="text-dark fw-bold">ثبت نام کنید </a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
