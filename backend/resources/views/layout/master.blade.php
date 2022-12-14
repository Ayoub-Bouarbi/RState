<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
        @stack("styles")
    </head>
    <body>
        @include("includes.navbar")
        <main id="app" class="flex">
            @include("includes.sidebar")
            @yield('content')
        </main>
        @stack('scripts')
    </body>
</html>
