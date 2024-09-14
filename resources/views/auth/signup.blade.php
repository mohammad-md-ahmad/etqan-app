@extends('layouts/master')
@section('title', 'signup')
@section('content')
<h1>Sign Up</h1>
<form id="signup-form">
    <div>
        <label>First Name</label>
        <input type="text" name="first_name"/>
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name"/>
    </div>
    <div>
        <label>Username</label>
        <input type="text" name="username"/>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email"/>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password"/>
    </div>
    <div>
        <label>Password Confirmation</label>
        <input type="text" name="password_confirmation"/>
    </div>
    <div>
        <button type="submit" id="submit">Submit</button>
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
