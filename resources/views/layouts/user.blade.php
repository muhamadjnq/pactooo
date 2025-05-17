<!DOCTYPE html>
<html class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" data-assets-path="/assets/" data-template="vertical-menu-template-no-customizer" data-theme="theme-default" dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
    <title>پنل کاربری</title>
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
      <input class="form-control" type="text" id="query" name="query" placeholder="جستجوی تبلیغات" style="flex: 1; min-width: 0;" required >
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
        @yield('content')
      </div>
      <!-- / Layout page -->
  </div>
  <!-- Overlay -->
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
  <script src="/assets/vendor/libs/select2/select2.js"></script>
  <script src="/assets/vendor/libs/select2/i18n/fa.js"></script>
  <script src="/assets/vendor/libs/plyr/plyr.js"></script>
  <script src="/assets/js/main.js"></script>
  <script src="/assets/js/app-academy-course.js"></script>
  <script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="/assets/js/main.js"></script>
  </body>
  </html>
