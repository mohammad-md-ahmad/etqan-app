<nav class="flex h-full justify-between">
    <a href="{{ route('home') }}" class="">{{ config('app.name') }}</a>
    <ul class="flex">
        <li>
            <a href="{{ route('auth.signup.view') }}">Sign Up</a>
        </li>
        <li>
            <a href="{{ route('auth.login.view') }}">{{ trans('Login') }}</a>
        </li>
    </ul>
</nav>
