@extends('layouts/master')
@section('title', trans('signup'))
@section('content')
<div class="mx-auto max-w-[250px] md:max-w-[600px]">
    <h1 class="text-blue-500 font-bold text-4xl">{{ trans('Sign Up') }}</h1>
    <form id="signup-form">
        <div id="error-messages-container" class="m-4 p-4 ps-0 text-red-700"></div>
        <div class="my-4 p-4 border rounded-lg">
            <label class="font-bold text-blue-500">{{ trans('First Name') }}</label>
            <input type="text" name="first_name" class="p-2 border-2 block w-full rounded-lg"/>
        </div>
        <div class="my-4 p-4 border rounded-lg">
            <label class="font-bold text-blue-500">{{ trans('Last Name') }}</label>
            <input type="text" name="last_name" class="p-2 border-2 block w-full rounded-lg"/>
        </div>
        <div class="my-4 p-4 border rounded-lg">
            <label class="font-bold text-blue-500">{{ trans('Username') }}</label>
            <input type="text" name="username" class="p-2 border-2 block w-full rounded-lg"/>
        </div>
        <div class="my-4 p-4 border rounded-lg">
            <label class="font-bold text-blue-500">{{ trans('Email') }}</label>
            <input type="email" name="email" class="p-2 border-2 block w-full rounded-lg"/>
        </div>
        <div class="my-4 p-4 border rounded-lg">
            <label class="font-bold text-blue-500">{{ trans('Password') }}</label>
            <input type="password" name="password" class="p-2 border-2 block w-full rounded-lg"/>
        </div>
        <div class="my-4 p-4 border rounded-lg">
            <label class="font-bold text-blue-500">{{ trans('Password Confirmation') }}</label>
            <input type="password" name="password_confirmation" class="p-2 border-2 block w-full rounded-lg"/>
        </div>
        <div class="flex justify-end my-4 p-4 pe-0">
            <button type="submit" id="submit" class="bg-blue-500 uppercase p-4 m-0 px-[25px] text-lg font-bold text-white">{{ trans('Submit') }}</button>
        </div>
    </form>
</div>
@vite('resources/js/auth/signup.js')
@endsection
