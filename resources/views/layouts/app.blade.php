<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deliveboo') }}</title>

    {{-- CDN sweet alert --}}

    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/admin.js'])
    @yield('popup')
</head>

<body id="page-top" class="">
    <div id="app">

                <div id="wrapper">
                    
                        @include('layouts.partials.sidebar')


                        <div id="content-wrapper">
                            <div id="content">
                                @include('layouts.partials.header')
                                
                                <main class="mt-3">
                                    <div class="container-fluid">
                                        @yield('content')
                                    </div>
                                </main>
                            </div>

                            

                            {{-- @include('layouts.partials.footer') --}}

                        </div>


                        

                        

                </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
</body>



</html>
