@extends('layouts/master')
@section('title', 'Welcome')
@section('content')
<h1>Welcome To Etqan App {{ auth()->user()->first_name }}</h1>
@endsection
