<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - @yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-[100vh]">
        <header class="fixed h-[50px] w-full bg-blue-500 text-white font-bold p-2 px-4">
            <x-nav/>
        </header>
        <main class="flex justify-center pt-[50px] h-full w-full">
            <div class="container h-full  pt-10">
                @yield('content')
            </div>
        </main>
        <footer></footer>
    </body>
</html>
