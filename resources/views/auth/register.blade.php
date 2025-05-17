@extends('layouts.auth')
@section('seo')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>پکتو | ثبت نام</title>
@endsection
@section('content')
<div class="back-to-home rounded d-none d-sm-block"><a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a></div>
        <section class="bg-auth-home d-table w-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="me-lg-5">
                            <img src="/assets/img/signup.svg" class="img-fluid d-block mx-auto" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="card shadow rounded border-0">
                            <div class="card-body">
                              <x-auth-session-status class="mb-4" :status="session('status')" />
                                <h4 class="card-title text-center">ثبت نام </h4>
                                  <form class="login-form mt-4" method="POST" action="{{ route('register') }}">
                                      @csrf
                                      <input type="hidden" name="ref" value="{{ request()->get('ref') }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">نام و نام خانوادگی: <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input class="form-control ps-5" id="name" type="name" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="نام و نام خانوادگی">
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">ایمیل شما <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input class="form-control ps-5" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="ایمیل">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">شماره تماس <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input class="form-control ps-5" type="tel" id="phone" name="phone" pattern="[0-9]{11}" :value="old('phone')" placeholder="09123456789" required>
                                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="Password">گذرواژه <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="password" class="form-control ps-5" placeholder="گذرواژه" id="password" name="password" required autocomplete="new-password">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="password_confirmation">تکرار گذرواژه  <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="password" class="form-control ps-5" placeholder="تکرار گذرواژه" id="password" name="password_confirmation" required autocomplete="new-password">
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">تایید میکنم <a class="text-primary">قوانین سایت پکتو را و تیکت را فعال میکنم</a></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">ثبت نام </button>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-4 text-center">
                                            <h6>یا با آن ثبت نام کنید</h6>
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <div class="d-grid">
                                                        <a href="{{ route('auth.google') }}" class="btn btn-light"><i class="mdi mdi-google text-danger"></i> گوگل </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mx-auto">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">قبلاً حساب دارید؟</small> <a href="{{ route('login') }}" class="text-dark fw-bold">وارد شوید </a></p>
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
