@extends('admin.layout')
@section('content')
		<!-- container -->
		<div class="container-fluid">
			<!-- /breadcrumb -->
      <div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">پنل مدیریت</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ صفحات</span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ثبت صفحه جدید</span>
					</div>
				</div>
			</div>

<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="main-content-label mg-b-5">ثبت صفحه جدید</div>
							<div class="row">
								<div class="col-lg-12">
									<form action="{{ url(config('app.admin_dir').'/pages') }}" method="post" enctype="multipart/form-data">
										@csrf
									<div class="pd-30 pd-sm-40 bg-gray-200">
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">عنوان صفحه</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" id="title" autocomplete="off" name="title" placeholder="عنوان صفحه" type="text">
									</div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">عنوان انگلیسی صفحه</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" id="en_title" autocomplete="off" name="en_title" placeholder="عنوان انگلیسی صفحه" type="text">
									</div>
								</div>
								<div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">آدرس صفحه</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
										<input class="form-control" id="slug" name="slug" placeholder="آدرس صفحه" type="text">
									</div>
								</div>
                <div class="row row-xs align-items-center mg-b-20">
									<div class="col-md-4">
										<label class="form-label mg-b-0">توضیحات</label>
									</div>
									<div class="col-md-8 mg-t-5 mg-md-t-0">
                    <textarea id="editor" name="description" placeholder="توضیحات" rows="30" cols="80"></textarea>
									</div>
								</div>
								<button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">ثبت </button>
							</div>
							</form>
								</div>
							</div>
						</div>
					</div>
				</div>
</div>
		</div>
		@endsection
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
    </script>
@endsection
