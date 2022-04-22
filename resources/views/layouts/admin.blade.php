<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
          content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

    <!-- Title -->
    <title> @yield('title') </title>

    <!-- Favicon -->
    <link rel="icon" href=" {{asset('assets/backend/img/brand/favicon.png')}} " type="image/x-icon"/>

    <!-- Icons css -->
    <link href="{{asset('assets/backend/css/icons.css')}}" rel="stylesheet">

    <!--  Owl-carousel css-->
    <link href="{{asset('assets/backend/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet"/>

    <!--  Custom Scroll bar-->
    <link href="{{asset('assets/backend/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

    <!--  Sidebar css -->
    <link href="{{asset('assets/backend/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{asset('assets/backend/'.getFolder().'/sidemenu.css')}}">

    <!--- Internal Morris css-->
    <link href="{{asset('assets/backend/plugins/morris.js/morris.css')}}" rel="stylesheet">

    <!--- Style css --->
    <link href="{{asset('assets/backend/'.getFolder().'/style.css')}}" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="{{asset('assets/backend/'.getFolder().'/style-dark.css')}}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{asset('assets/backend/'.getFolder().'/skin-modes.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/backend/vendor/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet"/>

    <link rel="stylesheet"  href="{{asset('assets/backend/vendor/summernote/summernote-bs4.min.css')}}"/>


    @yield('style')

    @toastr_css
</head>

<body class="main-body app sidebar-mini">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('assets/backend/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->

<!-- Page -->
<div class="page">

    <!-- main-sidebar -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

@include('partials.main_sidebar')
<!-- main-sidebar -->

    <!-- main-content -->

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- main-header opened -->
        @include('partials.header')
        <!-- /main-header -->
            <!-- container opened -->
            @yield('content')
        </div>
    </div>


    <!-- Container closed -->




    <!-- Footer opened -->
@include('partials.footer')
<!-- Footer closed -->

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>


@jquery
@toastr_js
@toastr_render

<!-- JQuery min js -->
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Bundle js -->
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!--Internal  Chart.bundle js -->
<script src="{{asset('assets/backend/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Ionicons js -->
<script src="{{asset('assets/backend/plugins/ionicons/ionicons.js')}}"></script>

<!-- Moment js -->
<script src="{{asset('assets/backend/plugins/moment/moment.js')}}"></script>

<!--Internal Sparkline js -->
<script src="{{asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Moment js -->
<script src="{{asset('assets/backend/plugins/raphael/raphael.min.js')}}"></script>

<!--Internal  Flot js-->
<script src="{{asset('assets/backend/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{asset('assets/backend/js/dashboard.sampledata.js')}}"></script>
<script src="{{asset('assets/backend/js/chart.flot.sampledata.js')}}"></script>

<!-- Custom Scroll bar Js-->
<script src="{{asset('assets/backend/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Rating js-->
<script src="{{asset('assets/backend/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{asset('assets/backend/plugins/rating/jquery.barrating.js')}}"></script>

<!-- P-scroll js -->
<script src="{{asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

<!-- Horizontalmenu js-->
<script src="{{asset('assets/backend/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{asset('assets/backend/plugins/sidebar/sidebar-custom.js')}}"></script>

<!-- Eva-icons js -->
<script src="{{asset('assets/backend/js/eva-icons.min.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('assets/backend/js/sticky.js')}}"></script>
<script src="{{asset('assets/backend/js/modal-popup.js')}}"></script>

<!-- Left-menu js-->
<script src="{{asset('assets/backend/plugins/side-menu/sidemenu.js')}}"></script>

<!-- Internal Map -->
<script src="{{asset('assets/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<!--Internal  index js assets/-->
<script src="{{asset('assets/backend/js/index.js')}}"></script>

<!-- Apexchart js-->
<script src="{{asset('assets/backend/js/apexcharts.js')}}"></script>

<!-- custom js -->
<script src="{{asset('assets/backend/js/custom.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.vmap.sampledata.js')}}"></script>

<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/js/plugins/piexif.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/js/plugins/sortable.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap-fileinput/themes/fa/theme.min.js')}}"></script>

<script src="{{asset('assets/backend/vendor/summernote/summernote-bs4.min.js')}}"></script>


@yield('script')
</body>
</html>
