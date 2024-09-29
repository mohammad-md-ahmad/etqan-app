<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name') }} - @yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-[100vh]">
        <header class="h-[50px] w-full">
            <x-nav/>
        </header>
        <main class="pt-[70px] w-full h-full">
            <div class="">
                @yield('content')
            </div>
        </main>
        <footer></footer>
    </body>
</html>
