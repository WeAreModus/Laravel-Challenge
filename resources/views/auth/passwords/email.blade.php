@extends('layouts.auth')

@section('content')
<div class="w-96">
    <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
        Reset Password
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
    @if(session('status'))
        <div class="bg-green-50 text-green-700 p-4 rounded-r-lg border-l-2 border-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="mt-6">
        @csrf

        <x-label for="email">{{ __('E-Mail Address') }}</x-label>
        <x-input id="email" name="email" type="email" required autocomplete="email"></x-input>

        <div class="mt-6">
            <span class="block w-full rounded-md shadow-sm">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    Send Password Reset Link
                </button>
            </span>
        </div>
    </form>
</div>
@endsection
