<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StatsAnaliz') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/football/favicon.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

</head>
<body>

<div id="preloader">
    <div id="status">
        <img src="{{ asset('images/football/loader.gif') }}" id="preloader_image" alt="loader">
    </div>
</div>

<div class="cursor cursor-shadow"></div>
<div class="cursor cursor-dot"></div>

<a href="javascript:" id="return-to-top"><i class="flaticon-up-arrow"></i></a>

@include('layouts.navigation')

{{ $slot }}

@include('layouts.footer')

@stack('scripts')

</body>
</html>
