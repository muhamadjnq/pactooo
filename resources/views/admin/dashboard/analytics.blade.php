@extends('admin.layout')
@section('content')
		<!-- container -->
		<div class="container-fluid">
			<!-- /breadcrumb -->
			<br><br>
			<div class="row">
				<!-- آمار سفارش‌ها -->
					<div class="col-sm-6 col-lg-3 mb-4">
							<div class="card card-border-shadow-primary">
								<div class="card-body">
									<h5 class="card-title">بازدیدها</h5>
									<p class="mb-1">7 روز گذشته: {{ $visitsLast7Days->sum('visitors') }}</p>
								</div>
							</div>
					</div>
					<!-- آمار پرداخت‌ها -->
					<div class="col-sm-6 col-lg-3 mb-4">
							<div class="card card-border-shadow-warning">
								<div class="card-body">
									<h5 class="card-title">بازدیدها</h5>
									<p class="mb-1">30 روز گذشته: {{ $visitsLast30Days->sum('visitors') }}</p>
								</div>
							</div>
					</div>
					<!-- آمار کاربران -->
					<div class="col-sm-6 col-lg-3 mb-4">
							<div class="card card-border-shadow-danger">
									<div class="card-body">
										<h5 class="card-title">بازدیدها</h5>
										<p class="mb-1">90 روز گذشته: {{ $visitsLast90Days->sum('visitors') }}</p>
									</div>
							</div>
					</div>
					<!-- آمار محصولات -->
					<div class="col-sm-6 col-lg-3 mb-4">
							<div class="card card-border-shadow-info">
								<div class="card-body">
									<h5 class="card-title">بازدیدها</h5>
									<p class="mb-1">180 روز گذشته: {{ $visitsLast180Days->sum('visitors') }}</p>
									<p class="mb-1">360 روز گذشته: {{ $visitsLast360Days->sum('visitors') }}</p>
								</div>
							</div>
					</div>
			</div>
			<!--/ Card Border Shadow -->
			<!-- On route vehicles Table -->
			<div class="row">
			<div class="col-lg-6 mb-4 mb-lg-0">
						<div class="card h-100">
								<div class="card-header d-flex justify-content-between">
										<h5 class="card-title m-0 me-2">صفحات محبوبا</h5>
								</div>
								<div class="table-responsive">
										<table class="table table-borderless border-top">
												<thead class="border-bottom">
												<tr>
													<th>URL</th>
			                    <th>عنوان</th>
			                    <th>بازدیدها</th>
												</tr>
												</thead>
												<tbody>
													@foreach($mostVisitedPages as $page)
													<tr role="row" class="odd">
														<td>{{ $page['url'] }}</td>
                        <td>{{ $page['pageTitle'] }}</td>
                        <td>{{ $page['pageViews'] }}</td>
													</tr>
													@endforeach
												@if(count($mostVisitedPages) == 0)
												<tr><td colspan="7" style="text-align: center">صفحه محبوبی وجود ندارد!</td></tr>
												@endif
												</tbody>
										</table>
								</div>
						</div>
				</div>

				<div class="col-lg-6 mb-4 mb-lg-0">
							<div class="card h-100">
									<div class="card-header d-flex justify-content-between">
											<h5 class="card-title m-0 me-2">منابع ترافیک</h5>
									</div>
									<div class="table-responsive">
											<table class="table table-borderless border-top">
													<thead class="border-bottom">
													<tr>
														<th>منبع</th>
                    				<th>بازدیدها</th>
													</tr>
													</thead>
													<tbody>
														@foreach($topReferrers as $referrer)
														<tr role="row" class="odd">
															<td>{{ $referrer['url'] }}</td>
															<td>{{ $referrer['pageViews'] }}</td>
														</tr>
														@endforeach
													@if(count($topReferrers) == 0)
													<tr><td colspan="7" style="text-align: center">هیچ منابع ترافیکی ثبت نشده است!</td></tr>
													@endif
													</tbody>
											</table>
									</div>
							</div>
					</div>
			</div>
			<!--/ On route vehicles Table -->
			<br>
			<!-- On route vehicles Table -->
			<div class="row">
			<div class="col-lg-6 mb-4 mb-lg-0">
						<div class="card h-100">
								<div class="card-header d-flex justify-content-between">
										<h5 class="card-title m-0 me-2">کاربران براساس کشور</h5>
								</div>
								<div class="table-responsive">
										<table class="table table-borderless border-top">
												<thead class="border-bottom">
												<tr>
													<th>کشور</th>
                    			<th>تعداد کاربران</th>
												</tr>
												</thead>
												<tbody>
													@foreach($visitorsByCountry as $country)
													<tr role="row" class="odd">
														<td>{{ $country[0] }}</td>
                        		<td>{{ $country[1] }}</td>
													</tr>
													@endforeach
													@if(count($visitorsByCountry) == 0)
													<tr><td colspan="7" style="text-align: center">هیچ منابع کشوری ثبت نشده!</td></tr>
													@endif
												</tbody>
										</table>
								</div>
						</div>
				</div>

				<div class="col-lg-6 mb-4 mb-lg-0">
							<div class="card h-100">
									<div class="card-header d-flex justify-content-between">
											<h5 class="card-title m-0 me-2">کاربران براساس دستگاه</h5>
									</div>
									<div class="table-responsive">
											<table class="table table-borderless border-top">
													<thead class="border-bottom">
													<tr>
														<th>دستگاه</th>
                    				<th>تعداد کاربران</th>
													</tr>
													</thead>
													<tbody>
														@foreach($visitorsByDevice as $device)
						                    <tr role="row" class="odd">
						                        <td>{{ $device[0] }}</td>
						                        <td>{{ $device[1] }}</td>
						                    </tr>
						                @endforeach
														@if(count($visitorsByDevice) == 0)
														<tr><td colspan="7" style="text-align: center">هیچ منابع دستگاهی ثبت نشده!</td></tr>
														@endif
													</tbody>
											</table>
									</div>
							</div>
					</div>
			</div>
			<!--/ On route vehicles Table -->
		</div>
		@endsection
@section('js')

		<!--Internal Echart Plugin -->
<script src="assets/plugins/echart/echart.js"></script>
<script src="assets/js/echarts.js"></script>
@endsection
