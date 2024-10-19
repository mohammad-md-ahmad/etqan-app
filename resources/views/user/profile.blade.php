@extends('layouts/master')
@section('title', trans('Profile'))
@section('content')
<div>
    {{ $user->first_name }}
</div>
@endsection
