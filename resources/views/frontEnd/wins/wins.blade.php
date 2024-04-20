@extends('frontEnd.spin.index')
@section('title')
    My Profile
@endsection
@section('content')
    <!-- Todays winner In start -->
    <section id="todays-winner-section" class="games">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-header text-center">
                            <h2 class="title">Recent Big <span>Winns</span></h2>
                            <p>We update our site regularly; more and more winners are added every day! To locate the
                                most recent winner's information</p>
                        </div>
                    </div>
                </div>
                @php
                    $point = \App\Models\UserPoint::where('user_id', auth()->user()->id)->sum('point');
                    $used = \App\Models\PointUse::where('user_id',auth()->user()->id)->sum('point');
                    $mypoint = $point - $used
                @endphp

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4">
                        <div class="left-side text-center">
                            <h5> Point: {{$mypoint}}</h5>
                            <h5 class="head">{{auth()->user()->name}}</h5>
                            <h5 class="head">{{auth()->user()->username}}</h5>
                            <div class="profile">
                                <img src="{{asset(auth()->user()->image)}}"  class="img-fluid w-50" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class=""></div>
                    <div class="col-lg-8">
                        <div class="right-side">
                            <div class="title-area">
                                <img src="{{asset('homePage')}}/images/ribbon.png" alt="image">
                                <h5>Recent Wins</h5>
                            </div>
                            <div class="winner-chart">
                                @foreach($wins_skins as $row)
                                    <div class="single-item d-flex justify-content-between align-items-center">
                                        <div class="left-area d-flex align-items-center">
                                            <span> {{$loop->iteration}}</span>
                                            <a href="javascript:void(0)" class="name-area d-flex align-items-center">
                                                <img src="{{asset($row->game->image)}}" alt="image">
                                                <h6>{{ $row->game->title }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Todays winner In end -->

@endsection



