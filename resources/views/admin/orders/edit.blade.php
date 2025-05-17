@extends('admin.layout')
							@section('content')
									<!-- container -->
									<div class="container-fluid">
										<br><br>

							<div class="row row-sm">
								<div class="col-lg-12 col-md-12">
												<div class="card">
													<h5 class="card-header">ویرایش سفارش #{{ $order->id }}</h5>
													<div class="card-body">
														<form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.orders.update', $order->id) }}" method="POST">
															@csrf
															@method('PUT')
															<!-- Account Details -->
															<hr class="mt-0">
															<div class="col-md-6 fv-plugins-icon-container">
																	<label class="form-label" for="total_price">قیمت:</label>
																	<input type="text" class="form-control" id="total_price" name="total_price" value="{{ $order->total_price }}" required>
															<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
														</div>
															<!-- Choose Your Plan -->
															<div class="col-md-12 fv-plugins-icon-container">
																	<label class="form-label" for="quantity">تعداد:</label>
																	<input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
															<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
														</div>
														<div class="col-md-12 fv-plugins-icon-container">
																<label class="form-label" for="product_id">محصول سفارش شده:</label>
																		<select name="product_id" id="product_id" class="form-select" required>
																			@foreach($order->items as $item)
																				<option value="{{ $item->product->id }}">{{ $item->product->name }}</option>
																				@endforeach
																		</select>

														<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
													</div>
														<div class="mb-3">
																<label for="status" class="form-label">وضعیت سفارش</label>
																<select name="status" id="status" class="form-select">
																		<option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>در انتظار</option>
																		<option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>تایید شده</option>
																		<option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>لغو شده</option>
																</select>
														</div>
															<div class="col-12"><hr class="mt-0"></div>
															<div class="col-12">
																	<button type="submit" class="btn btn-primary waves-effect waves-light">ذخیره تغییرات</button>
																	<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">بازگشت</a>
															</div>
													</form>
													</div>
												</div>
											</div>
							</div>
									</div>
									@endsection
