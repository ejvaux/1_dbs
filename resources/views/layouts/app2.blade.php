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
<body style='overflow:hidden;'>
    <div id="app">
        <div class='container-fluid' >
            <div class='row'>
                <div class='col-md-2 m-0 p-0 background'>
                    <div id='sdbr container' class='sidebr'>
                        @include('inc.sidebar')
                    </div>                    
                </div>
                <div class='col-md-10 m-0 p-0'>
                    <div id='nvbr'>
                        @include('inc.navbar2')
                    </div>        
                    <main class="py-4">
                        @yield('content')
                    </main>                     
                </div>
            </div>
        </div>            
    </div>
</body>
</html>
