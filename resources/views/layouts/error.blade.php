<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name') }} - @yield('title')</title>
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="h-full">
        <header class="w-full">
            <x-nav/>
        </header>
        <main class="pt-[70px] w-full h-full px-10">
            <div class="">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                    @yield('code')
                </div>

                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                    @yield('message')
                </div>
            </div>
        </main>
        <footer></footer>
    </body>
</html>