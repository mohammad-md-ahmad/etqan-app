@extends('layouts/master')
@section('title', 'Welcome')
@section('content')
<h1>Welcome To Etqan App</h1>
<a href="{{ route('auth.signup.view') }}">Sign Up</a>
@endsection
