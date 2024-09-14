@extends('layout.master')
@section('title', 'Welcome')
@section('content')
<h1>Welcome To Etqan App</h1>
<a href="{{ route('auth.signup.view') }}">{{ __('Sign Up') }}</a>
@endsection
