<!DOCTYPE html>
    <html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('seo')
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/tobii.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/assets/css/line.css">
        <link rel="stylesheet" href="/assets/css/tiny-slider.css"/>
        <link href="/assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="/assets/css/default.css" rel="stylesheet" id="color-opt">
    </head>
    <body>
        <div class="clearfix"></div>
        @yield('content')
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/tiny-slider.js"></script>
        <script src="/assets/js/tobii.min.js"></script>
        <script src="/assets/js/feather.min.js"></script>
        <script src="/assets/js/switcher.js"></script>
        <script src="/assets/js/plugins.init.js"></script>
        <script src="/assets/js/app.js"></script>
    </body>
</html>
