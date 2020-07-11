@extends('layouts.auth')

@section('content')
<div class="w-96">
    <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
        Create your account
    </h2>
    <p class="mt-2 text-sm leading-5 text-gray-600 max-w">
        Or
        <a href="{{ route('login') }}"
            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
            sign in
        </a>
    </p>
</div>

<div class="mt-8">
    <div class="mt-6">
        <form class="space-y-6" method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name">Name</x-label>
                <x-input id="name" name="name" :value="old('name')" autofocus></x-input>
            </div>

            <div>
                <x-label for="email">Email address</x-label>
                <x-input id="email" name="email" :value="old('email')"></x-input>
            </div>

            <div>
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" name="password"></x-input>
            </div>

            <div>
                <x-label for="password-confirm">Confirm Password</x-label>
                <x-input id="password-confirm" type="password" name="password_confirmation"></x-input>
            </div>

            <div>
                <span class="block w-full rounded-md shadow-sm">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Register
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection
