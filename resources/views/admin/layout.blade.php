<!DOCTYPE html>
<html class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" data-assets-path="/assets/" data-template="vertical-menu-template-no-customizer" data-theme="theme-default" dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
    <title> پنل مدیریت adpacto </title>
    <meta content="" name="description"/>
    <!-- Favicon -->
    <link href="/assets/img/favicon/favicon.ico" rel="icon" type="image/x-icon"/>
    <!-- Icons -->
    <link href="/assets/vendor/fonts/fontawesome.css" rel="stylesheet"/>
    <link href="/assets/vendor/fonts/tabler-icons.css" rel="stylesheet"/>
    <link href="/assets/vendor/fonts/flag-icons.css" rel="stylesheet"/>
    <!-- Core CSS -->
    <link class="template-customizer-core-css" href="/assets/vendor/css/rtl/core.css" rel="stylesheet"/>
    <link class="template-customizer-theme-css" href="/assets/vendor/css/rtl/theme-default.css" rel="stylesheet"/>
    <link href="/assets/css/demo.css" rel="stylesheet"/>
    <!-- Vendors CSS -->
    <link href="/assets/vendor/libs/node-waves/node-waves.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/typeahead-js/typeahead.css" rel="stylesheet"/>

    <link href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" rel="stylesheet"/>

    <script src="/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>

    <link href="/assets/vendor/libs/select2/select2.css" rel="stylesheet"/>
    <link href="/assets/vendor/libs/plyr/plyr.css" rel="stylesheet"/>
    <!-- Page CSS -->
    <link href="/assets/vendor/css/pages/cards-advance.css" rel="stylesheet"/>
    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
    <!-- Better experience of RTL -->
    <link href="/assets/css/rtl.css" rel="stylesheet"/>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
            <div class="app-brand demo">
                <a class="app-brand-link" href="/admin/dashboard">
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
								@if (Auth::user()->role === 'admin' || Auth::user()->role === 'author')
                <li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>داشبورد‌</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/dashboard">
                                <div>داشبورد‌</div>
                            </a>
                        </li>
												<li class="menu-item">
                            <a class="menu-link" href="/admin/dashboard/analytics">
                                <div>آمار گوگل آنالیز</div>
                            </a>
                        </li>
                    </ul>
                </li>
								@endif
								@if(auth()->user()->role == 'admin')
								<li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>دسته بندی ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/category">
                                <div>لیست دسته بندی ها</div>
                            </a>
                        </li>
												<li class="menu-item">
                            <a class="menu-link" href="/admin/category/create">
                                <div>ساخت دسته بندی جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
								@endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>کمپین ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/campaign">
                                <div>لیست کمپین ها</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/campaign/create">
                                <div>ساخت کمپین جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
								@if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>محصولات</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/products">
                                <div>لیست محصولات</div>
                            </a>
                        </li>
												<li class="menu-item">
                            <a class="menu-link" href="/admin/products/create">
                                <div>ساخت محصول جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
								@endif
								@if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link" href="/admin/orders">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>سفارش ها</div>
                    </a>
                </li>
								@endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link" href="/admin/payments">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>پرداخت ها</div>
                    </a>
                </li>
								@endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>فاکتور ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/invoices">
                                <div>لیست فاکتور ها</div>
                            </a>
                        </li>
                    </ul>
                </li>
								@endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>کد تخفیف</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/discounts">
                                <div>لیست کدهای تخفیف</div>
                            </a>
                        </li>

												<li class="menu-item">
                            <a class="menu-link" href="/admin/discounts/create">
                                <div>ساخت کد تخفیف</div>
                            </a>
                        </li>
                    </ul>
                </li>
								@endif
								@if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>کاربران</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/users">
                                <div>لیست کاربران</div>
                            </a>
                        </li>
												<li class="menu-item">
                            <a class="menu-link" href="/admin/users/create">
                                <div>ساخت کاربر جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
								@endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link" href="/admin/tickets">
                        <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                        <div>تیکت ها</div>
                    </a>
                </li>
                @endif
                <!-- Layouts -->
								@if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>پست ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a class="menu-link" href="/admin/blogs">
                                <div>لیست پست ها</div>
                            </a>
                        </li>
												<li class="menu-item">
                            <a class="menu-link" href="/admin/blogs/create">
                                <div>ساخت پست جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
								@endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link" href="/admin/notifications">
                        <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                        <div >نوتیفیکیشن ها</div>
                    </a>
                </li>
								@endif
								@if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link" href="/admin/url">
                        <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                        <div >ساخت لینک کوتاه</div>
                    </a>
                </li>
								@endif
                @if(auth()->user()->role == 'admin')
                <li class="menu-item">
                    <a class="menu-link" href="/user/dashboard">
                        <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                        <div >پنل کاربری</div>
                    </a>
                </li>
								@endif
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
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Style Switcher -->
                        <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                            <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown" href="javascript:void(0);">
                                <i class="ti ti-md ti-sun"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                                <li>
                                    <a class="dropdown-item" data-theme="light" href="javascript:void(0);">
                                        <span class="align-middle">
                                            <i class="ti ti-sun me-2"></i>
                                            روز
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" data-theme="dark" href="javascript:void(0);">
                                        <span class="align-middle">
                                            <i class="ti ti-moon me-2"></i>
                                            شب
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- / Style Switcher-->
                        <!-- Notification -->
                        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                            <a aria-expanded="false" class="nav-link dropdown-toggle hide-arrow" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:void(0);">
                                <i class="ti ti-bell ti-md"></i>
                                <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end py-0">
                                <li class="dropdown-menu-header border-bottom">
                                    <div class="dropdown-header d-flex align-items-center py-3">
                                        <h5 class="text-body mb-0 me-auto">اعلانات</h5>
                                        <a class="dropdown-notifications-all text-body" data-bs-placement="top" data-bs-toggle="tooltip" href="javascript:void(0)" aria-label="همه خوانده شده" data-bs-original-title="همه خوانده شده">
                                            <i class="ti ti-mail-opened fs-4"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="dropdown-notifications-list scrollable-container ps ps__rtl">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img alt="" class="h-auto rounded-circle" src="/assets/img/avatars/1.png">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-2">تبریک به شما 🎉</h6>
                                                    <p class="mb-1">نشان برترین فروشنده ماه رو گرفتید</p>
                                                    <small class="text-muted">الان</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a class="dropdown-notifications-read" href="javascript:void(0)">
                                                        <span class="badge badge-dot"></span>
                                                    </a>
                                                    <a class="dropdown-notifications-archive" href="javascript:void(0)">
                                                        <span class="ti ti-x"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: -13px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
                                <li class="dropdown-menu-footer border-top">
                                    <a class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center" href="javascript:void(0);">
                                        نمایش همه اعلانات
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ Notification -->
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown" href="javascript:void(0);">
                                <div class="avatar avatar-online">
                                    <img alt="" class="h-auto rounded-circle" src="/assets/img/avatars/1.png">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-account.html">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img alt="" class="h-auto rounded-circle" src="/assets/img/avatars/1.png">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block mb-1">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">مدیرکل</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-profile-user.html">
                                        <i class="ti ti-user-check me-2 ti-sm"></i>
                                        <span class="align-middle">پروفایل من</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-account.html">
                                        <i class="ti ti-settings me-2 ti-sm"></i>
                                        <span class="align-middle">تنظیمات</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-billing.html">
                                        <span class="d-flex align-items-center align-middle">
                                            <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                            <span class="flex-grow-1 align-middle">خریدها</span>
                                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-faq.html">
                                        <i class="ti ti-help me-2 ti-sm"></i>
                                        <span class="align-middle">سوالات متداول</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-pricing.html">
                                        <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                                        <span class="align-middle">قیمت گذاری</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
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
                <!-- Search Small Screens -->
                <div class="navbar-search-wrapper search-input-wrapper d-none">
                    <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input aria-label="جستجو..." class="form-control search-input border-0 tt-input container-fluid" placeholder="جستجو..." type="text" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: font-primary, tahoma, serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu navbar-search-suggestion ps ps__rtl" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-pages"></div><div class="tt-dataset tt-dataset-files"></div><div class="tt-dataset tt-dataset-members"></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: -13px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></span>
                    <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                </div>
            </nav>
            <!-- / Navbar -->
        @yield('content')
      </div>
      <!-- / Layout page -->
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
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
  <script src="/assets/vendor/libs/select2/select2.js"></script>
  <script src="/assets/vendor/libs/select2/i18n/fa.js"></script>
  <script src="/assets/vendor/libs/plyr/plyr.js"></script>
  <!-- Main JS -->
  <script src="/assets/js/main.js"></script>
  <!-- Page JS -->
  <script src="/assets/js/app-academy-course.js"></script>


  <!-- Vendors JS -->
<script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<!-- Main JS -->
<script src="/assets/js/main.js"></script>
<!-- Page JS -->
@yield('js')
  </body>

  </html>
