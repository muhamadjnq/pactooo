@extends('admin.layout')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
  <br>
                            <div class="card">
                                <h5 class="card-header">ویرایش پست</h5>
                                <div class="card-body">
																		<form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
																	    @csrf
																	    @method('PUT')
                                        <!-- Account Details -->
                                        <div class="col-12">
                                            <hr class="mt-0">
                                        </div>
                                        <div class="col-md-6 fv-plugins-icon-container">
                                            <label class="form-label" for="title">عنوان پست:</label>
                                            <input class="form-control" type="text" name="title" value="{{ $blog->title }}" required>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
																	<div class="col-md-6 fv-plugins-icon-container">
																			<label class="form-label" for="img">تصویر فعلی پست:</label>
																			@if($blog->img)
																					<img src="{{ asset('storage/' . $blog->img) }}" alt="{{ $blog->title }}" style="max-width: 100px;">
																			@endif
																			<label class="form-label" for="formValidationName">آپلود تصویر جدید:</label>
																			<input class="form-control" type="file" name="img" accept="image/*" id="img" required>
																	<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
																</div>
                                        <!-- Choose Your Plan -->
                                        <div class="col-md-12 fv-plugins-icon-container">
                                            <label class="form-label" for="description">توضیحات:</label>
                                            <textarea class="form-control"id="editor" name="body" rows="30" cols="80">{{ $blog->body }}</textarea>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                      </div>
																		<div class="row row-xs align-items-center mg-b-20">
																			<div class="col-md-4">
																				<label class="form-label" for="status">وضعیت پست:</label>
																			</div>
																			<div class="col-md-8 mg-t-5 mg-md-t-0">
																				<select class="form-select" name="status">
																					<option value="active" {{ $blog->status === 'active' ? 'selected' : '' }}>فعال</option>
															            <option value="draft" {{ $blog->status === 'draft' ? 'selected' : '' }}>پیش‌نویس</option>
															            <option value="inactive" {{ $blog->status === 'inactive' ? 'selected' : '' }}>غیرفعال</option>
																				</select>
																			</div>
																		</div>
                                        <div class="col-12"><hr class="mt-0"></div>
                                        <div class="col-12">
																						<button type="submit" class="btn btn-primary waves-effect waves-light">ذخیره تغییرات</button>
    																				<a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">لغو</a>
                                        </div>
                                    </form>
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
