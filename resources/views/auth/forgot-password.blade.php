@extends('layouts.auth')
@section('seo')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>پکتو | فراموشی گدرواژه</title>
@endsection
@section('content')
<div class="back-to-home rounded d-none d-sm-block"><a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a></div>
        <section class="bg-home d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="me-lg-5">
                            <img src="/assets/img/recovery.svg" class="img-fluid d-block mx-auto" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="card shadow rounded border-0">
                            <div class="card-body">
                              <x-auth-session-status class="mb-4" :status="session('status')" />
                                <h4 class="card-title text-center">فراموشی گدرواژه</h4>
                                  <form method="POST" action="{{ route('password.email') }}" class="login-form mt-4">
                                      @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="text-muted">رمز عبور خود را فراموش کرده اید؟ مشکلی نیست فقط آدرس ایمیل خود را به ما اطلاع دهید و ما یک پیوند بازنشانی رمز عبور را برای شما ایمیل می کنیم که به شما امکان می دهد رمز جدیدی را انتخاب کنید.</p>
                                            <div class="mb-3">
                                                <label class="form-label">آدرس ایمیل <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input class="form-control ps-5" id="email" type="email" name="email" :value="old('email')" autocomplete="email" placeholder="ایمیل" required autofocus>
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">بازیابی گذرواژه</button>
                                            </div>
                                        </div>
                                        <div class="mx-auto">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">رمز عبور خود را به خاطر می آورید؟</small> <a href="{{ route('login') }}" class="text-dark fw-bold">وارد شوید </a></p>
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
