<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/dashboard/assets/img/favicon.png" rel="icon">
    <link href="/dashboard/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/dashboard/assets/css/style.css" rel="stylesheet">
    @yield('meta')

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.4.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img src="/assets/img/header/logo-black.png" alt="">
{{--            <span class="d-none d-lg-block">Verity</span>--}}
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.index')}}">
                <i class="bi bi-grid"></i>
                <span>Главная</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.volunteers.index')}}">
                <i class="bi bi-grid"></i>
                <span>Волонтеры</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.volunteers.orders')}}">
                <i class="bi bi-grid"></i>
                <span>Заявки</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"> {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="pagetitle">
        <h1>@yield('title')</h1>
    </div><!-- End Page Title -->

    @if ($errors->any())
        <span class="for_volunteers-plus__item-d" style="color:#f00; font-weight: 700;">{{ $errors->first() }}</span>
    @endif

    @yield('content')

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dashboard/assets/vendor/chart.js/chart.min.js"></script>
<script src="/dashboard/assets/vendor/echarts/echarts.min.js"></script>
<script src="/dashboard/assets/vendor/quill/quill.min.js"></script>
<script src="/dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/dashboard/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/dashboard/assets/js/main.js"></script>
@yield('scripts')
</body>

</html>
