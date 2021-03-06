<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script defer src="{{ mix('js/app.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @auth
        <!-- Esto es trampa -->
        <meta name="logged" content="1"> 
        @endauth
        @guest
        <!-- Esto es trampa -->
        <meta name="logged" content="0"> 
        @endguest
        @yield("estilo")

        
        <title> {{ config("app.server_namerino") }} </title>
    </head>
    <body >
        <div id="app">
        @yield("contenido")
        </div>
    </body>
</html>
