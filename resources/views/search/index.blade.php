@extends('layouts/master')
@section('title', trans('Search Results'))
@section('content')
<div>
    <h1>{{ trans('Search Results') }}</h1>
    <h2>{{ trans('Users:') }}</h2>
    @foreach ($users as $user)
    <div>
        {{ $user->first_name }}
    </div>
    @endforeach
</div>
@endsection
