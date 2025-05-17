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
						<h4 class="card-title mg-b-0">لیست کد های تخفیف</h4>
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
								<th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">شماره</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">کد تخفیف</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">نوع تخفیف</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">مقدار تخفیف</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">محدودیت استفاده</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">تاریخ انقضاء</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">عملیات</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($discounts as $discount)
							<tr role="row" class="odd">
                <td>{{ $discount->id }}</td>
                <td>{{ $discount->code }}</td>
                <td>{{ $discount->percentage ? 'Percentage' : 'Fixed Amount' }}</td>
                <td>{{ $discount->percentage ?? $discount->fixed_amount }}</td>
                <td>{{ $discount->usage_limit ?? 'Unlimited' }}</td>
                <td>{{ $discount->expires_at ?? 'No Expiry' }}</td>
                <td>
                    <a href="{{ route('admin.discounts.edit', $discount->id) }}" class="btn btn-secondary pd-x-25 active">ویرایش</a>
                    <a href="{{ route('admin.discounts.show', $discount->id) }}" class="btn btn-primary">مشاهده</a>
                    <form action="{{ route('admin.discounts.destroy', $discount->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                    </form>
                </td>
								</td>
								</tr>
								@endforeach
							@if(count($discounts) == 0)
							<tr>
							<td colspan="7" style="text-align: center">هیچ کد تخفیفی ساخته نشده!</td>
							</tr>
							@endif
								</tbody>
						</table>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
@endsection
