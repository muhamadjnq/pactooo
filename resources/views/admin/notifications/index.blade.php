@extends('admin.layout')
@section('content')
<!-- container -->
<div class="container-fluid">
  <!-- /breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">پنل مدیریت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/نوتیفیکیشن‌ها</span>
      </div>
    </div>
  </div>
  <br>
<div class="row row-sm">
<div class="col-xl-12">
      <div class="card card-table-two">
        <div class="d-flex justify-content-between">
          <h4 class="card-title mb-1">لیست نوتیفیکیشن‌ها</h4>
          <i class="mdi mdi-dots-horizontal text-gray"></i>
        </div>
        @if($notifications->isEmpty())
            <p class="text-center">هیچ نوتیفیکیشنی موجود نیست.</p>
        @else
        <div class="table-responsive country-table">
          <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
            <thead>
              <tr role="row">
                <th class="wd-lg-25p tx-right">عنوان</th>
                <th class="wd-lg-25p tx-right">منتشر شده در</th>
                <th class="wd-lg-25p tx-right">پیام</th>
                <th class="wd-lg-25p tx-right">عملیات</th>
              </tr>
            </thead>
            <tbody>
              @foreach($notifications as $notification)
              <tr role="row" class="odd" style="background-color:{{ $notification->is_read ? 'rgba(var(--bs-light-rgb), var(--bs-bg-opacity));' : 'rgb(255 202 0)' }}">
										<td>{{ $notification->title }}</td>
                    <td>{{\Morilog\Jalali\Jalalian::forge("{$notification->created_at}")->format('h:i d F y')}}</td>
                    <td>{{ $notification->message }}</td>
                    @if(!$notification->is_read)
                    <td class="tx-right tx-medium tx-inverse">
                      <form action="{{ route('admin.notifications.markAsRead', $notification->id) }}" method="POST">
                          @csrf
                          @method('PATCH')
                          <button type="submit" class="btn btn-sm btn-primary">علامت‌گذاری به عنوان خوانده‌شده</button>
                      </form>
                      </td>
                      @else
                      <td>خوانده شده</td>
                      @endif
								</tr>
              @endforeach
              @if(count($notifications) == 0)
              <tr>
                <td colspan="7" style="text-align: center">اطلاعیه ای موجود نیس!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
</div>
</div>
@endsection
@section('js')
@endsection
