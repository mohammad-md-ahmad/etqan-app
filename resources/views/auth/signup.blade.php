@extends('layout.master')
@section('title', 'Sign Up')
@section('content')
<h1>Sign Up</h1>
<form id="signup-form">
    <div>
        <label>First Name</label>
        <input type="text" name="first_name" />
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" />
    </div>
    <div>
        <label>Username</label>
        <input type="text" name="username" />
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email" />
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password" />
    </div>
    <div>
        <label>Password Confirmation</label>
        <input type="text" name="password_confirmation" />
    </div>
    <div>
        <button type="submit" id="submit-btn">Submit</button>
    </div>
</form>

<script type="module">
$(document).ready(function () {
    $('#submit-btn').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            'url': '/auth/signup',
            'type': 'POST',
            datatype: 'json',
            data: $('#signup-form').serialize(),
            success: function (response) {
                console.log(response);
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
    });
})
</script>
@endsection
