@extends('layouts.auth')
@section('seo')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>پکتو | تایید ایمیل</title>
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
                              @if (session('status') == 'verification-link-sent')
                                  <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                      {{ __('یک پیوند تأیید جدید به آدرس ایمیلی که هنگام ثبت نام ارائه کرده اید ارسال شده است.') }}
                                  </div>
                              @endif
                                <h4 class="card-title text-center">تایید ایمیل</h4>
                                <form method="POST" action="{{ route('verification.send') }}" class="login-form mt-4">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="text-muted">{{ __('از ثبت نام متشکریم! قبل از شروع، آیا می‌توانید آدرس ایمیل خود را با کلیک کردن روی لینکی که به تازگی برای شما ایمیل کرده‌ایم تأیید کنید؟ اگر ایمیلی را دریافت نکردید، ما با کمال میل ایمیل دیگری برای شما ارسال خواهیم کرد.') }}</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">ارسال مجدد ایمیل تایید</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br><br>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">{{ __('خروج') }}</button>
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
