    @if (Route::has('login'))
        <div id="navbar" class="sm:fixed sm:top-0 sm:left-0 p-6 text-left z-10" style="width: 70%; background-color: #FFF; border-bottom:1px solid black;">
            <a class="{{ request()->routeIs('welcome')?'active':'' }}" href="{{ route('welcome') }}">Welcome</a> -
            <a class="{{ request()->routeIs('task.one')?'active':'' }}" href="{{ route('task.one') }}">Task 1.1</a> -
            <a class="{{ request()->routeIs('task.one_two')?'active':'' }}" href="{{ route('task.one_two') }}">Task 1.2</a> -
            <a class="{{ request()->routeIs('task.one_three')?'active':'' }}" href="{{ route('task.one_three') }}">Task 1.3</a> -
            <a class="{{ request()->routeIs('task.two')?'active':'' }}" href="{{ route('task.two') }}">Task 2</a> - 
            <a class="{{ request()->routeIs('posts.*')?'active':'' }}" href="{{ route('posts.index') }}">Posts</a>
        </div>
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10" style="width: 30%; background-color: #FFF; border-bottom:1px solid black;">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif