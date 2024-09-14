<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name') }} - @yield('title')</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
   </head>
   <body>
      @yield('content')
   </body>
</html>
