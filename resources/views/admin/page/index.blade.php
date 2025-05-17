@extends('admin.layout')
@section('content')
		<!-- container -->
		<div class="container-fluid">
			<!-- /breadcrumb -->
      <div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">پنل مدیریت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ صفحات</span>
					</div>
				</div>
				<div class="d-flex my-xl-auto right-content">
					<div class="mb-3 mb-xl-0">
						<div class="btn-group dropdown">
							<a class="btn btn-primary" href="/admin/pages/create" style="color:white;">صفحه جدید</a>
						</div>
					</div>
				</div>
			</div>

<div class="row row-sm">
	<div class="col-xl-12">
					<div class="card card-table-two">
						<div class="d-flex justify-content-between">
							<h4 class="card-title mb-1">لیست صفحات</h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
						<div class="table-responsive country-table">
							<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
								<thead>
									<tr>
										<th class="wd-lg-25p">عنوان</th>
										<th class="wd-lg-25p tx-right">نویسنده</th>
										<th class="wd-lg-25p tx-right">وضعیت</th>
										<th class="wd-lg-25p tx-right">تاریخ</th>
										<th class="wd-lg-25p tx-right">ویرایش</th>
                    <th class="wd-lg-25p tx-right">آدرس صفحه</th>
									</tr>
								</thead>
								<tbody>
                  @foreach($pages as $page)
                  <tr>
										<th>{{ $user->id }}</th>
										<td class="tx-right tx-medium tx-inverse">{{$page->title}}</td>
										<td class="tx-right tx-medium tx-inverse"><a href="{{url(config('app.admin_dir').'/users/'.$page->user->id.'/edit')}}">{{(!isset($page->user->roles['name']) ? $page->user['lname'] : $page->user->roles['name'])}}</a></td>
                    @if($page->status == 'active')
                    <td class="tx-right tx-medium tx-success">منتشر شده</td>
                    @elseif($page->status == 'draft')
                    <td class="tx-right tx-medium tx-inverse">پیش نویس</td>
                    @else
                    <td class="tx-right tx-medium tx-danger">غیرفعال</td>
                    @endif
                    <td class="tx-right tx-medium tx-inverse">{{ $user->role }}</td>
										<td class="tx-right tx-medium tx-inverse">{{ $user->email }}</td>
									</tr>
                  @endforeach
									@if(count($pages) == 0)
                  <tr>
                    <td colspan="7" style="text-align: center">صفحه ای موجود نیست!</td>
                  </tr>
                  @endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
</div>
		</div>
		@endsection
@section('js')
@endsection
