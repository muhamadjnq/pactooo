@extends('admin.layout')
@section('content')
		<!-- container -->
		<div class="container-fluid">
			<!-- /breadcrumb -->
      <div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">پنل مدیریت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/مدیریت محصولات</span>
					</div>
				</div>
				<a href="{{ route('admin.products.create') }}">
						<button class="btn btn-instagram waves-effect waves-light" type="button">ایجاد محصول جدید</button>
				</a>
			</div>
			<br>
			<div class="row row-sm">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header pb-0">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mg-b-0">لیست خدمات</h4>
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
                    <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">تصویر</th>
                    <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">عنوان</th>
                    <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">نام</th>
                    <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">لینک</th>
                    <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 200px;">عملیات</th>
										</tr>
									</thead>
									<tbody>
										@foreach($products as $product)
									<tr role="row" class="odd">
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>
                        <button class="btn btn-secondary pd-x-25 active" type="button"><a href="{{ route('admin.products.edit', $product->id) }}" style="color:white;">ویرایش</a></button>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-secondary pd-x-25" type="submit" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
										</tr>
										@endforeach
									@if(count($products) == 0)
									<tr>
									<td colspan="7" style="text-align: center">هیچ محصولی ساخته نشده!</td>
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
@section('js')
<script>
        $(document).on("click", ".delete", function () {
            var id = $(this).data('id');
            var el = this;
            Swal.fire({
                title: 'از حذف مطمئن هستید؟',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00a018',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.value) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ url(config('app.admin_dir').'/users') }}/" + id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (response) {
                            toastr.success(response.message);
                            $(el).closest("tr").remove();
                        },
                        error: function (xhr) {
                            toastr.warning(xhr.responseJSON.errors);
                        }
                    });
                }
            });
        });

    </script>
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
