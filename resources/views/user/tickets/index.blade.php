@extends('layouts.user')
@section('content')
<!-- container -->
<div class="container-fluid">
<br>
<div class="row row-sm">

<div class="col-xl-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">لیست تیکت ها</h4>
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
                <tr>
                  <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 68px;">عنوان تیکت</th>
                  <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 68px;">وضعیت</th>
                  <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 68px;">تاریخ ارسال</th>
                  <th class="sorting" tabindex="0" aria-controls="example-delete" rowspan="1" colspan="1" style="width: 68px;">عملیات</th>
                </tr>
            </thead>
            <tbody>
              @foreach($tickets as $ticket)
                  <tr role="row" class="odd">
                      <td>{{ $ticket->title }}</td>
                      <td>
                        <span class="badge
                                @if($ticket->status == 'open') bg-success
                                @elseif($ticket->status == 'in_progress') bg-warning
                                @else bg-secondary @endif">
                                {{ $ticket->status }}
                            </span>
                          </td>
                      <td>{{ $ticket->created_at->format('d-m-Y') }}</td>
                      <td>
                          <a href="{{ route('user.tickets.show', $ticket->id) }}" class="btn btn-primary">مشاهده</a>
                      </td>
                  </tr>
              @endforeach
              @if(count($tickets) == 0)
              <tr>
                <td colspan="7" style="text-align: center">تیکتی برای شما ثبت نشده است!</td>
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
