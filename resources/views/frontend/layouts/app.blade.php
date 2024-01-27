<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        {{-- @stack('prepend-style') --}}
        @include('frontend.includes.style')
        {{-- @stack('addon-style') --}}
    </head>
    <body>

        @include('frontend.includes.navbar')
        @yield('content')
        @include('frontend.includes.footer')
        {{-- @stack('prepend-script') --}}
        @include('frontend.includes.script')
        {{-- @stack('addon-script') --}}
    </body>
</html>
