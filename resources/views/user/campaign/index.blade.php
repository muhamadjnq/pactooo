@extends('layouts.user')
@section('content')
<!-- container -->
<div class="container-fluid">
	<!-- /breadcrumb -->
	<br>
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<h4 class="card-title mg-b-0">لیست کمپین ها</h4>
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
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1">نام کمپین</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1">هزینه کمپین</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 300px;">اهداف</th>
                <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 400px;">آیتم های کمپین</th>
								<th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1">عملیات</th>
								</tr>
							</thead>
							<tbody>
                @foreach ($campaigns as $campaign)
                    <tr role="row" class="odd">
                        <td>{{ $campaign->name }}</td>
                        <td>{{ number_format($campaign->budget) }} تومان</td>
                        <td>{{ $campaign->goal }}</td>
                        <td>
                          <ul>
                          @foreach ($campaign->products as $product)
                            <li>{{ \Illuminate\Support\Str::limit($product->name, 50, '') }}</li>
                        @endforeach
                        </ul>
                      </td>
												<td><a href="{{ route('user.campaigns.show', $campaign) }}" class="btn btn-primary">جزئیات و پرداخت</a></td>
                    </tr>
                @endforeach
							@if(count($campaigns) == 0)
							<tr><td colspan="7" style="text-align: center">هیچ کمپین تاکنون ثبت نکرده اید!</td></tr>
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
@section('js')
<!-- Internal Data tables -->
<script src="/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/admin/plugins/datatable/js/dataTables.dataTables.min.js"></script>
<script src="/admin/plugins/datatable/js/dataTables.responsive.min.js"></script>
<script src="/admin/plugins/datatable/js/responsive.dataTables.min.js"></script>
<script src="/admin/plugins/datatable/js/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="/admin/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="/admin/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatable/js/jszip.min.js"></script>
<script src="/admin/plugins/datatable/js/pdfmake.min.js"></script>
<script src="/admin/plugins/datatable/js/vfs_fonts.js"></script>
<script src="/admin/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="/admin/plugins/datatable/js/buttons.print.min.js"></script>
<script src="/admin/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="/admin/plugins/datatable/js/dataTables.responsive.min.js"></script>
<script src="/admin/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
<!--Internal  Datatable js -->
<script src="/admin/js/table-data.js"></script>
@endsection
