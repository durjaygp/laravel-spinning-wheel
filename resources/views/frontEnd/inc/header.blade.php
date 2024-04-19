<header id="header-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex header-area">
                <div class="logo-section flex-grow-1 d-flex align-items-center">
                    <a class="site-logo site-title" href="{{route('home')}}"><img  width="100px" src="{{asset($website->website_logo)}}"
                                                                           alt="site-logo"></a>
                </div>
                <button class="navbar-toggler ml-auto collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav main-menu ml-auto">
                            <li><a href="{{route('home')}}" class="active">Home</a>
                            </li>
                            <li class=""><a href="#">Spinning Wheel</a></li>
                            <li class=""><a href="#">Skins</a></li>
                            <li class=""><a href="#">Contact Me</a></li>
                            @auth
                                <li class="menu_has_children"><a href="#0">{{ auth()->user()->name }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('home.win')}}">My Profile</a></li>
                                        <li><a href="#" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();" >Logout</a></li>
                                        <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                                            @csrf

                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class=""><a href="#">Login</a></li>
                            @endauth

                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
