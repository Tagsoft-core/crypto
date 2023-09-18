<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.admin_name', 'Admin Panel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico') }}" />
</head>
<body class="header-fixed">
<!-- partial:partials/_header.html -->
@include('admin.layouts.top-header')
<!-- partial -->
<div class="page-body">
    <!-- partial:partials/_sidebar.html -->
@include('admin.layouts.navigation')
    <!-- partial -->
    <div class="page-content-wrapper">
    @yield('content')
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="row">
                <div class="col-sm-6 text-center text-sm-right order-sm-1">
                    <ul class="text-gray">
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                    <small class="text-muted d-block">Copyright © 2021 <a href="https://logoin30minutes.com" target="_blank">LogoIn30Minutes.com</a>. All rights reserved</small>
                    <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
                </div>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- page content ends -->
</div>
<!--page body ends -->
<!-- SCRIPT LOADING START FORM HERE /////////////-->
<!-- plugins:js -->
<script src="{{ asset('admin-assets/vendors/js/core.js') }}"></script>
<!-- endinject -->
<!-- Vendor Js For This Page Ends-->
<script src="{{ asset('admin-assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/charts/chartjs.addon.js') }}"></script>
<!-- Vendor Js For This Page Ends-->
<!-- build:js -->
<script src="{{ asset('admin-assets/js/template.js') }}"></script>
<script src="{{ asset('admin-assets/js/dashboard.js') }}"></script>
<!-- endbuild -->
</body>
</html>