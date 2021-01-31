<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>

    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jquery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- fontawesome -->
    <script src="{{ asset('js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/all.css') }}">
</head>
@yield('content');
</html>