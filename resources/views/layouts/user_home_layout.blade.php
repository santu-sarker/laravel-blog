<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    {{-- custom css file includes here --}}
    @yield('css-scripts')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>
    <script src="{{ asset('js/bt_5/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    @yield('js-scripts')
    <!-- Fonts -->

</head>

<body>
    <div id="app" class="container_fluid">
        <div class="navigation-section">
            @include('includes.user.navigation_bar')

        </div>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="site-footer ">
            @include('includes.footer')
        </footer>
    </div>

</body>

</html>
