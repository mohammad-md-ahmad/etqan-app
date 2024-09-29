<nav>
    <a href="{{ route('home') }}">{{ trans(config('app.name')) }}</a>
    <ul>
        @if (! auth()->check())
        <li>
            <a href="{{ route('auth.signup.view') }}">{{ trans('sing up') }}</a>
        </li>
        <li>
            <a href="{{ route('auth.login.view') }}">{{ trans('login') }}</a>
        </li>
        @else
        <li>
            <a href="{{ route('auth.logout') }}" id="logout-link">{{ trans('logout') }}</a>
        </li>
        @endif
    </ul>
</nav>
