@extends('layouts/master')
@section('title', trans('Profile'))
@section('content')
<div>
    {{ $user->first_name }}
</div>
<div>
    <button id="follow-user-btn" data-username="{{ $user->username }}" class="button bg-blue-500 text-white font-bold py-3 px-5">{{ trans('Follow') }}</button>
</div>
@vite('resources/js/user/profile.js')
@endsection
