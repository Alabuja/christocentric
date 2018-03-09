<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="We give you access to Christocentric Songs">
    <meta name="keywords" content="Songs, Song, Christocentric, Gospel Songs, Gospel Song, Christian songs, Christian song">
    <meta name="author" content="Daniel Alabuja">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Christocentric Lyrics @yield('title')</title>

    <!-- Styles -->
     {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/edua-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cubeportfolio.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootsnav.css') }}">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <link href="https://icons8.com">

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            entity_encoding: 'raw',
            plugins: 'code link'
        });
    </script>

    <style type="text/css">
        footer {bottom:0;}
    </style>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
    <!--Header-->
    <header>
      <nav class="navbar navbar-default navbar-sticky bootsnav"> 
        <div class="container">
            {{-- <div class="search_btn btn_common"><i class="icon-icons185"></i></div> --}}
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
              <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/')}}">
            	<img src="{{url('img/logo.png') }}" class="logo logo-scrolled" alt="">
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
                @if (Auth::guest())
                <li class="{{ Request::segment(1) === 'songs' ? 'active' : '' }}"><a href="{{ url('songs') }} ">Songs</a></li>
                <li class="{{ Request::segment(1) === 'artistes' ? 'active' : '' }}"><a href="{{ url('/artistes') }}">Artistes</a></li>
                <li class="{{ Request::segment(1) === 'add-lyrics' ? 'active' : '' }}"><a href="{{ url('/add-lyrics') }}">Submit Song</a></li>
                <li class="{{ Request::segment(1) === 'login' ? 'active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
                <li class="{{ Request::segment(1) === 'register' ? 'active' : '' }}"><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="{{ Request::segment(1) === 'home' ? 'active' : '' }}"><a href="{{ url('/home')}}">Submit Song</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/update')}}">Change password</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
          </div>
        </div>   
      </nav>
    </header>
    {{-- <div id="search">
      <button type="button" class="close">×</button>
      <form>
        <input type="search" value="" placeholder="Search here...."  required/>
        <button type="submit" class="btn btn_common blue">Search</button>
      </form>
    </div> --}}

    @yield('content')

    <!-- Scripts -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112797924-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-112797924-1');
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=167797870680360&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bootsnav.js') }}"></script>
    <script src="{{ asset('/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('/js/jquery.parallax-1.1.3.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.cubeportfolio.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('/js/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('/js/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('/js/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('/js/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('/js/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('/js/functions.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/share.js') }}"></script>
</body>
</html>
