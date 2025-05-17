@extends('layouts.user')
@section('content')
<div class="content-wrapper">
                <!-- Content -->
                <div class="flex-grow-1 container-p-y container-fluid">
                  <h3>تیکت ها</h3>
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-9 col-md-8 col-12 mb-m">
                            <div class="card invoice-preview-card">
                              @if (session('success'))
                  						<div class="alert alert-success" role="alert">
                  						{{ session('success') }}
                  						</div>
                  						@endif
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                                        <div class="mb-xl-0 mb-4">
                                            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                                <span class="app-brand-text fw-bold fs-4">عنوان تیکت: {{ $ticket->title }}</span>
                                            </div>
                                            <p><strong>نام کاربری :</strong> {{ $ticket->user->name }}<p>
                                        </div>
                                        <div>
                                            <h4 class="fw-medium mb-2">وضعیت:
                                              @if ($ticket->status === 'open')
                                                  <span class="badge bg-success">باز</span>
                                              @elseif($ticket->status === 'closed')
                                                  <span class="badge bg-danger">بسته</span>
                                              @else
                                                  <span class="badge bg-warning">نامشخص</span>
                                              @endif
                                            </h4>
                                            <div class="mb-2 pt-1"><p class="mb-2">تاریخ ثبت تیکت: {{ $ticket->created_at->format('Y/m/d H:i') }}</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                            <div class="card">
                                <div class="card-body">
                                    @if ($ticket->status === 'open')
                                    <button class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light" data-bs-target="#editUser" data-bs-toggle="modal" type="button">ارسال پاسخ</button>
								                    @else
                                    <a class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">تیکت بسته شده</a>
								                    @endif
                                    @if(auth()->user()->role === 'admin')
                                    <button class="btn btn-primary d-grid w-100 mb-2 waves-effect waves-light" data-bs-target="#editstatus" data-bs-toggle="modal" type="button">تفییر وضعیت تیکت</button>
								                    @endif
                                    <a href="{{ route('user.tickets.index') }}">
                                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">
                                        <span class="d-flex align-items-center justify-content-center text-nowrap">بازگشت به لیست تیکت ها</span>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title mg-b-0">پیام ها:</h4>
                        <div class="col-xl-9 col-md-8 col-12 mb-m">
                            <div class="card invoice-preview-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                                        <div class="mb-xl-0 mb-4 col-xl-9 col-md-8 col-12 mb-m">
                                            @foreach($ticket->messages as $message)
                                                <p><strong>توضیحات:</strong> {{ $message->message }}</p>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Edit User Modal -->
            <div aria-hidden="true" class="modal fade" id="editUser" tabindex="-1">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                            <div class="text-center mb-4">
                                  <h3 class="mb-2">ارسال پاسخ</h3>
                            </div>
                            <form class="row g-3" id="editUserForm" action="{{ route('user.tickets.reply', $ticket->id) }}" method="POST">
                                @csrf
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="message">متن پاسخ:</label>
                                    <input class="form-control" id="modalEditUserStatus" name="message" type="text"/>
                                </div>
                                <div class="col-12 text-center mt-5">
                                    <button class="btn btn-primary me-sm-3 me-1" type="submit">ارسال</button>
                                    <button aria-label="Close" class="btn btn-label-secondary" data-bs-dismiss="modal" type="reset"> بازگشت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->
            <!-- Edit Status Modal -->
            <div aria-hidden="true" class="modal fade" id="editstatus" tabindex="-1">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                            <div class="text-center mb-4">
                                  <h3 class="mb-2">تغییر وضعیت تیکت</h3>
                            </div>
                            <form class="row g-3" id="editstatusForm" action="{{ route('user.tickets.updateStatus', $ticket->id) }}" method="POST">
                                @csrf
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="status">تغییر وضعیت:</label>
                                  <select aria-label="Default select example" class="select2 form-select" id="status" name="status">
                                      <option selected>انتخاب وضعیت...</option>
                                      <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>باز</option>
                                      <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>در حال بررسی</option>
                                      <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>بسته</option>
                                  </select>
                              </div>
                              <div class="col-12 text-center mt-5">
                                  <button class="btn btn-primary me-sm-3 me-1" type="submit">ارسال</button>
                                  <button aria-label="Close" class="btn btn-label-secondary" data-bs-dismiss="modal" type="reset"> بازگشت</button>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit Status Modal -->
            <script src="/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/assets/vendor/libs/popper/popper.js"></script>
<script src="/assets/vendor/js/bootstrap.js"></script>
<script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/assets/vendor/libs/hammer/hammer.js"></script>
<script src="/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="/assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="/assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
<script src="/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
<script src="/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<!-- Main JS -->
<script src="/assets/js/main.js"></script>
<!-- Page JS -->
<script src="/assets/js/pages-pricing.js"></script>
<script src="/assets/js/modal-create-app.js"></script>
<script src="/assets/js/modal-add-new-cc.js"></script>
<script src="/assets/js/modal-add-new-address.js"></script>
<script src="/assets/js/modal-edit-user.js"></script>
<script src="/assets/js/modal-enable-otp.js"></script>
<script src="/assets/js/modal-share-project.js"></script>
<script src="/assets/js/modal-two-factor-auth.js"></script>
@endsection
