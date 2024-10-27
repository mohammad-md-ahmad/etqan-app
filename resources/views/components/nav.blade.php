<nav class="flex justify-between items-center px-10 py-2 text-xl bg-blue-500 font-bold">
    <a href="{{ route('home') }}" class="text-white py-3 px-5">{{ trans(config('app.name')) }}</a>
    <div>
        <form method="GET" action="{{ route('search.view') }}">
            <div class="flex justify-between items-center">
                <div>
                    <input type="search" name="searchTerm"/>
                </div>
                <div>
                    <button class="text-white ms-3">{{ trans('Search') }}</button>
                </div>
            </div>
        </form>
    </div>
    <ul class="flex justify-end space-x-4 min-w-[200px] text-white">
        @if (! auth()->check())
        <x-nav-item href="{{ route('auth.signup.view') }}" active="{{ request()->routeIs('auth.signup.view') }}">{{ trans('sing up') }}</x-nav-item>
        <x-nav-item href="{{ route('auth.login.view') }}" active="{{ request()->routeIs('auth.login.view') }}">{{ trans('login') }}</x-nav-item>
        @else
        <x-nav-item href="{{ route('auth.logout') }}" id="logout-link" class="whitespace-nowrap py-3 px-5 rounded-md bg-blue-500">{{ trans('logout') }}</x-nav-item>
        @endif
    </ul>
</nav>
