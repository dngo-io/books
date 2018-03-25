<!DOCTYPE html>
<html lang="{{ config("app.locale") }}">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>@yield("title") | {{ config("app.name") }}</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="KkaUbgl3IwPy0Ruj257q6ZNVP8-ytzhTM57DtwLmaOw" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--begin::Base Styles -->
    <!--begin::Page Vendors -->
    <link href="{{ asset("assets/vendors/custom/fullcalendar/fullcalendar.bundle.css") }}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors -->
    <link href="{{ asset("assets/vendors/base/vendors.bundle.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("assets/demo/demo9/base/style.bundle.css") }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/custom/css/amplitudejs.css") }}"/>
    <link href="{{ asset("assets/custom/css/ion.rangeSlider.skinNice3.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("assets/custom/css/custom.css") }}" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{ asset("favicon.ico") }}"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset("assets/custom/img/dngo/apple-icon-57x57.png") }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset("assets/custom/img/dngo/apple-icon-60x60.png") }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset("assets/custom/img/dngo/apple-icon-72x72.png") }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("assets/custom/img/dngo/apple-icon-76x76.png") }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset("assets/custom/img/dngo/apple-icon-114x114.png") }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset("assets/custom/img/dngo/apple-icon-120x120.png") }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset("assets/custom/img/dngo/apple-icon-144x144.png") }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset("assets/custom/img/dngo/apple-icon-152x152.png") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("assets/custom/img/dngo/apple-icon-180x180.png") }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset("assets/custom/img/dngo/android-icon-192x192.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("assets/custom/img/dngo/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset("assets/custom/img/dngo/favicon-96x96.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/custom/img/dngo/favicon-16x16.png") }}">
    <link rel="manifest" href="{{ asset("assets/custom/img/dngo/manifest.json") }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset("assets/custom/img/dngo/ms-icon-144x144.png") }}">
    <meta name="theme-color" content="#ffffff">
    <script>
        var SITE_URL = "{{ config('app.url') }}";
    </script>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-page--loading-enabled m-page--loading m-content--skin-light m-header--fixed m-header--fixed-mobile
m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default @if(!is_null(Route::getCurrentRoute()) && Route::getCurrentRoute()->getActionMethod() == 'root_index' && !\Auth::check()) booky-background @endif">
@include("layout.partials.loader")
@yield("page")
<!--begin::Base Scripts -->
<script src="{{ asset("assets/vendors/base/vendors.bundle.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/demo/demo9/base/scripts.bundle.js") }}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="{{ asset("assets/vendors/custom/fullcalendar/fullcalendar.bundle.js") }}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="{{ asset("assets/app/js/dashboard.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/custom/plugins/amplitudejs/dist/amplitude.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/custom/plugins/amplitudejs/examples/resources/js/foundation.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/custom/plugins/amplitudejs/examples/blue-playlist/js/functions.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/custom/js/custom.js") }}" type="text/javascript"></script>
@if (!Auth::guest() && Auth::user()->checkRole('moderator'))
<script src="{{ asset("assets/custom/js/moderation.js") }}" type="text/javascript"></script>
@endif
<!--end::Page Snippets -->
<!-- begin::Page Loader -->
<script>
    $(window).on('load', function () {
        $('body').removeClass('m-page--loading');
    });
    $(document).ready(function () {
        @yield("script")
    });
</script>
@if(config('env') == 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114999163-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-114999163-1');
    </script>
@endif
<!-- end::Page Loader -->
</body>
<!-- end::Body -->
</html>
