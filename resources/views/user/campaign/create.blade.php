<!DOCTYPE html>
<html class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" data-assets-path="/assets/" data-template="vertical-menu-template-no-customizer" data-theme="theme-default" dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
    <title>پنل کاربری | ساخت کمپین</title>
    <meta content="" name="description"/>
    <!-- Favicon -->
    <link href="/assets/img/favicon/favicon.ico" rel="icon" type="image/x-icon"/>
    <link href="/assets/vendor/fonts/fontawesome.css" rel="stylesheet"/>
    <link href="/assets/vendor/fonts/tabler-icons.css" rel="stylesheet"/>
    <link href="/assets/vendor/fonts/flag-icons.css" rel="stylesheet"/>
    <link class="template-customizer-core-css" href="/assets/vendor/css/rtl/core.css" rel="stylesheet"/>
    <link class="template-customizer-theme-css" href="/assets/vendor/css/rtl/theme-default.css" rel="stylesheet"/>
    <link href="/assets/css/demo.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/node-waves/node-waves.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/typeahead-js/typeahead.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/apex-charts/apex-charts.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" rel="stylesheet"/>
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
    <link href="/assets/css/rtl.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/select2/select2.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/plyr/plyr.css" rel="stylesheet"/>
    <link href="/assets/vendor/css/pages/cards-advance.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/apex-charts/apex-charts.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" rel="stylesheet"/>

    <link href="/assets/css/fontawesome.css" rel="stylesheet"/>
    <link href="/assets/css/tabler-icons.css" rel="stylesheet"/>
    <link href="/assets/css/flag-icons.css" rel="stylesheet"/>
    <link href="/assets/css/core.css" rel="stylesheet"/>
    <link href="/assets/css/theme-default.css" rel="stylesheet"/>
    <link href="/assets/css/demo.css" rel="stylesheet"/>
    <link href="/assets/css/node-waves.css" rel="stylesheet"/>
    <link href="/assets/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="/assets/css/typeahead.css" rel="stylesheet"/>
    <link href="/assets/css/bs-stepper.css" rel="stylesheet"/>
    <link href="/assets/css/bootstrap-select.css" rel="stylesheet"/>
    <link href="/assets/css/select2.css" rel="stylesheet"/>
    <link href="/assets/css/index.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker/dist/css/persian-datepicker.min.css">
    <style>
         /* Custom Table Styling */
         .custom-table {
          border-collapse: separate;
          border-spacing: 0;
          border: 1px solid #dee2e6;
          border-radius: 8px;
          overflow: hidden;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .custom-table thead {
          background-color: #f8f9fa;
        }

        .custom-table thead th {
          text-align: center;
          font-weight: bold;
          color: #495057;
        }

        .custom-table tbody tr:hover {
          background-color: #e9ecef;
        }

        .custom-table td,
        .custom-table th {
          padding: 12px 15px;
          text-align: center;
          vertical-align: middle;
          border: 1px solid #dee2e6;
        }

        /* Add striped effect for rows */
        .custom-table tbody tr:nth-child(odd) {
          background-color: #f8f9fa;
        }
        .checkbox-wrapper-17 input[type=checkbox] {
        height: 0;
        width: 0;
        visibility: hidden;
      }
      .checkbox-wrapper-2 .ikxBAC {
        appearance: none;
        background-color: #dfe1e4;
        border-radius: 72px;
        border-style: none;
        flex-shrink: 0;
        height: 20px;
        margin: 0;
        position: relative;
        width: 30px;
      }

      .checkbox-wrapper-2 .ikxBAC::before {
        bottom: -6px;
        content: "";
        left: -6px;
        position: absolute;
        right: -6px;
        top: -6px;
      }

      .checkbox-wrapper-2 .ikxBAC,
      .checkbox-wrapper-2 .ikxBAC::after {
        transition: all 100ms ease-out;
      }

      .checkbox-wrapper-2 .ikxBAC::after {
        background-color: #fff;
        border-radius: 50%;
        content: "";
        height: 14px;
        left: 3px;
        position: absolute;
        top: 3px;
        width: 14px;
      }

      .checkbox-wrapper-2 input[type=checkbox] {
        cursor: default;
      }

      .checkbox-wrapper-2 .ikxBAC:hover {
        background-color: #c9cbcd;
        transition-duration: 0s;
      }

      .checkbox-wrapper-2 .ikxBAC:checked {
        background-color: #6e79d6;
      }

      .checkbox-wrapper-2 .ikxBAC:checked::after {
        background-color: #fff;
        left: 13px;
      }

      .checkbox-wrapper-2 :focus:not(.focus-visible) {
        outline: 0;
      }

      .checkbox-wrapper-2 .ikxBAC:checked:hover {
        background-color: #535db3;
      }

    </style>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
            <div class="app-brand demo">
                <a class="app-brand-link" href="/user/dashboard">
                    <span class="app-brand-logo demo">
                        <svg fill="none" height="22" viewBox="0 0 32 22" width="32" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" fill-rule="evenodd"/>
                            <path clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" fill-rule="evenodd" opacity="0.06"/>
                            <path clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" fill-rule="evenodd" opacity="0.06"/>
                            <path clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" fill-rule="evenodd"/>
                        </svg>
                    </span>
                    <span class="app-brand-text demo menu-text fw-bold">Pacto</span>
                </a>
            </div>
            <div class="menu-inner-shadow"></div>
            <ul class="menu-inner py-1">
                <!-- Dashboards -->
                <li class="menu-item">
                    <a class="menu-link" href="/user/dashboard">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div >داشبورد‌</div>
                    </a>
                </li>
                <!-- Layouts -->
                <li class="menu-item">
                <a class="menu-link menu-toggle" href="javascript:void(0);">
                    <i class="menu-icon tf-icons ti ti-components"></i>
                    <div>سفارش تبلیغات</div>
                </a>
                <ul class="menu-sub">
                  @foreach ($categories as $categorie)
                  <li class="menu-item">
                      <a class="menu-link" href="/user/categories/{{ $categorie->slug }}">
                          <div>سفارش تبلیغات {{ $categorie->name }}</div>
                      </a>
                  </li>
                    @endforeach
                </ul>
                </li>
                <li class="menu-item">
                    <a class="menu-link menu-toggle" href="javascript:void(0);">
                        <i class="menu-icon tf-icons ti ti-components"></i>
                        <div>کمپین ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/user/campaigns">
                                <div>لیست کمپین ها</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="/user/campaign/example">
                                <div>سفارش کمپین های موفق</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="/user/campaigns/create">
                                <div>ساخت کمپین اختصاصی</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/user/orders">
                        <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                        <div >لیست سفارش ها</div>
                    </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="/user/payments">
                      <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                      <div>لیست پرداخت ها</div>
                  </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link menu-toggle" href="javascript:void(0);">
                        <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                        <div>تیکت ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/user/tickets">
                                <div>لیست تیکت ها</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="/user/tickets/create">
                                <div>ثبت تیکت جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/user/affiliate/dashboard">
                        <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                        <div >کسب درآمد</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/user/profile">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div >حساب کاربری</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme container-fluid" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="ti ti-menu-2 ti-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <div class="navbar-nav align-items-center" style="padding-right: 1.5rem; padding-left: 1.5rem;">
                  <form action="{{ route('user.search') }}" method="GET" class="d-flex align-items-center" style="gap: 0.5rem; flex-wrap: nowrap;">
                    <input class="form-control" type="text" id="query" name="query" placeholder="جستجوی تبلیغات" style="flex: 1; min-width: 0;" required>
                    <button class="btn btn-instagram waves-effect waves-light" type="submit" style="white-space: nowrap; flex-shrink: 0;">جستجو</button>
                  </form>
                </div>
                <!-- /Search -->
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                  <!-- User -->
                  <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown" href="javascript:void(0);">
                      <div class="avatar avatar-online">
                        <img alt="" class="h-auto rounded-circle" src="/assets/img/avatars/16.jpg">
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="/user/profile">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img alt="" class="h-auto rounded-circle" src="/assets/img/avatars/16.jpg">
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block mb-1">{{ Auth::user()->name }}</span>
                              <small class="text-muted">کاربر</small>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li><div class="dropdown-divider"></div></li>
                      <li>
                        <a class="dropdown-item" href="/user/profile">
                          <i class="ti ti-user-check me-2 ti-sm"></i>
                          <span class="align-middle">پروفایل من</span>
                        </a>
                      </li>
                      <li><div class="dropdown-divider"></div></li>
                      <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="ti ti-logout me-2 ti-sm"></i>
                          <span class="align-middle">خروج از حساب</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                      </li>
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </div>
            </nav>
            <!-- / Navbar -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <h5>ساخت کمپین تبلیغاتی</h5>
            </div>
            <div class="col-12 mb-4">
                <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                        <div class="step active" data-target="#step1">
                            <button class="step-trigger" type="button" aria-selected="true">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">جزئیات کمپین</span>
                                    <span class="bs-stepper-subtitle">تنظیم جزئیات کمپین</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#step2">
                            <button class="step-trigger" type="button" aria-selected="false">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">انتخاب محصولات</span>
                                    <span class="bs-stepper-subtitle">انتخاب محصولات تبلیغاتی برای کمپین</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#step3">
                            <button class="step-trigger" type="button" aria-selected="false">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">اهداف و ثبت نهایی</span>
                                    <span class="bs-stepper-subtitle">هدف کمپین و ثبت نهایی</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                          <form action="{{ route('user.campaigns.store') }}" method="POST" onsubmit="prepareSelectedProducts()">
                          @csrf
                          <input type="hidden" id="selectedProductsInput" name="selected_products">
                            <!-- Step 1: Campaign Details -->
                            <div class="content active dstepper-block" id="step1">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">جزئیات کمپین</h6>
                                    <small>اطلاعات مربوط به کمپین خود را وارد کنید</small>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="name">نام کمپین</label>
                                        <input class="form-control" id="name" placeholder="نام کمپین" type="text" name="name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="description">توضیحات کمپین</label>
                                        <textarea class="form-control" id="description" placeholder="توضیحات کمپین" name="description" required></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="start-date">تاریخ شروع کمپین</label>
                                        <input class="form-control" id="start-date" type="text" name="start_date" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="end-date">تاریخ پایان کمپین</label>
                                        <input class="form-control" id="end-date" type="text" name="end_date" required>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev waves-effect" disabled="">
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button class="btn btn-primary btn-next waves-effect waves-light">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">بعدی</span>
                                            <i class="ti ti-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Product Selection -->
                            <div class="content" id="step2">
                              <div class="content-header mb-3">
                                  <h6 class="mb-0">انتخاب محصولات</h6>
                                  <small>دسته‌بندی‌ها و محصولات مورد نظر برای کمپین را انتخاب کنید.</small>
                              </div>
                              <div class="row g-3">
                                  <!-- Select for Categories -->
                                  <div class="col-6">
                                      <label class="form-label" for="categories">دسته‌بندی‌ها</label>
                                      <select class="form-select" id="categories">
                                          <option value="" disabled selected>انتخاب دسته‌بندی</option>
                                          @foreach($categories as $category)
                                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                                          @endforeach
                                      </select>
                                  </div>

                                  <!-- Select for Product Types -->
                                  <div class="col-6">
                                      <label class="form-label" for="productType">نوع محصول</label>
                                      <select class="form-select" id="productType">
                                          <option value="" disabled selected>انتخاب نوع محصول</option>
                                          <option value="view_based">بازدیدی</option>
                                          <option value="fixed">تعرفه‌ای</option>
                                          <option value="package">پکیج</option>
                                      </select>
                                  </div>

                                  <!-- Products Table -->
                                  <div class="col-12 mt-3">
                                      <label class="form-label">محصولات:</label>
                                      <div id="productsTable" class="table-responsive">
                                          <table class="table table-bordered">
                                              <thead>
                                                  <tr>
                                                      <th>نام محصول</th>
                                                      <th>قیمت</th>
                                                      <th>انتخاب</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <!-- محصولات به صورت داینامیک با جاوااسکریپت اینجا اضافه می‌شوند -->
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>

                                  <!-- Navigation Buttons -->
                                  <div class="col-12 d-flex justify-content-between">
                                      <button class="btn btn-label-secondary btn-prev waves-effect">
                                          <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                          <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                      </button>
                                      <button class="btn btn-primary btn-next waves-effect waves-light">
                                          <span class="align-middle d-sm-inline-block d-none me-sm-1">بعدی</span>
                                          <i class="ti ti-arrow-right"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>

                            <!-- Step 3: Campaign Objectives and Final Submission -->
                            <div class="content" id="step3">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0">اهداف و ثبت نهایی</h6>
                                    <small>هدف و جزئیات تکمیلی کمپین را وارد کنید</small>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="goal">اهداف کمپین</label>
                                        <textarea class="form-control" id="goal" placeholder="اهداف کمپین" name="goal" required></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="message">نکات مهم کمپین</label>
                                        <textarea class="form-control" id="message" placeholder="نکات مهم" name="message"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="content-link">لینک محتوا</label>
                                        <input class="form-control" id="content_link" placeholder="لینک محتوا" type="url" name="content_link">
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev waves-effect">
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                                        </button>
                                        <button class="btn btn-success btn-submit waves-effect waves-light" type="submit">
                                            ثبت نهایی
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
    </div>
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/form-wizard-numbered.js"></script>
    <script src="/assets/js/form-wizard-validation.js"></script>
    <!-- Persian Date Library -->
    <script src="https://cdn.jsdelivr.net/npm/persian-date/dist/persian-date.min.js"></script>
    <!-- Persian Datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker/dist/js/persian-datepicker.min.js"></script>
    <script>
    $(document).ready(function () {
        // تنظیم PersianDatepicker
        $("#start-date, #end-date").persianDatepicker({
            format: 'YYYY/MM/DD',
            autoClose: true
        });

        // سایر اسکریپت‌ها
        console.log('Document ready and scripts loaded.');
    });
    let selectedProducts = {}; // آرایه ذخیره محصولات انتخاب‌شده { productId: true }

document.getElementById('categories').addEventListener('change', loadProducts);
document.getElementById('productType').addEventListener('change', loadProducts);

function loadProducts() {
    const categoryId = document.getElementById('categories').value;
    const productType = document.getElementById('productType').value;

    if (categoryId && productType) {
        // درخواست به سرور برای دریافت محصولات
        fetch(`/user/campaign/load-products?category_id=${categoryId}&type=${productType}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#productsTable tbody');
                tableBody.innerHTML = ''; // پاک کردن محصولات قبلی

                if (data.products && data.products.length > 0) {
                    data.products.forEach(product => {
                        const isChecked = selectedProducts[product.id] || false;
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${product.name}</td>
                            <td>${product.price}</td>
                            <td>
                            <div class="checkbox-wrapper-2">
                               <input type="checkbox"
                                    value="${product.id}" name="products[]"
                                        ${isChecked ? 'checked' : ''}
                                    id="toggle" class="sc-gJwTLC ikxBAC" onchange="handleProductSelection(${product.id}, this.checked)">
                                    </div>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="3">محصولی یافت نشد.</td></tr>';
                }
            })
            .catch(error => {
                console.error('خطا در بارگذاری محصولات:', error);
            });
    }
}

function handleProductSelection(productId, isChecked) {
    if (isChecked) {
        selectedProducts[productId] = true; // اضافه به لیست انتخاب‌شده‌ها
    } else {
        delete selectedProducts[productId]; // حذف از لیست انتخاب‌شده‌ها
    }
}

function prepareSelectedProducts() {
    const selectedProductIds = Object.keys(selectedProducts); // گرفتن شناسه‌های محصولات انتخاب‌شده
    document.getElementById('selectedProductsInput').value = JSON.stringify(selectedProductIds); // ذخیره به صورت JSON
}

</script>

</body>
</html>
