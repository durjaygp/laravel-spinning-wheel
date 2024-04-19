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


<script>
    $(document).ready(function () {
        // Check if spin button should be hidden
        var spinButtonHidden = localStorage.getItem('spinButtonHidden');
        if (spinButtonHidden === 'true') {
            $("#spin").hide();
        }

        var $carousel = $('.main-carousel').flickity({
            // options
            cellAlign: 'center',
            contain: true,
            draggable: false,
            wrapAround: true,
            prevNextButtons: false,
            pageDots: false
        });

        var winning_id; // Define winning_id outside the click event handler

        $("#spin").on("click", function () {
            // Hide the spin button
            $(this).hide();

            var flkty = $('.main-carousel').data('flickity');
            if (document.querySelector('.is-win')) {
                document.querySelector('.is-win').classList.remove('is-win');
                for (i in flkty.cells) {
                    flkty.cells[i].element.classList.remove('opacity-25');
                }
            }

            // Fetch the win chances from the backend
            $.ajax({
                url: '/fetch-win-chances',
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
                       // console.log('Winning ID:', winning_id); // Log the winning ID

                        // Save the winning ID to the database
                        $.ajax({
                            url: '/save-winning-id',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: { winning_id: winning_id }, // Pass winning_id here
                            success: function (response) {
                              //  console.log('Winning ID saved successfully!');
                                // You can perform any additional actions after saving the winning ID here
                            },
                            error: function (error) {
                                console.error('Error saving winning ID:', error);
                            }
                        });

                        var time = 6000;
                        var intervalTime = time / (time / 80);
                        var loop = 0;
                        var totalLoop = time / 80;
                        var spin = setInterval(() => {
                            if (loop < totalLoop) {
                                $carousel.flickity('next');
                                loop++;
                            } else if (flkty.selectedIndex !== winning_id - 1) { // Use winning_id here
                                $carousel.flickity('next');
                            } else {
                                flkty.selectedElements[0].classList.add('is-win');
                                for (i in flkty.cells) {
                                    flkty.cells[i].element.classList.add('opacity-25');
                                }
                                clearInterval(spin);

                                // Mark the spin button as not hidden in localStorage
                                localStorage.setItem('spinButtonHidden', 'false');
                            }
                        }, intervalTime);

                        // Trigger spinning animation after 6 seconds
                        setTimeout(function () {
                            // Check if the spin button is hidden
                            if ($("#spin").is(":hidden")) {
                                // Reset the carousel to the first item
                                $carousel.flickity('select', 0);
                                // Show the spin button
                                $("#spin").hide();
                            }
                        }, 6000);
                    }
                },
                error: function (error) {
                    console.error('Error fetching win chances:', error);
                }
            });
        });
    });
</script>

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
</body>

</html>
