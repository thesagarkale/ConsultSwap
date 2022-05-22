<nav x-data="{ open: false }" class="lg:border-b lg:border-gray-100 bg-theme-blue">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fa fa-home fa-lg"></i><span class="ml-2">Dashboard</span>
                    </x-nav-link>
                </div>

                <div class="hidden sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('messages_index')" :active="request()->routeIs('messages_index')">
                        <i class="fa fa-comments fa-lg"></i><span class="ml-2">Messages</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="vue-app mr-6">
                    <notifications-wrapper
                            user-id="{{ \Illuminate\Support\Facades\Auth::user()->id }}"></notifications-wrapper>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-white hover:text-red-400 hover:border-red-400 focus:outline-none focus:text-red-400 focus:border-red-400 transition duration-150 ease-in-out">
                            <div>{{ __('Hello, ')  }}{{ Auth::user()->first_name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link
                                href="/profiles/{{Auth::user()->username}}">{{ __('Profile') }}</x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fa fa-home fa-lg"></i>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('messages_index')" :active="request()->routeIs('messages')">
                <i class="fa fa-comments fa-lg"></i>
                {{ __('Messages') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('messages_index')" :active="request()->routeIs('messages')">
                <i class="fa fa-bell fa-lg"></i>
                {{ __('Notifications') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="p-2">
            <div class="flex items-center justify-between px-2">
                <a class="flex items-center" href="#">
                    <div class="flex-shrink-0">
                        <div class="relative bg-gray-200 rounded-full max-w-min">
                            <i class="fa fa-user-alt p-2 fa-xs"></i>
                        </div>
                    </div>

                    <div class="ml-3">
                        <div class="flex">
                            <div class="font-medium text-base text-white">{{ Auth::user()->first_name }}</div>
                            <div class="font-medium text-base text-white pl-2">{{ Auth::user()->last_name }}</div>
                        </div>
                        <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
                    </div>
                </a>

                <div class="mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button href="route('logout')" class="py-1 px-4 text-sm mb-4 ml-4 bg-theme-salmon text-white rounded" onclick="event.preventDefault();this.closest('form').submit();">
                            {{ __('Log out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap text-xs text-gray-400 p-4 pb-4">
            <a href="/about" class="hover:text-theme-salmon">About us</a>
            <span class="mx-2 font-bold">.</span>
            <a href="/careers" class="hover:text-theme-salmon">Careers</a>
            <span class="mx-2 font-bold">.</span>
            <a href="/terms" class="hover:text-theme-salmon">Terms of use</a>
            <span class="mx-2 font-bold">.</span>
            <a href="/privacy-policy" class="hover:text-theme-salmon">Privacy policy</a>
            <span class="mx-2 font-bold">.</span>
            <a href="/blog" class="hover:text-theme-salmon">Blog</a>
        </div>
    </div>
</nav>