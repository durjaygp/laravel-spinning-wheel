<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('homePage')}}/images/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('homePage')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/css/style.css">
</head>

<body>

<!-- start preloader -->
<div class="preloader" id="preloader"></div>
<!-- end preloader -->

<a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>

<!-- header-section start -->
@include('frontEnd.inc.header')
<!-- header-section end -->
@yield('content')
<!-- Footer Section start -->
@include('frontEnd.inc.footer')


<script src="{{asset('homePage')}}/js/jquery-3.5.1.min.js"></script>
<script src="{{asset('homePage')}}/js/bootstrap.min.js"></script>
<script src="{{asset('homePage')}}/js/slick.js"></script>
<script src="{{asset('homePage')}}/js/jquery.nice-select.min.js"></script>
<script src="{{asset('homePage')}}/js/fontawesome.js"></script>
<script src="{{asset('homePage')}}/js/jquery.counterup.min.js"></script>
<script src="{{asset('homePage')}}/js/jquery.waypoints.min.js"></script>
<script src="{{asset('homePage')}}/js/wow.js"></script>
<script src="{{asset('homePage')}}/js/main.js"></script>


</body>
</html>
