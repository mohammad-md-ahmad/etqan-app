@extends('layouts/master')
@section('title', 'signup')
@section('content')
<h1>Sign Up</h1>
<form id="signup-form">
    <div class="py-4">
        <label>First Name</label>
        <input type="text" name="first_name" class="p-2 border block"/>
    </div>
    <div class="py-4">
        <label>Last Name</label>
        <input type="text" name="last_name" class="p-2 border block"/>
    </div>
    <div class="py-4">
        <label>Username</label>
        <input type="text" name="username" class="p-2 border block"/>
    </div>
    <div class="py-4">
        <label>Email</label>
        <input type="email" name="email" class="p-2 border block"/>
    </div>
    <div class="py-4">
        <label>Password</label>
        <input type="password" name="password" class="p-2 border block"/>
    </div>
    <div class="py-4">
        <label>Password Confirmation</label>
        <input type="text" name="password_confirmation" class="p-2 border block"/>
    </div>
    <div class="py-4">
        <button type="submit" id="submit" class="bg-blue-500 uppercase p-4 px-[25px] mx-2 text-lg font-bold">Submit</button>
    </div>
</form>
<script type="module">
    $(document).ready(function() {
        $('#submit').on('click', function (e) {
            e.preventDefault();

            $.ajax({
                url: '/auth/signup',
                type: 'POST',
                datatype: 'json',
                data: $('#signup-form').serialize(),
                success: function (response) {

                }
            });
        })
    })
</script>
@endsection
