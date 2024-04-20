@extends('frontEnd.spin.index')
@section('title')
    Update Profile
@endsection
@section('content')
    @php
        $person = \App\Models\User::find(auth()->user()->id);
    @endphp
    <!-- Todays winner In start -->
    <section id="todays-winner-section" class="games">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div style="margin-top:100px;">
                    <div class="form-area">
                        <div class="m-3 text-center">
                            <h4>Update Your Personal Information</h4>
                        </div>

                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="text-white">Username</label>
                                <input class="form-control" name="username" placeholder="Username" type="text" value="{{$person->username}}">
                            </div>
                            <div class="form-group">
                                <label class="text-white">Email Address</label>
                                <input class="form-control" name="email" placeholder="Registered Email Address." type="email" value="{{$person->email}}">
                            </div>
                            <div class="form-group">
                                <label class="text-white">Profile Picture</label>
                                <input type="file" name="image" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label class="text-white">Your Current Profile Picture</label>
                                <br>
                                <img src="{{asset($person->image)}}" class="w-25 img-thumbnail" name="image" alt="">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="cmn-btn cmn-btn-alt"> Update</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="container wow fadeInUp">
                <div style="margin-top:100px;">
                    <div class="form-area">
                        <div class="m-3 text-center">
                            <h4>Update Your Password</h4>
                        </div>

                        <form action="{{route('password.update')}}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="text-white">Current Password</label>
                                <input class="form-control" name="current_password" placeholder="Current Password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <label class="text-white">New Password</label>
                                <input class="form-control" name="password" placeholder="New Password" type="password">
                            </div>
                            <div class="form-group">
                                <label class="text-white">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="cmn-btn cmn-btn-alt"> Update</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Todays winner In end -->

@endsection



