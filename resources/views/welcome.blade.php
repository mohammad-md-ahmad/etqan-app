@extends('layouts/master')
@section('title', 'Welcome')
@section('content')
<div class="flex justify-center items-center h-full w-full">
    <h1>{{ trans('Weclome To :app_name', ['app_name' => config('app.name')]) }}</h1>
</div>
@endsection
