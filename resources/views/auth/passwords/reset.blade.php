@extends('layouts.auth')

@section('content')
<div class="w-96">
    <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
        Reset Password
    </h2>
</div>

<div class="mt-8">
    @if(session('status'))
        <div class="bg-green-50 text-green-700 p-4 rounded-r-lg border-l-2 border-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" class="space-y-6" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <x-label for="email">E-Mail Address</x-label>
            <x-input id="email" type="email" name="email" :value="$email ?? old('email')" required autocomplete="email" autofocus />
        </div>

        <div>
            <x-label for="password">Password</x-label>
            <x-input id="password" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div>
            <x-label for="password-confirm">Confirm Password</x-label>
            <x-input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"/>
        </div>

        <div class="mt-6">
            <span class="block w-full rounded-md shadow-sm">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    Reset Password
                </button>
            </span>
        </div>
    </form>
</div>
@endsection
