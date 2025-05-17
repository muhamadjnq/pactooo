@extends('admin.layout')
@section('content')
<!-- container -->
<div class="container-fluid">
	<br>
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<h4 class="card-title mg-b-0">مدیریت پست ها</h4>
						<i class="mdi mdi-dots-horizontal text-gray"></i>
						@if (session('message'))
						<div class="alert alert-success" role="alert">
						{{ session('message') }}
						</div>
						@endif
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive hoverable-table">
						<div id="example-delete_wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table id="example-delete" class="table text-md-nowrap dataTable dtr-inline" role="grid" aria-describedby="example-delete_info" style="width: 1032px;">
							<thead>
								<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">عنوان</th>
								<th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">نویسنده</th>
								<th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">آدرس صفحه</th>
								<th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">وضعیت</th>
								<th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">تاریخ</th>
								<th cclass="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">ویرایش</th>
								</tr>
							</thead>
							<tbody>
								@foreach($blogs as $blog)
								<tr>
									<td class="tx-right tx-medium tx-inverse">{{ $blog->title}}</td>
									<td class="tx-right tx-medium tx-inverse">{{ $blog->author_id}}</td>
									<td class="tx-right tx-medium tx-inverse">{{ $blog->slug}}</td>
									@if($blog->Status == 'active')
									<td class="tx-right tx-medium tx-success">منتشر شده</td>
									@elseif($blog->Status == 'draft')
									<td class="tx-right tx-medium tx-inverse">پیش نویس</td>
									@else
									<td class="tx-right tx-medium tx-danger">غیرفعال</td>
									@endif
									<td class="tx-right tx-medium tx-inverse">{{ \Hekmatinasser\Verta\Verta::instance($blog->created_at)->formatJalaliDatetime() }}</td>
									<td class="tx-right tx-medium tx-inverse">
				<div class="col-lg-3">
				<div aria-label="مثال اساسی" class="btn-group" role="group">
			<button class="btn btn-secondary pd-x-15 active" type="button"><a href="{{ route('admin.blogs.edit', $blog) }}" style="color:white;">ویرایش</a></button>
				</div>
			</div>
			<form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">حذف</button>
                </form>
		</td>
								</tr>
								@endforeach
								@if(count($blogs) == 0)
								<tr>
									<td colspan="7" style="text-align: center">پستی موجود نیست !</td>
								</tr>
								@endif
								</tbody>
						</table>
						{{$blogs->links()}}
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
@endsection
