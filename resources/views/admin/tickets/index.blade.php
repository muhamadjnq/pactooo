@extends('admin.layout')
@section('content')
		<!-- container -->
		<div class="container-fluid">
			<!-- /breadcrumb -->
      <div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">پنل مدیریت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/تیکت ها</span>
					</div>
				</div>
			</div>
<div class="row row-sm">
	<div class="col-xl-12">
					<div class="card card-table-two">
						<div class="d-flex justify-content-between">
							<h4 class="card-title mb-1">لیست تیکت ها</h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
						<div class="table-responsive country-table">
							<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
								<thead>
									<tr>
										<th class="wd-lg-25p">عنوان</th>
										<th class="wd-lg-25p tx-right">نویسنده</th>
										<th class="wd-lg-25p tx-right">تاریخ</th>
										<th class="wd-lg-25p tx-right">وضعیت</th>
										<th class="wd-lg-25p tx-right">عملیات</th>
                    <th class="wd-lg-25p tx-right">آدرس صفحه</th>
									</tr>
								</thead>
								<tbody>
                  @foreach($tickets as $ticket)
                  <tr>
										<td class="tx-right tx-medium tx-inverse">{{$ticket->title}}</td>
										<td class="tx-right tx-medium tx-inverse">{{ $ticket->user->name }}</td>
										<td class="tx-right tx-medium tx-inverse">{{ \Hekmatinasser\Verta\Verta::instance($ticket->created_at)->formatJalaliDatetime() }}</td>
										<td class="tx-right tx-medium tx-inverse">
											<span class="badge
												@if($ticket->status == 'open') bg-success
												@elseif($ticket->status == 'in_progress') bg-warning
												@else bg-secondary @endif">
												{{ $ticket->status }}
										</span>
									</td>
									<td>
                            <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="btn btn-info">مشاهده</a>
                            <form action="{{ route('admin.tickets.updateStatus', $ticket->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>باز</option>
                                    <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>در حال انجام</option>
                                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>بسته شده</option>
                                </select>
                            </form>
                        </td>
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
		</div>
		@endsection
@section('js')
@endsection
