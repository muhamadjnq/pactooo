@extends('admin.layout')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
    crossorigin="anonymous">
		<!-- container -->
		<div class="container-fluid">
			<!-- /breadcrumb -->
      <div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">پنل مدیریت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ کاربران</span>
					</div>
				</div>
			</div>

      <div class="container">
          <div class="row">
              <div class="col-xs-offset-3 col-xs-6">
                  <h2 class="text-right">کوتاه کننده لینک</h2>
                  <form>
                      <input type="url" name="url" class="form-control" placeholder="لینک آدرس" required autofocus>
                      <br>
                      <button class="btn btn-lg btn-primary btn-block" type="button">کوتاه کن</button>
                  </form>
              </div>
          </div>
      </div>


		@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
<script>
    $(function(){
        $("form button").click(function(){
            var button = $(this);
            $(button).prop('disabled', true);//  دکمه رو تا زمان دریافت نتیجه غیرفعال میشه
            $("form .alert").remove();
            $.ajax({
                url: @json(route("admin.request_link")),
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': @json(csrf_token())
                },
                data: $("form").serialize(),
                success: function(response) {
                    //  اسلاگ رو نمایش میدیم
                    $("form").prepend(`<div class="alert alert-success">
                        ${response.slug}
                    </div>`);
                    $(button).prop('disabled', false); // دکمه رو فعال میشه
                },
                error: function(xhr, status, errorThrown) {
                    //  ورودی مشکل داره پس ارور ها رو نشون میدیم
                    var urlErrors = xhr.responseJSON.errors.url;
                    for(var i in urlErrors) {
                        $("form").prepend(`<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            ${urlErrors[i]}
                        </div>`);
                    }
                    $(button).prop('disabled', false); // دکمه رو فعال میشه
                }
            });
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
