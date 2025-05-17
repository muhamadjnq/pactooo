@extends('admin.layout')
@section('content')
		<!-- container -->
		<div class="container-fluid">
			<!-- /breadcrumb -->
      <div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">پنل مدیریت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ کاربران</span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ثبت کاربر جدید</span>
					</div>
				</div>
			</div>

<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="main-content-label mg-b-5">ثبت کاربر جدید</div>
							<div class="row">
								<div class="col-lg-12">
									<form action="{{ url(config('app.admin_dir').'/users') }}" method="post">
										@csrf
									<div class="pd-30 pd-sm-40 bg-gray-200">
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">نام</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" name="name" placeholder="نام را وارد کنید" type="text">
									</div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">ایمیل</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" name="email" placeholder="ایمیل را وارد کنید" type="email">
									</div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">شماره تلفن</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" name="phone" placeholder="شماره تلفن را وارد کنید" type="phone">
									</div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">کلمه عبور</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" name="password" placeholder="کلمه عبور را وارد کنید" type="password">
									</div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">تایید کلمه  عبور</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" name="password_confirmation" placeholder="تایید کلمه عبور را وارد کنید" type="password">
									</div>
								</div>
								<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">ثبت </button>
							</div>
							</form>
								</div>
							</div>
						</div>
					</div>
				</div>
</div>
		</div>
		@endsection
@section('js')
@endsection
