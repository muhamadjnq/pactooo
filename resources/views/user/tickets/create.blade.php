@extends('layouts.user')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">ایجاد تیکت جدید</h5>
                                <div class="card-body">
                                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('user.tickets.store') }}" method="POST" >
                                      @csrf
                                        <!-- Account Details -->
                                        <hr class="mt-0">
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="title">عنوان تیکت:</label>
                                            <input class="form-control" type="text" name="title" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                        <!-- Choose Your Plan -->
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="message">پیام:</label>
                                            <textarea class="form-control" name="message" rows="3"></textarea>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">ارسال</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
