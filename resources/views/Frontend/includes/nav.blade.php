<!-- page First Navigation -->
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            {{-- <img src="{{asset('Frontend/imgs/logo.svg')}}" alt=""> --}}
        </a>
        <div class="socials">
            <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
            <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
            <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
            <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
            <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
        </div>
    </div>
</nav>
<!-- End Of First Navigation -->

<!-- Page Second Navigation -->
<nav class="navbar custom-navbar navbar-expand-md navbar-light bg-primary sticky-top">
    <div class="container">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="no-sidebar.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="single-post.html">Blog Entries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.contact')}}">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                  @if (Auth::check())
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome <span class="text-custom">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="{{route('front.logout')}}">LogOut</a>
                    </div>
                </li>
                    @else
                        <a href="{{route('front.login')}}" class="btn btn-secondary">Login</a>
                    @endif
                </button>

              </div>
        </div>
    </div>
</nav>
<!-- End Of Page Second Navigation -->
