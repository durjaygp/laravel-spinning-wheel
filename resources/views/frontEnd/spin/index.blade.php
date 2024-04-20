<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{asset($website->fav_icon)}}" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link rel="stylesheet" href="{{asset('homePage')}}/projects/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/projects/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/projects/css/slick.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/projects/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/projects/css/animate.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/projects/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}iziToast/dist/css/iziToast.min.css">

    <style>
        .carousel-cell {
            width: 280px;
            margin-left: 10px;
            margin-right: 10px;
        }

        @media (max-width: 1024px) {
            .carousel-cell {
                width: 20%;
                margin-left: 4px;
                margin-right: 4px;
            }

            .carousel-cell h4 {
                font-size: 16px;
            }
        }

        @media (max-width: 560px) {
            .carousel-cell {
                width: 20%;
                margin-left: 4px;
                margin-right: 4px;
            }

            .carousel-cell h4 {
                font-size: 12px;
            }
        }

        .carousel-cell.is-win img {
            /*transform: scale(1.5);*/
            transition: 1s ease-in;
        }

        .carousel-cell.is-win {
            position: relative;
            z-index: 20;
        }

        .carousel-cell img {
            width: 100%;
            height: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .carousel-cell.opacity-25 {
            opacity: 0.25;
            transition: opacity 1s ease-in;
        }

        .carousel-cell.is-win {
            opacity: 1 !important;
        }
    </style>
</head>

<body>


@include('frontEnd.inc.header')
<div class="modal register fade" id="signInModalLong" tabindex="-1" role="dialog"
     aria-labelledby="signInModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLongTitle">
                    <img src="{{asset($website->website_logo)}}" width="100px" alt="image">
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <img src="{{asset('homePage')}}/images/cross-icon-1.png" alt="image">
                </button>
            </div>
            <div class="modal-body">
                <h5> Welcome back</h5>
                <div class="form-area">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" name="email"
                                   placeholder="Registered Email Address." type="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" placeholder="Password"
                                   type="password">
                        </div>
                        <div class="form-group d-flex">
                            <div class="checkbox_wrapper">
                                <input type="checkbox" />
                                <label></label>
                            </div>
                            <span class="check_span">I agree with <span>user
                                                                agreement</span>, and confirm that I am at least 18
                                                            years old!</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="cmn-btn cmn-btn-alt"> Login Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5"></div>

@yield('content')

@include('frontEnd.inc.footer')
<!-- JavaScript -->

<script src="{{asset('homePage')}}/projects/js/jquery-3.5.1.min.js"></script>
<script src="{{asset('homePage')}}/projects/js/bootstrap.min.js"></script>
<script src="{{asset('homePage')}}/projects/js/slick.js"></script>
<script src="{{asset('homePage')}}/projects/js/jquery.nice-select.min.js"></script>
<script src="{{asset('homePage')}}/projects/js/fontawesome.js"></script>
<script src="{{asset('homePage')}}/projects/js/jquery.counterup.min.js"></script>
<script src="{{asset('homePage')}}/projects/js/jquery.waypoints.min.js"></script>
<script src="{{asset('homePage')}}/projects/js/wow.js"></script>
<script src="{{asset('homePage')}}/projects/js/main.js"></script>
<script src="{{asset('/')}}iziToast/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position:'topRight',
                message: '{{$error}}',
            });
        </script>
    @endforeach

@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position:'topRight',
            message: '{{session()->get('success')}}',
        });

    </script>
@endif

@yield('script')

</body>

</html>
