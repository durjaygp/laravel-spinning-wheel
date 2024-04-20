@extends('frontEnd.spin.index')
@section('title','404')
@section('content')
    <!-- banner-section start -->
    <section id="banner-section">
        <div class="banner-content d-flex align-items-center">
            <div class="container">
                <h1>404</h1>
                <h2>Oops! That page can’t be found</h2>
                <div class="text-white">Sorry, but the page you are looking for does not existing</div>
                <a href="{{route('home')}}" class="theme-btn btn-style-one mb-5"><span class="txt">Go to home page</span></a>

            </div>
        </div>
    </section>

@endsection
