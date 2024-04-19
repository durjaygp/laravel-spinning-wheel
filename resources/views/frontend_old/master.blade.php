<!DOCTYPE html>

<html data-wf-page="65fa2f14c0dbb7181a5682bb" data-wf-site="65fa2f14c0dbb7181a56828a">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="{{asset('webflow')}}/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="{{asset('webflow')}}/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="{{asset('webflow')}}/css/test-blog-site-4b0a8b.webflow.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="{{asset('webflow')}}/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="{{asset('webflow')}}/images/webclip.png" rel="apple-touch-icon">
</head>
<body>
<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav">
@include('frontend.inc.header')
</div>

<section class="section-regular">
    @yield('content')
</section>
@include('frontend.inc.footer')
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65fa2f14c0dbb7181a56828a" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('webflow')}}/js/webflow.js" type="text/javascript"></script>
</body>
</html>
