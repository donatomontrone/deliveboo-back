<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deliveboo') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
                        <svg width="140px" height="60px" viewBox="0 0 513 132" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="512x512-(Android)" transform="translate(0.000000, -199.000000)" fill="#00CCBC">
                                        <g id="logo-teal" transform="translate(0.000000, 199.000000)">
                                            <path d="M192.019736,98.8779 L190.150839,90.1659 L190.150839,38.2338 L179.359729,38.2338 L179.359729,61.92285 C176.113488,58.17735 171.648258,55.98285 166.378066,55.98285 C155.582008,55.98285 147.227228,64.85325 147.227228,77.87835 C147.227228,90.9051 155.582008,99.77715 166.378066,99.77715 C171.732383,99.77715 176.357616,97.4952 179.603857,93.58635 L180.738721,98.8779 L192.021386,98.8779 L192.019736,98.8779 Z M157.691734,77.8734 C157.691734,71.3625 162.315317,67.2969 168.562021,67.2969 C174.896148,67.2969 179.437256,71.3625 179.437256,77.8734 C179.437256,84.3084 174.894499,88.45815 168.566969,88.45815 C162.318616,88.45815 157.690085,84.31005 157.690085,77.8767 L157.691734,77.8734 Z M373.212073,98.8779 L375.080971,90.1659 L375.080971,38.2338 L385.872081,38.2338 L385.872081,61.92285 C389.118321,58.17735 393.583551,55.98285 398.853743,55.98285 C409.649802,55.98285 418.004582,64.85325 418.004582,77.87835 C418.004582,90.9051 409.649802,99.77715 398.853743,99.77715 C393.499426,99.77715 388.874193,97.4952 385.627953,93.58635 L384.493088,98.8779 L373.210424,98.8779 L373.212073,98.8779 Z M407.717827,77.8734 C407.717827,71.3625 403.094244,67.2969 396.847541,67.2969 C390.513413,67.2969 385.972306,71.3625 385.972306,77.8734 C385.972306,84.3084 390.515063,88.45815 396.842592,88.45815 C403.090945,88.45815 407.719477,84.31005 407.719477,77.8767 L407.717827,77.8734 Z M228.612519,74.052 L207.841859,74.052 C209.059199,69.2505 212.707921,66.6435 218.225539,66.6435 C223.825634,66.6435 227.479304,69.2505 228.612519,74.052 Z M236.76111,94.8552 L232.624133,85.57725 C228.727985,87.6117 224.426057,88.8327 220.044952,88.8327 C214.36733,88.8327 210.390356,86.6349 208.68476,82.5627 L239.030839,82.5627 C239.355793,81.0183 239.520744,79.47225 239.520744,77.5995 C239.520744,64.5744 230.514407,55.86405 218.423481,55.86405 C206.253379,55.86405 197.326218,64.65855 197.326218,77.76285 C197.326218,91.11135 206.170903,99.65835 219.884949,99.65835 C225.889174,99.65835 231.810923,98.0298 236.759461,94.85685 L236.76111,94.8552 Z M357.716554,74.052 L336.945894,74.052 C338.161585,69.2505 341.811956,66.6435 347.329575,66.6435 C352.929669,66.6435 356.583339,69.2505 357.716554,74.052 Z M365.672152,94.9707 L361.531876,85.68945 C357.634078,87.72555 353.3338,88.9449 348.951045,88.9449 C343.271774,88.9449 339.2948,86.7504 337.590853,82.6749 L367.941881,82.6749 C368.266835,81.1305 368.426838,79.58445 368.426838,77.71335 C368.426838,64.68825 359.4205,55.9779 347.329575,55.9779 C335.156173,55.9779 326.232311,64.76745 326.232311,77.8767 C326.232311,91.2252 335.078646,99.7722113 348.791042,99.7722113 C354.795268,99.77715 360.717017,98.15025 365.673802,94.974 L365.672152,94.9707 Z M312.033309,98.8812 L323.315973,56.87715 L311.548352,56.87715 L303.274398,90.90345 L294.993846,56.8755 L283.389526,56.8755 L294.672191,98.87625 L312.033309,98.87625 L312.033309,98.8812 Z M266.836669,98.8812 L277.621181,98.8812 L277.621181,56.8722 L266.83337,56.8722 L266.83337,98.8779 L266.836669,98.8812 Z M491.65531,88.45815 C485.408606,88.45815 480.785023,84.31005 480.785023,77.8767 C480.785023,71.36415 485.408606,67.2969 491.65531,67.2969 C497.984489,67.2969 502.525596,71.36415 502.525596,77.8767 C502.525596,84.3117 497.984489,88.4598 491.65531,88.4598 L491.65531,88.45815 Z M491.656959,55.9812 C479.401082,55.9812 470.315568,64.85325 470.315568,77.8767 C470.315568,90.9051 479.404381,99.7755 491.65531,99.7755 C503.911187,99.7755 513,90.9051 513,77.88 C513,64.85325 503.911187,55.9812 491.658609,55.9812 L491.656959,55.9812 Z M432.987103,77.8734 C432.987103,71.3625 437.615635,67.2969 443.85739,67.2969 C450.191517,67.2969 454.735924,71.3625 454.735924,77.8734 C454.735924,84.3084 450.189868,88.45815 443.859039,88.45815 C437.613985,88.45815 432.985453,84.31005 432.985453,77.8767 L432.987103,77.8734 Z M465.20043,77.8767 C465.20043,64.85325 456.111617,55.9812 443.859039,55.9812 C431.603162,55.9812 422.517648,64.85325 422.517648,77.8767 C422.517648,90.9051 431.606461,99.7755 443.85739,99.7755 C456.113267,99.7755 465.20208,90.9051 465.20208,77.88 L465.20043,77.8767 Z M257.175475,98.87955 L257.175475,38.2305 L246.384365,38.2305 L246.384365,98.87625 L257.175475,98.87625 L257.175475,98.87955 Z M279.003473,44.25135 C279.003473,40.34415 276.083836,37.41375 272.270163,37.41375 C268.377314,37.41375 265.457677,40.34415 265.457677,44.25135 C265.457677,48.15855 268.377314,51.08895 272.273462,51.08895 C276.083836,51.08895 279.003473,48.15855 279.003473,44.25135 L279.003473,44.25135 Z M80.6875476,58.2054 L70.1471635,9.1344 L37.1074305,16.08915 L47.6395671,65.16015 L0,75.17895 L8.41251314,114.378 L92.191247,132 L111.348684,89.40855 L120.463889,3.498 L86.863322,0 L80.6875476,58.2054 Z M53.958849,85.0608 C51.5406639,84.2655 50.4651818,81.36975 51.3823107,77.8668 C52.0652088,75.26805 55.2784589,74.8803 56.8867335,74.8506 C57.4970531,74.8407 58.0991251,74.9628 58.6517117,75.2103 C59.7898753,75.7218 61.7148562,76.8075 62.1057907,78.46575 C62.6715734,80.85825 62.1272343,82.8663 60.4001949,84.43215 C58.6682069,86.0046 56.3852817,85.86105 53.9604985,85.06245 L53.958849,85.0608 Z M76.8573799,88.011 C74.6734255,86.9517 74.6899206,84.25395 74.9274504,82.6089 C75.0561124,81.71295 75.4190051,80.86815 75.9864373,80.15535 C76.7666567,79.17525 78.0697715,77.8998 79.5741268,77.86185 C82.0236527,77.79585 84.13008,78.88485 85.3193784,80.85165 C86.5136254,82.81185 85.9165019,84.97335 84.6595734,87.13815 C83.3943974,89.2947 80.1003212,89.58015 76.8573799,88.00935 L76.8573799,88.011 Z" id="Shape"></path>
                                        </g>
                                    </g>
                                </g>
                        </svg>
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('admin/dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            </div>
        </nav>

        <main class="">

            <section>

                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>

            </section>
         
                @yield('partials.sidebar')
                
           


            @yield('content')
        </main>
    </div>
</body>

</html>
