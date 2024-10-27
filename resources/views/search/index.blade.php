@extends('layouts/master')
@section('title', trans('Search Results'))
@section('content')
<div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500">
                {{ $error }}
            </div>
        @endforeach
    @else
        <h1>{{ trans('Search Results') }}</h1>
        <h2>{{ trans('Users:') }}</h2>
        @if (!empty($users))
            @foreach ($users as $user)
                <div>
                    {{ $user->first_name }}
                </div>
            @endforeach
        @else
            <p>{{ trans('No users found') }}</p>
        @endif
    @endif
</div>
@endsection
