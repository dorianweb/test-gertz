<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    @yield('head')
    <title>Document</title>
</head>
<body>
    {{-- @include('common.nav') --}}
    @yield('content')
    {{-- @include('common.footer') --}}
</body>
@yield('scripts')
</html>