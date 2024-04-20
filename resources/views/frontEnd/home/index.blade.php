@extends('frontEnd.spin.index')
@section('title')
    {{$website->name}}
@endsection
@section('content')
    <!-- banner-section start -->
    <section id="banner-section">
        <div class="banner-content d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-content">
                        <div class="top-area justify-content-center text-center">
                            <h1>Play & gain <br> <span>rewards</span></h1>
                            <p>Free, Fun & Fair Rewards For Everyone</p>
                            <a href="{{route('home.spin')}}" class="cmn-btn">
                                Start Playing!
                        </a>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bottom-area text-center">
                            <img src="{{asset('nikepowerman.png')}}" style="width: 75%" alt="banner-circle">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- Available Game In start -->
    <section id="available-game-section" class="index-2 games-2 home-2" style="margin-bottom: 20px;">
        <div class="overlay pb-120">
            <div class="container wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-md-9 col-sm-8">
                            <div class="section-header">
                                <h2 class="title">Latest Skins</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $skins = \App\Models\GameCase::latest()->whereStatus(1)->get();
                @endphp
                <div class="tab-content" id="myTabContentt">
                    <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                        <div class="row contained-area mb-30-none">
                            @foreach($skins as $row)
                                <div class="col-lg-4">
                                    <div class="text-center">
                                    <a href="{{route('home.spin')}}"><img src="{{asset($row->image)}}" alt="image"></a>
                                        <p>{{$row->title}}</p>
                                        <p>{{$row->win_chance}}%</p>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Available Game In end -->
@endsection



