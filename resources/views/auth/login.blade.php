@extends('layouts.auth')

@section('content')
<div class="w-96">
    <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
        Sign in to your account
    </h2>
    <p class="mt-2 text-sm leading-5 text-gray-600 max-w">
        Or
        <a href="{{ route('register') }}"
            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
            sign up now
        </a>
    </p>
</div>

<div class="mt-8">
    <div class="mt-6">
        <form action="{{ route('login') }}" method="POST">
            @csrf()
            <div>
                <x-label for="email">Email address</x-label>
                <x-input id="email" name="email" :value="old('email')" autocomplete="email" autofocus></x-input>
            </div>

            <div class="mt-6">
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" name="password"></x-input>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                    <label for="remember" class="ml-2 block text-sm leading-5 text-gray-900">
                        Remember me
                    </label>
                </div>

                <div class="text-sm leading-5">
                    <a href="{{ route('password.request') }}"
                        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        Forgot your password?
                    </a>
                </div>
            </div>

            <div class="mt-6">
                <span class="block w-full rounded-md shadow-sm">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Sign in
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection
