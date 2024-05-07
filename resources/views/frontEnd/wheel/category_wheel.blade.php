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
{{--                    <div class="main-carousel">--}}
{{--                        @foreach($spins as $row)--}}
{{--                            <div class="carousel-cell">--}}
{{--                                <img src="{{asset($row->image)}}" alt="image">--}}
{{--                                <h4>{{$row->title}}</h4>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}

                    <div class="main-carousel">
                        @foreach($spins as $row)
                            <div class="carousel-cell" id="item-{{$row->id}}">
                                <img src="{{asset($row->image)}}" alt="image">
                                <h4>{{$row->title}}</h4>
                                <input type="hidden" value="{{$row->win_chance}}" id="win_chance">
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
                                                        <label>Username</label>
                                                        <input class="form-control" name="username"
                                                               placeholder="User Name" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Username</label>
                                                        <input class="form-control" name="name"
                                                               placeholder="Confirm Username" type="text">
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
                <div class="tab-content" id="myTabContentt">
                    <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                        <div class="row contained-area mb-30-none">
                            @foreach($skinss as $row)
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <a href="#"><img src="{{asset($row->image)}}" alt="image"></a>
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

@section('script')
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            // Check if spin button should be hidden--}}
{{--            var spinButtonHidden = localStorage.getItem('spinButtonHidden');--}}
{{--            if (spinButtonHidden === 'true') {--}}
{{--                $("#spin").hide();--}}
{{--            }--}}

{{--            var $carousel = $('.main-carousel').flickity({--}}
{{--                cellAlign: 'center',--}}
{{--                contain: true,--}}
{{--                draggable: false,--}}
{{--                wrapAround: true,--}}
{{--                prevNextButtons: false,--}}
{{--                pageDots: false--}}
{{--            });--}}

{{--            var winning_id; // Define winning_id outside the click event handler--}}
{{--            var spin; // Define spin variable globally--}}

{{--            $("#spin").on("click", function () {--}}
{{--                // Hide the spin button--}}
{{--                $(this).hide();--}}

{{--                var flkty = $carousel.data('flickity');--}}
{{--                if ($('.is-win').length > 0) {--}}
{{--                    $('.is-win').removeClass('is-win');--}}
{{--                    $('.carousel-cell').removeClass('opacity-25');--}}
{{--                }--}}

{{--                // Fetch the win chances from the backend--}}
{{--                $.ajax({--}}
{{--                    url: '/fetch-win-chances',--}}
{{--                    type: 'GET',--}}
{{--                    success: function (response) {--}}
{{--                        var winChances = response.winChances;--}}

{{--                        // Calculate the total win chance--}}
{{--                        var totalWinChance = winChances.reduce((total, current) => total + parseFloat(current.win_chance), 0);--}}

{{--                        // Generate a random number between 0 and totalWinChance--}}
{{--                        var randomNumber = Math.random() * totalWinChance;--}}

{{--                        // Determine the winning index based on the win chances--}}
{{--                        var cumulativeChance = 0;--}}
{{--                        var winIndex = -1;--}}
{{--                        for (var i = 0; i < winChances.length; i++) {--}}
{{--                            cumulativeChance += parseFloat(winChances[i].win_chance);--}}
{{--                            if (randomNumber < cumulativeChance) {--}}
{{--                                winIndex = i;--}}
{{--                                break;--}}
{{--                            }--}}
{{--                        }--}}

{{--                        if (winIndex !== -1) {--}}
{{--                            winning_id = winChances[winIndex].id;--}}
{{--                            console.log('Winning ID:', winning_id); // Log the winning ID--}}

{{--                            // Save the winning ID to the database--}}
{{--                            $.ajax({--}}
{{--                                url: '/save-winning-id',--}}
{{--                                type: 'POST',--}}
{{--                                headers: {--}}
{{--                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                                },--}}
{{--                                data: { winning_id: winning_id }, // Pass winning_id here--}}
{{--                                success: function (response) {--}}
{{--                                    console.log('Winning ID saved successfully!');--}}
{{--                                    // Start the spinning animation here--}}
{{--                                    startSpinAnimation();--}}
{{--                                },--}}
{{--                                error: function (error) {--}}
{{--                                    console.error('Error saving winning ID:', error);--}}
{{--                                }--}}
{{--                            });--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        console.error('Error fetching win chances:', error);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            // Function to start the spinning animation--}}
{{--            function startSpinAnimation() {--}}
{{--                var flkty = $carousel.data('flickity');--}}
{{--                var time = 6000;--}}
{{--                var intervalTime = time / (time / 80);--}}
{{--                var loop = 0;--}}
{{--                var totalLoop = time / 80;--}}
{{--                spin = setInterval(() => {--}}
{{--                    if (loop < totalLoop) {--}}
{{--                        $carousel.flickity('next');--}}
{{--                        loop++;--}}
{{--                    } else {--}}
{{--                        clearInterval(spin);--}}
{{--                        stopSpinAnimation();--}}
{{--                    }--}}
{{--                }, intervalTime);--}}
{{--            }--}}

{{--            function stopSpinAnimation() {--}}
{{--                var flkty = $carousel.data('flickity');--}}
{{--                var winningCellIndex = winning_id - 1; // Adjust index since IDs are not used--}}
{{--                var winningCell = $('.carousel-cell').get(winningCellIndex);--}}
{{--                flkty.selectCell(winningCell);--}}
{{--                flkty.selectedElements[0].classList.add('is-win');--}}
{{--                $('.carousel-cell').not(winningCell).addClass('opacity-25');--}}

{{--                // Mark the spin button as not hidden in localStorage--}}
{{--                localStorage.setItem('spinButtonHidden', 'false');--}}

{{--                // Show the spin button--}}
{{--                $("#spin").show();--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        // Check if spin button should be hidden--}}
{{--        var spinButtonHidden = localStorage.getItem('spinButtonHidden');--}}
{{--        if (spinButtonHidden === 'true') {--}}
{{--            $("#spin").hide();--}}
{{--        }--}}

{{--        var $carousel = $('.main-carousel').flickity({--}}
{{--            cellAlign: 'center',--}}
{{--            contain: true,--}}
{{--            draggable: false,--}}
{{--            wrapAround: true,--}}
{{--            prevNextButtons: false,--}}
{{--            pageDots: false--}}
{{--        });--}}

{{--        var winning_chance; // Define winning_chance outside the click event handler--}}
{{--        var spin; // Define spin variable globally--}}

{{--        $("#spin").on("click", function () {--}}
{{--            // Hide the spin button--}}
{{--            $(this).hide();--}}

{{--            var flkty = $carousel.data('flickity');--}}
{{--            if ($('.is-win').length > 0) {--}}
{{--                $('.is-win').removeClass('is-win');--}}
{{--                $('.carousel-cell').removeClass('opacity-25');--}}
{{--            }--}}

{{--            // Fetch the win chances from the backend--}}
{{--            $.ajax({--}}
{{--                url: '/fetch-win-chances',--}}
{{--                type: 'GET',--}}
{{--                success: function (response) {--}}
{{--                    var winChances = response.winChances;--}}

{{--                    // Calculate the total win chance--}}
{{--                    var totalWinChance = winChances.reduce((total, current) => total + parseFloat(current.win_chance), 0);--}}

{{--                    // Generate a random number between 0 and totalWinChance--}}
{{--                    var randomNumber = Math.random() * totalWinChance;--}}

{{--                    // Determine the winning chance based on the win chances--}}
{{--                    var cumulativeChance = 0;--}}
{{--                    for (var i = 0; i < winChances.length; i++) {--}}
{{--                        cumulativeChance += parseFloat(winChances[i].win_chance);--}}
{{--                        if (randomNumber < cumulativeChance) {--}}
{{--                            winning_chance = winChances[i].win_chance;--}}
{{--                            break;--}}
{{--                        }--}}
{{--                    }--}}

{{--                    // Find the winning cell based on winning_chance--}}
{{--                    var $winningCell = $('.carousel-cell').filter(function() {--}}
{{--                        return $(this).find('#win_chance').val() === winning_chance;--}}
{{--                    });--}}

{{--                    if ($winningCell.length > 0) {--}}
{{--                        // Get the index of the winning cell--}}
{{--                        var winningIndex = $carousel.find('.carousel-cell').index($winningCell);--}}

{{--                        // Save the winning ID to the database--}}
{{--                        $.ajax({--}}
{{--                            url: '/save-winning-id',--}}
{{--                            type: 'POST',--}}
{{--                            headers: {--}}
{{--                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                            },--}}
{{--                            data: { winning_id: winningIndex + 1 }, // Pass winning index--}}
{{--                            success: function (response) {--}}
{{--                                console.log('Winning ID saved successfully!');--}}
{{--                                // Start the spinning animation here--}}
{{--                                startSpinAnimation();--}}
{{--                            },--}}
{{--                            error: function (error) {--}}
{{--                                console.error('Error saving winning ID:', error);--}}
{{--                            }--}}
{{--                        });--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (error) {--}}
{{--                    console.error('Error fetching win chances:', error);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        // Function to start the spinning animation--}}
{{--        function startSpinAnimation() {--}}
{{--            var flkty = $carousel.data('flickity');--}}
{{--            var time = 6000;--}}
{{--            var intervalTime = time / (time / 80);--}}
{{--            var loop = 0;--}}
{{--            var totalLoop = time / 80;--}}
{{--            spin = setInterval(() => {--}}
{{--                if (loop < totalLoop) {--}}
{{--                    $carousel.flickity('next');--}}
{{--                    loop++;--}}
{{--                } else {--}}
{{--                    clearInterval(spin);--}}
{{--                    stopSpinAnimation();--}}
{{--                }--}}
{{--            }, intervalTime);--}}
{{--        }--}}

{{--        // Function to stop the spinning animation--}}
{{--        function stopSpinAnimation() {--}}
{{--            var flkty = $carousel.data('flickity');--}}
{{--            var $winningCell = $('.carousel-cell').filter(function() {--}}
{{--                return $(this).find('#win_chance').val() === winning_chance;--}}
{{--            });--}}
{{--            flkty.selectCell($winningCell);--}}
{{--            flkty.selectedElements[0].classList.add('is-win');--}}
{{--            $('.carousel-cell').not($winningCell).addClass('opacity-25');--}}

{{--            // Mark the spin button as not hidden in localStorage--}}
{{--            localStorage.setItem('spinButtonHidden', 'false');--}}

{{--            // Show the spin button--}}
{{--            $("#spin").show();--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}


    <script>
        $(document).ready(function () {
            // Check if spin button should be hidden
            var spinButtonHidden = localStorage.getItem('spinButtonHidden');
            if (spinButtonHidden === 'true') {
                $("#spin").hide();
            }

            var $carousel = $('.main-carousel').flickity({
                cellAlign: 'center',
                contain: true,
                draggable: false,
                wrapAround: true,
                prevNextButtons: false,
                pageDots: false
            });

            var winning_id; // Define winning_id outside the click event handler
            var spin; // Define spin variable globally

            $("#spin").on("click", function () {
                // Hide the spin button
                $(this).hide();

                var flkty = $carousel.data('flickity');
                if ($('.is-win').length > 0) {
                    $('.is-win').removeClass('is-win');
                    $('.carousel-cell').removeClass('opacity-25');
                }

                // Fetch the win chances from the backend
                $.ajax({
                    url: '/fetch-win-chances/{{$case->id}}',
                    type: 'GET',
                    success: function (response) {
                        var winChances = response.winChances;

                        // Calculate the total win chance
                        var totalWinChance = winChances.reduce((total, current) => total + parseFloat(current.win_chance), 0);

                        // Generate a random number between 0 and totalWinChance
                        var randomNumber = Math.random() * totalWinChance;

                        // Determine the winning index based on the win chances
                        var cumulativeChance = 0;
                        var winIndex = -1;
                        for (var i = 0; i < winChances.length; i++) {
                            cumulativeChance += parseFloat(winChances[i].win_chance);
                            if (randomNumber < cumulativeChance) {
                                winIndex = i;
                                break;
                            }
                        }

                        if (winIndex !== -1) {
                            winning_id = winChances[winIndex].id;
                            console.log('Winning ID:', winning_id); // Log the winning ID

                            // Save the winning ID to the database
                            $.ajax({
                                url: '/save-winning-id',
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: { winning_id: winning_id }, // Pass winning_id here
                                success: function (response) {
                                    console.log('Winning ID saved successfully!');
                                    // Start the spinning animation here
                                    startSpinAnimation();
                                },
                                error: function (error) {
                                    console.error('Error saving winning ID:', error);
                                }
                            });
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching win chances:', error);
                    }
                });
            });

            // Function to start the spinning animation
            function startSpinAnimation() {
                var flkty = $carousel.data('flickity');
                var time = 6000;
                var intervalTime = time / (time / 80);
                var loop = 0;
                var totalLoop = time / 80;
                spin = setInterval(() => {
                    if (loop < totalLoop) {
                        $carousel.flickity('next');
                        loop++;
                    } else {
                        clearInterval(spin);
                        stopSpinAnimation();
                    }
                }, intervalTime);
            }

            // Function to stop the spinning animation
            function stopSpinAnimation() {
                var flkty = $carousel.data('flickity');
                flkty.selectCell('.carousel-cell#item-' + winning_id);
                flkty.selectedElements[0].classList.add('is-win');
                $('.carousel-cell').not('#item-' + winning_id).addClass('opacity-25');

                // Mark the spin button as not hidden in localStorage
                localStorage.setItem('spinButtonHidden', 'false');

                // Show the spin button
                $("#spin").show();
            }
        });
    </script>


@endsection



