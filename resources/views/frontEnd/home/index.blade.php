@extends('frontEnd.spin.index')
@section('title')
    {{$website->name}}
@endsection
@section('content')

    <!-- Feature Game In start -->
    <section id="feature-game-section">
        <div class="overlay pt-120 pb-120">
            <div class="container-fruid wow fadeInUp">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-md-9 col-sm-8">
                            <div class="section-header">
                                <h2 class="title">Spinning Wheel</h2>
                                <p>Spin To Win</p>
                            </div>
                        </div>
                        <div
                            class="col-lg-3 col-md-3 col-sm-4 d-flex align-items-center justify-content-center justify-content-sm-end">

                        </div>
                    </div>
                </div>
                <div class="position-relative mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                         class="bi bi-caret-down-fill position-absolute mx-auto text-warning"
                         style="top: -60px; left: 0; right: 0;" viewBox="0 0 16 16">
                        <path
                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                         class="bi bi-caret-up-fill position-absolute mx-auto text-warning"
                         style="bottom: -60px; left: 0; right: 0;" viewBox="0 0 16 16">
                        <path
                            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                    </svg>
                    <div class="main-carousel">
                        @foreach($spins as $row)
                            <div class="carousel-cell" id="item-{{$row->id}}">
                                <img src="{{asset($row->image)}}" alt="image">
                                <h4>{{$row->title}}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>


                    @auth
                        <div class="text-center" style="margin-top: 90px;">
                        @if($left_point == 0)
                            <a href="javascript:void(0);" class="cmn-btn-alt cmn-btn"> Please Contact for Points</a>
                        @else
                            <a href="javascript:void(0);" class="cmn-btn-alt cmn-btn" id="spin"> Spin <img src="{{asset('homePage')}}/projects/images/double-right.png" alt="image"></a>
                        @endif
                    @else
                        <div class="text-center"  style="margin-top: 90px;">
                            <button type="button" class="cmn-btn" data-toggle="modal"
                                    data-target="#signUpModalReg">
                                REGISTER
                            </button>
                            <button type="button" class="cmn-btn" data-toggle="modal"
                                    data-target="#signInModalLong">
                                Login
                            </button>
                        </div>
                        <div class="modal register fade" id="signUpModalReg" tabindex="-1" role="dialog"
                             aria-labelledby="signUpModalRegTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="signUpModalRegTitle">
                                            <img src="{{asset($website->website_logo)}}"  width="100px" alt="image">
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <img src="{{asset('homePage')}}/images/cross-icon-1.png" alt="image">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="welcome">Get started in a minute!</h5>
                                        <div class="form-area">
                                            <form action="{{route('register')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input class="form-control" name="username"
                                                           placeholder="User Name" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Your Name</label>
                                                    <input class="form-control" name="name"
                                                           placeholder=" Name" type="text">
                                                </div>
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
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input class="form-control" name="password_confirmation" placeholder="Password"
                                                           type="password">
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="cmn-btn cmn-btn-alt"> Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                    @endauth
                    </div>
            </div>
        </div>
    </section>
    <!-- Feature Game In end -->

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
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <a href="javascript:void(0)"><img src="{{asset($row->image)}}" alt="image"></a>
                                    <p>{{$row->title}}</p>
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



