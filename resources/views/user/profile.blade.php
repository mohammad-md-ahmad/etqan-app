@extends('layouts/master')
@section('title', trans('Profile'))
@section('content')
<div class="container">
    <div class="flex justify-between items-center max-w-[300px]">
        <div>
            {{ $user->first_name }}
        </div>
        <button id="follow-user-btn" data-username="{{ $user->username }}" data-is-following={{ $isFollowing ? 'true' : 'false' }} class="button bg-blue-500 text-white font-bold py-3 px-5">
            @if ($isFollowing)
            {{ trans('Unfollow') }}
            @else
            {{ trans('Follow') }}
            @endif
        </button>
    </div>
</div>
@vite('resources/js/user/profile.js')
@endsection
