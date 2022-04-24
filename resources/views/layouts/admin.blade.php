<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon.ico')}}"/>

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->

    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/rtl.css')}}"/>
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/ltr.css')}}"/>
    @endif

    <link rel="stylesheet"  href="{{asset('assets/backend/vendor/bootstrap-fileinput/css/fileinput.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('assets/backend/vendor/summernote/summernote-bs4.min.css')}}"/>


    @yield('style')
    @toastr_css

    @livewireStyles


</head>

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
     preloader -->


    <!--=================================
     header start-->

     @include('partials.backend.header_navbar')
    <!--=================================
     header End-->

    <!--=================================
     Main content -->

    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar start-->

            @include('partials.backend.sidebar')

            <!-- Left Sidebar End-->

            <!--=================================
           wrapper -->

         @yield('content')



            <!-- main content wrapper end-->
        </div>
    </div>
</div>

<!--=================================
 footer -->


<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{asset('assets/backend/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{asset('assets/backend/js/plugins-jquery.js')}}"></script>

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{asset('assets/backend/js')}}/';</script>

<!-- chart -->
<script src="{{asset('assets/backend/js/chart-init.js')}}"></script>

<!-- calendar -->
<script src="{{asset('assets/backend/js/calendar.init.js')}}"></script>

<!-- charts sparkline -->
<script src="{{asset('assets/backend/js/sparkline.init.js')}}"></script>

<!-- charts morris -->
<script src="{{asset('assets/backend/js/morris.init.js')}}"></script>

<!-- datepicker -->
<script src="{{asset('assets/backend/js/datepicker.js')}}"></script>

<!-- sweetalert2 -->
<script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>

<!-- toastr -->
<script src="{{asset('assets/backend/js/toastr.js')}}"></script>

<!-- validation -->
<script src="{{asset('assets/backend/js/validation.js')}}"></script>

<!-- lobilist -->
<script src="{{asset('assets/backend/js/lobilist.js')}}"></script>

<!-- custom -->
<script src="{{asset('assets/backend/js/custom.js')}}"></script>

<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/js/plugins/piexif.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/js/plugins/sortable.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/themes/fa/theme.min.js')}}"></script>

<script src="{{asset('assets/backend/vendor/summernote/summernote-bs4.min.js')}}"></script>


@yield('script')
@livewireScripts

@stack('scripts')

@toastr_js
@toastr_render
</body>
</html>
