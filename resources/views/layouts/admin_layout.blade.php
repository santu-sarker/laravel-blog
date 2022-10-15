<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>


    <!-- Styles -->
    {{-- adminlte css dependencies --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-6/css/all.min.css">

    {{-- custom css file includes here --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="./css/adminlte.min.css">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    {{--
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet"> --}}
    @yield('css-scripts')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>
    <script src="{{ asset('./js/bootstrap_bundle.min.js') }}" defer></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> --}}
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('./js/adminlte.min.js') }}" defer></script>
    @yield('js-scripts')
    <!-- Fonts -->

</head>

<body>
    <div id="app" class="container_fluid">
        <div class="navigation-section">
            @include('includes.admin.navigation_bar')
            @include('includes.admin.side_navbar')

        </div>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="site-footer ">
            @include('includes.admin.footer')
        </footer>
    </div>

</body>

</html>
