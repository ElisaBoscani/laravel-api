<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar flex-md-nowrap p-2  end-0 d-flex justify-content-between ">


            <button class="navbar-toggler  d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{--  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
            <div class="navbar-nav d-flex w-100">

            </div>
            <ul class="w-100">
                <li class="nav-item dropdown d-flex justify-content-end">

                    <button class="nav-link dropdown-toggle " type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        {{ Auth::user()->name }}</button>

                    <div class="offcanvas offcanvas-end bg_gray text-white" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">

                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-flex flex-column">
                            <a class="dropdown-item fw-bolder" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item fw-bolder" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item fw-bolder" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                </li>
            </ul>
    </div>

    </header>

    <div class="container-fluid vh-100 position-relative">
        <div class="row h-100">

            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block m_neg sidebar collapse">
                <div class="position-sticky pt-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">

                            <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg_secondary' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="fa-solid fa-house fa-sm" style="color: #ffffff;"></i> Home
                            </a>
                        </li>
                        <li
                            class="p-3 {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg_secondary' : '' }}">
                            <a href="{{ route('admin.projects.index') }}"
                                class=" text-decoration-none fw-bold text-white ">
                                <i class="fa-solid fa-pen-to-square fa-sm" style="color: #ffffff;"></i> Project
                                List</a>
                        </li>
                        <li
                            class="p-3 {{ Route::currentRouteName() == 'admin.technologies.index' ? 'bg_secondary' : '' }}">
                            <a href="{{ route('admin.technologies.index') }}"
                                class=" text-decoration-none fw-bold text-white ">
                                <i class="fa-solid fa-file-pen fa-sm" style="color: #ffffff;"></i> Technologies</a>
                        </li>
                    </ul>


                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    </div>
</body>

</html>
