<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycustomestyle.css') }}" rel="stylesheet">
</head>
<body class="body">
    <div id="app">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}" >HYDROLORE </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"   href="{{route('home')}}">Dashboard</a>
         <!--  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9eisZHYUZl95HlnmoKqrwrFRX92c1pxrERypd5UHDZl_UKdisklYj1O62eyGCxT_uPyA&usqp=CAU" style="width:40px; height: 40px; align-items: center;" > -->
        </li>


        <li class="nav-item {{ request()->routeIs('show_users') ? 'active' : '' }}">
          <a class="nav-link {{ request()->routeIs('show_users') ? 'active' : '' }}"  href="{{route('show_users')}}">Users</a>
        </li>


         <li class="nav-item {{ request()->routeIs('show_tickets') ? 'active' : '' }}">
          <a class="nav-link {{ request()->routeIs('show_tickets') ? 'active' : '' }}" href="{{route('show_tickets')}}">Tickets</a>
        </li>

         <li class="nav-item {{ request()->routeIs('show_settings') ? 'active' : '' }}">
          <a class="nav-link {{ request()->routeIs('show_settings') ? 'active' : '' }}"href="{{route('show_settings')}}">Settings</a>
        </li>

        <li class="nav-item {{ request()->routeIs('') ? 'active' : '' }}">
          <a class="nav-link disabled">logout</a>
        </li>


      </ul>


      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">


                    </ul>

                   
                    <ul class="navbar-nav ms-auto">
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                         <img class="rounded-circle" src="{{asset('images/person.png')}}" style="width:20px;height: 20px; margin: auto;" >
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
</nav>

<!-- sidebar -->





       

        

        <main class="py-4">
            <div style="margin-top: 50px;">
                @yield('content')
            </div>
            
        </main>
    </div>
</body>
</html>
