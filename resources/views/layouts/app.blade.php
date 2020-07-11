@extends('layouts.base')

@section('body')
<div class="bg-gray-800 pb-32">
    <nav x-data="{ open: false }" class="z-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 border-b border-gray-700">
                <div class="flex">
                    <div class="-ml-2 mr-2 flex items-center md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="open = !open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                            x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" aria-label="Main menu"
                            x-bind:aria-expanded="open">
                            <!-- Icon when menu is closed. -->
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <!-- Icon when menu is open. -->
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-white font-bold uppercase">Laravel Challenge</span>
                    </div>

                    <div class="hidden md:ml-6 md:flex md:items-center">
                        <a href="{{ route('products.index') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                            Products
                        </a>
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                        @if(user())
                        <button
                            class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-300 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out"
                            aria-label="Notifications">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open"
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true"
                                    x-bind:aria-expanded="open">
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://www.gravatar.com/avatar/c542235c901d0c8d3a7fe9d82b4b64c3?s=200"
                                        alt="">
                                </button>
                            </div>
                            <div x-show="open"
                                x-description="Profile dropdown panel, show/hide based on dropdown state."
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-10"
                                style="display: none;">
                                <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                                    aria-labelledby="user-menu">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                        role="menuitem">Your Profile</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                        role="menuitem">Settings</a>
                                    <a @click.prevent="$refs.form.submit()"
                                        class="block px-4 py-2 cursor-pointer text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                        role="menuitem">Sign out</a>

                                    <form x-ref="form" class="hidden" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                        @else
                        <div class="space-x-1 flex items-center">
                            <a class="text-white bg-opacity-0 bg-gray-600 hover:bg-opacity-25 transition-all duration-150 px-4 py-2 rounded-lg"
                                href="{{ route('login') }}">
                                Sign in
                            </a>

                            <a class="text-white bg-opacity-0 bg-gray-600 hover:bg-opacity-25 transition-all duration-150 px-4 py-2 rounded-lg"
                                href="{{ route('register') }}">
                                Sign up
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Menu open"
            x-state:off="Menu closed" :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <a href="{{ route('products.index') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                    Products
                </a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5 sm:px-6">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="https://www.gravatar.com/avatar/c542235c901d0c8d3a7fe9d82b4b64c3?s=200" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-6 text-white">Marco Avila</div>
                        <div class="text-sm font-medium leading-5 text-gray-400">@marcot89</div>
                    </div>
                </div>
                <div class="mt-3 px-2 sm:px-3">
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Your
                        Profile</a>
                    <a href="#"
                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Settings</a>
                    <a href="#"
                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Sign
                        out</a>
                </div>
            </div>
        </div>
    </nav>

    @if(isset($pageTitle))
    <header class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                @if($withBackButton ?? false || isset($backTo))
                <a href="{{ $backTo ?? url()->previous() }}"
                    class="h-6 w-6 mr-4 text-white cursor-pointer opacity-50 hover:opacity-100 transition-opacity duration-200">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                @endif

                <h1 class="text-3xl leading-9 font-bold text-white mr-4">
                    {{ $pageTitle }}
                </h1>

                @yield('actions')
            </div>

            <x-notification />
        </div>
    </header>
    @endif
</div>

<main class="max-w-7xl mx-auto pb-12 sm:px-6 lg:px-8 -mt-32">
    @yield('content')
</main>
@endsection
