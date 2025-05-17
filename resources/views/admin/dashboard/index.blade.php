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
										<h5 class="card-title">تعداد کل سفارش‌ها: {{ $totalOrders }}</h5>
										<p class="mb-1">در حال بررسی: {{ $pendingOrders }}</p>
										<p class="mb-1">تکمیل‌شده: {{ $completedOrders }}</p>
								</div>
							</div>
					</div>
					<!-- آمار پرداخت‌ها -->
					<div class="col-sm-6 col-lg-3 mb-4">
							<div class="card card-border-shadow-warning">
								<div class="card-body">
										<h5 class="card-title">مجموع پرداخت‌ها: {{ number_format($totalPayments, 0) }} تومان</h5>
										<p class="mb-1">موفق: {{ number_format($successfulPayments, 0) }} تومان</p>
										<p class="mb-1">تعداد پرداخت های ناموفق: {{ $failedPayments }}</p>
								</div>
							</div>
					</div>
					<!-- آمار کاربران -->
					<div class="col-sm-6 col-lg-3 mb-4">
							<div class="card card-border-shadow-danger">
									<div class="card-body">
											<h5 class="card-title">تعداد کل کاربران: {{ $totalUsers }} نفر</h5>
											<p class="mb-1">کاربران امروز: {{ $getusertoday }} نفر</p>
											<p class="mb-1">کاربران فعال: {{ $getusertoday }} نفر</p>
									</div>
							</div>
					</div>
					<!-- آمار محصولات -->
					<div class="col-sm-6 col-lg-3 mb-4">
							<div class="card card-border-shadow-info">
								<div class="card-body">
										<h5 class="card-title">تعداد کل محصولات: {{ $totalProducts }}</h5>
										<p class="mb-1">درآمد ماه جاری: {{ number_format($monthlyRevenue, 0) }} تومان</h5>
										<p class="mb-1">تعداد کل تیکت ها: {{ $totaltickets }}</h5>
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
										<h5 class="card-title m-0 me-2">آخرین پرداخت&zwnj;ها</h5>
								</div>
								<div class="table-responsive">
										<table class="table table-borderless border-top">
												<thead class="border-bottom">
												<tr>
													<th>مبلغ</th>
													<th>وضعیت</th>
													<th>تاریخ پرداخت</th>
												</tr>
												</thead>
												<tbody>
													@foreach($payments as $payment)
													<tr role="row" class="odd">
														<td>{{ number_format($payment->amount) }} تومان</td>
														<td>
															@if ($payment->status === 'pending')
																	<span class="badge bg-warning">در انتظار پرداخت</span>
															@elseif ($payment->status === 'confirmed')
																	<span class="badge bg-success">پرداخت شده</span>
															@else
																	<span class="badge bg-secondary">نامشخص</span>
															@endif
														</td>
														<td>{{ \Hekmatinasser\Verta\Verta::instance($payment->created_at)->formatJalaliDatetime() }}</td>
													</tr>
													@endforeach
												@if(count($payments) == 0)
												<tr><td colspan="7" style="text-align: center">هیچ پرداختی تاکنون ثبت نکرده اید!</td></tr>
												@endif
												</tbody>
										</table>
								</div>
						</div>
				</div>

				<div class="col-lg-6 mb-4 mb-lg-0">
							<div class="card h-100">
									<div class="card-header d-flex justify-content-between">
											<h5 class="card-title m-0 me-2">آخرین سفارش ها</h5>
									</div>
									<div class="table-responsive">
											<table class="table table-borderless border-top">
													<thead class="border-bottom">
													<tr>
														<th>محصولات</th>
														<th>مجموع قیمت</th>
														<th>وضعیت</th>
														<th>تاریخ</th>
													</tr>
													</thead>
													<tbody>
														@foreach($orders as $order)
														<tr role="row" class="odd">
																<td>
																		<ul>
																				@foreach($order->items as $item)
																						<li>{{ $item->product->name }}</li>
																				@endforeach
																		</ul>
																</td>
																<td>{{ number_format($order->total_price) }} تومان</td>
																<td>
																	@if ($order->status === 'pending')
																			<span class="badge bg-warning">در انتظار پرداخت</span>
																	@elseif ($order->status === 'confirmed')
																			<span class="badge bg-success">پرداخت شده</span>
																	@else
																			<span class="badge bg-secondary">نامشخص</span>
																	@endif
																</td>
																<td>{{ \Hekmatinasser\Verta\Verta::instance($order->created_at)->formatJalaliDatetime() }}</td>
														</tr>
														@endforeach
													@if(count($orders) == 0)
													<tr><td colspan="7" style="text-align: center">هیچ سفارشی تاکنون ثبت نکرده اید!</td></tr>
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
										<h5 class="card-title m-0 me-2">آخرین کاربران</h5>
								</div>
								<div class="table-responsive">
										<table class="table table-borderless border-top">
												<thead class="border-bottom">
												<tr>
													<th>نام</th>
													<th>ایمیل</th>
													<th>وضعیت</th>
													<th>تاریخ عضویت</th>
												</tr>
												</thead>
												<tbody>
													@foreach ($users as $key => $user)
													<tr role="row" class="odd">
														<td>{{ $user->name }}</td>
														<td>{{ $user->email }}</td>
														<td>
															@if ($user->status === 'else')
																	<span class="badge bg-success">فعال</span>
															@else ($user->status === 'confirmed')
																	<span class="badge bg-warning">غیرفعال</span>
															@endif
														</td>
														<td>{{ \Hekmatinasser\Verta\Verta::instance($user->created_at)->formatJalaliDatetime() }}</td>
													</tr>
													@endforeach
												</tbody>
										</table>
								</div>
						</div>
				</div>

				<div class="col-lg-6 mb-4 mb-lg-0">
							<div class="card h-100">
									<div class="card-header d-flex justify-content-between">
											<h5 class="card-title m-0 me-2">آخرین تیکت ها</h5>
									</div>
									<div class="table-responsive">
											<table class="table table-borderless border-top">
													<thead class="border-bottom">
													<tr>
														<th>عنوان</th>
														<th>وضعیت</th>
														<th>تاریخ</th>
													</tr>
													</thead>
													<tbody>
														@foreach($tickets as $ticket)
					                  <tr  role="row" class="odd">
															<td>{{$ticket->title}}</td>
															<td>
																@if ($ticket->status === 'open')
																	<span class="badge bg-success">باز</span>
															@elseif($ticket->status === 'closed')
																	<span class="badge bg-danger">بسته</span>
															@else
																	<span class="badge bg-warning">نامشخص</span>
															@endif
														</td>
														<td>{{ \Hekmatinasser\Verta\Verta::instance($ticket->created_at)->formatJalaliDatetime() }}</td>
														</tr>
					                  @endforeach
														@if(count($tickets) == 0)
					                  <tr>
					                    <td colspan="7" style="text-align: center">تیکتی موجود نیست!</td>
					                  </tr>
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
