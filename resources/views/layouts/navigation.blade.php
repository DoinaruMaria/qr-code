<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-lg">
    <!-- Primary Navigation Menu -->
    @if(Auth::check())
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('img/logo.svg') }}" width="80x" height="80px">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        {{ __('Acasă') }}
                    </x-nav-link>

                    <x-nav-link :href="route('my-tickets')" :active="request()->routeIs('my-tickets')">
                        {{ __('Biletele mele') }}
                    </x-nav-link>

                    <x-nav-link :href="route('closed-events')" :active="request()->routeIs('closed-events')">
                        {{ __('Evenimente încheiate') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>

                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>
                            @if(Auth::user()->role === 1)
                                <x-dropdown-link :href="route('admin-dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                            @endif                    
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Deconectează-te') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                {{ __('Acasă') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('my-tickets')" :active="request()->routeIs('my-tickets')">
                {{ __('Biletele mele') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('closed-events')" :active="request()->routeIs('closed-events')">
                {{ __('Evenimente încheiate') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <!-- <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div> -->
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>
                            @if(Auth::user()->role === 1)
                                <x-dropdown-link :href="route('admin-dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                            @endif
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Deconectați-vă') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('img/logo.svg') }}" width="80x" height="80px">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        {{ __('Acasă') }}
                    </x-nav-link>

                    <x-nav-link :href="route('closed-events')" :active="request()->routeIs('closed-events')">
                        {{ __('Evenimente încheiate') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Connecting -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('login')">{{ __('Conectare') }}</x-nav-link>
                <x-nav-link :href="route('register')">{{ __('Înregistrare') }}</x-nav-link>

            </div>

        </div>
        @endif


</nav>