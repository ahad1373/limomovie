<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="Barat Hadian">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>مدیریت سایت</title>
    <link rel="apple-touch-icon" href="/../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/../../../app-assets/images/ico/favicon.ico">
    <link href='/../../../app-assets/css-rtl/Vazir-FD.css' rel='stylesheet' type='text/css'>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">





    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/vendors/css/vendors-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/vendors/css/forms/selects/select2.min.css">



    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/components.min.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/custom-rtl.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="/../../../app-assets/css-rtl/core/colors/palette-gradient.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/../../../assets/css/style-rtl.css">

    <script src="{{ asset('js/app.js') }}"></script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

<!-- BEGIN: Header-->
@include('Admin.layouts.navbar')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('Admin.layouts.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
         @yield('content')
    </div>
</div>
<!-- END: Content-->



<!-- BEGIN: Customizer-->
<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-primary box-shadow-3" href="#" id="customizer-toggle-setting"><i class="ft-settings font-medium-3 spinner white"></i></a><div class="customizer-content p-2">
        <h5 class="mt-1 mb-1 text-bold-500">تنظیمات رنگ ناوبری</h5>
        <div class="navbar-color-options clearfix">
            <div class="gradient-colors mb-1 clearfix">
                <div class="bg-gradient-x-purple-blue navbar-color-option" data-bg="bg-gradient-x-purple-blue" title="bg-gradient-x-purple-blue"></div>
                <div class="bg-gradient-x-purple-red navbar-color-option" data-bg="bg-gradient-x-purple-red" title="bg-gradient-x-purple-red"></div>
                <div class="bg-gradient-x-blue-green navbar-color-option" data-bg="bg-gradient-x-blue-green" title="bg-gradient-x-blue-green"></div>
                <div class="bg-gradient-x-orange-yellow navbar-color-option" data-bg="bg-gradient-x-orange-yellow" title="bg-gradient-x-orange-yellow"></div>
                <div class="bg-gradient-x-blue-cyan navbar-color-option" data-bg="bg-gradient-x-blue-cyan" title="bg-gradient-x-blue-cyan"></div>
                <div class="bg-gradient-x-red-pink navbar-color-option" data-bg="bg-gradient-x-red-pink" title="bg-gradient-x-red-pink"></div>
            </div>
            <div class="solid-colors clearfix">
                <div class="bg-primary navbar-color-option" data-bg="bg-primary" title="اولیه"></div>
                <div class="bg-success navbar-color-option" data-bg="bg-success" title="موفقیت"></div>
                <div class="bg-info navbar-color-option" data-bg="bg-info" title="اطلاعات"></div>
                <div class="bg-warning navbar-color-option" data-bg="bg-warning" title="هشدار"></div>
                <div class="bg-danger navbar-color-option" data-bg="bg-danger" title="خطر"></div>
                <div class="bg-blue navbar-color-option" data-bg="bg-blue" title="آبی"></div>
            </div>
        </div>

        <hr>

        <h5 class="my-1 text-bold-500">گزینه های طرح بندی</h5>
        <div class="row">
            <div class="col-12">
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="default-layout" checked>
                    <label class="custom-control-label" for="default-layout">پیش فرض</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="fixed-layout">
                    <label class="custom-control-label" for="fixed-layout">ثابت</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="static-layout">
                    <label class="custom-control-label" for="static-layout">استاتیک</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="boxed-layout">
                    <label class="custom-control-label" for="boxed-layout">جعبه ای</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-inline-block custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons" id="right-side-icons">
                    <label class="custom-control-label" for="right-side-icons">آیکون سمت راست</label>
                </div>
            </div>
        </div>

        <hr>

        <h5 class="mt-1 mb-1 text-bold-500">پس زمینه منوی نوار کناری</h5>
        <!-- <div class="sidebar-color-options clearfix">
            <div class="bg-black sidebar-color-option" data-sidebar="menu-dark" title="مشکی"></div>
            <div class="bg-white sidebar-color-option" data-sidebar="menu-light" title="سفید"></div>
        </div> -->
        <div class="row sidebar-color-options ml-0">
            <label for="sidebar-color-option" class="card-title font-medium-2 mr-2">حالت سفید</label>
            <div class="text-center mb-1">
                <input type="checkbox" id="sidebar-color-option" class="switchery" data-size="xs"/>
            </div>
            <label for="sidebar-color-option" class="card-title font-medium-2 ml-2">حالت تاریک</label>
        </div>

        <hr>

        <label for="collapsed-sidebar" class="font-medium-2">سقوط منو</label>
        <div class="float-right">
            <input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs"/>
        </div>

        <hr>

        <!--Sidebar Background Image Starts-->
        <h5 class="mt-1 mb-1 text-bold-500">تصویر پس زمینه نوار کناری</h5>
        <div class="cz-bg-image row">
            <div class="col mb-3">
                <img src="/../../../app-assets/images/backgrounds/04.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
            </div>
            <div class="col mb-3">
                <img src="/../../../app-assets/images/backgrounds/01.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
            </div>
            <div class="col mb-3">
                <img src="/../../../app-assets/images/backgrounds/02.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
            </div>
            <div class="col mb-3">
                <img src="/../../../app-assets/images/backgrounds/05.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
            </div>
        </div>
        <!--Sidebar Background Image Ends-->

        <!--Sidebar BG Image Toggle Starts-->
        <div class="sidebar-image-visibility">
            <div class="row ml-0">
                <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">مخفی کردن تصویر</label>
                <div class="text-center mb-1">
                    <input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs" checked/>
                </div>
                <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">نمایش تصویر</label>
            </div>
        </div>
        <!--Sidebar BG Image Toggle Ends-->

        <hr>

        <div class="row mb-2">
            <!-- <div class="col">
                <a href="https://www.rtl-theme.com/author/barat/" class="btn btn-danger btn-block box-shadow-1" target="_blank">اکنون بخرید</a>
            </div> -->
            <div class="col">
                <a href="https://www.rtl-theme.com/author/barat/" class="btn btn-primary btn-block box-shadow-1" target="_blank">تم های بیشتر</a>
            </div>
        </div>
        <div class="text-center">
            <button id="twitter" class="btn btn-social-icon btn-twitter sharrre mr-1"><i class="la la-twitter"></i></button>
            <button id="facebook" class="btn btn-social-icon btn-facebook sharrre mr-1"><i class="la la-facebook"></i></button>
            <button id="google" class="btn btn-social-icon btn-google sharrre"><i class="la la-google"></i></button>
        </div>
    </div>
</div>
<!-- End: Customizer-->


<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2019  &copy; کپی رایت: تمامی حقوق این قالب محفوظ است. طراحی و توسعه توسط <a class="text-bold-800 grey darken-2" href="https://www.rtl-theme.com/author/barat/" target="_blank">Barat Hadian</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="https://www.rtl-theme.com/author/barat/" target="_blank"> قالب های بیشتر</a></li>
            <li class="list-inline-item"><a class="my-1" href="https://www.rtl-theme.com/user-profile/barat/" target="_blank"> پشتیبانی</a></li>
        </ul>
    </div>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="/../../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="/../../../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="/../../../app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/../../../app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="/../../../app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="/../../../app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="/../../../app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/../../../app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<script src="/../../../app-assets/js/scripts/forms/select/form-select2.min.js" type="text/javascript"></script>
<!-- END: Page JS-->
@yield('script')


</body>
<!-- END: Body-->
</html>
