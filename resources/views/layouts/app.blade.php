<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Title -->
    <title>@yield('pageTitle')</title>

    <!-- Header -->
    @include('inc.header')
    
</head>
<body>
    <div id="app">         
        <div id='nvbr'>
            @include('inc.navbar')
        </div>        
        <main class="py-4">
            @yield('content')
        </main>      
    </div>
</body>
</html>
