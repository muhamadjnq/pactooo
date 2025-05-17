@extends('layouts.auth')
@section('seo')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>پکتو | تایید گدرواژه</title>
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
                                <h4 class="card-title text-center">تایید گدرواژه</h4>
                                  <form method="POST" method="POST" action="{{ route('password.confirm') }}">
                                      @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="text-muted">{{ __('لطفاً قبل از ادامه  گدرواژه خود را تأیید کنید.') }}</p>
                                            <div class="mb-3">
                                                <label class="form-label">آدرس ایمیل <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input class="form-control ps-5" placeholder="Password" type="password" id="password" name="password" required autocomplete="current-password">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">تایید</button>
                                            </div>
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
