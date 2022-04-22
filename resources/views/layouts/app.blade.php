<!doctype html>
<html class="no-js" lang="zxx">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="{{asset('assets/frontend/images/favicon.ico')}}" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/qanto.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/bauhaus93.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/helper.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/'.getFolder().'/style-rtl.css')}}">
    <!-- Modernizr JS -->
    <script src="{{asset('assets/frontend/'.getFolderJs().'/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

<div id="main-wrapper">

    <!--Header section start-->
@include('partials.frontend.header')
<!--Header section end-->

    <!--slider section start-->
@include('partials.frontend.slider')
<!--slider section end-->

   @yield('content')
    <!--Footer section start-->
@include('partials.frontend.footer')
<!--Footer section end-->

</div>

<!-- Placed js at the end of the document so the pages load faster -->

<!-- All jquery file included here -->
<script src="{{asset('assets/frontend/'.getFolderJs().'/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/frontend/'.getFolderJs().'/popper.min.js')}}"></script>
<script src="{{asset('assets/frontend/'.getFolderJs().'/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/'.getFolderJs().'/plugins.js')}}"></script>
<script src="{{asset('assets/frontend/'.getFolderJs().'/main.js')}}"></script>

</body>



</html>
