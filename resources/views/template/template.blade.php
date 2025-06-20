<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/sass/app.scss'])
    @yield('header')
    @yield('csrf')
</head>
<body>
    <div id="preloader" class="preloader">
        <img src="{{asset('assets/img/preloader.gif')}}" alt="">
    </div>
    @yield('container')
    @yield('footer')
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>