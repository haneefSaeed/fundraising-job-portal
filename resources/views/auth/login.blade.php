@extends('layouts.app')
@section('content')

<section class="min-h-screen flex items-center justify-center bg-gray-100 py-12">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 md:p-12">
        {{-- Header --}}
        <div class="text-center mb-8">
           <!-- <img src="{{ asset('images/logo.png') }}" alt="logo" class="h-7 w-auto mx-auto mb-4"> -->
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Login</h1>
            <h5 class="text-gray-600 mb-2">First step to use our system</h5>
            <p class="text-gray-500 text-sm">
                If you haven't registered yet, click
                <a href="{{ url('/register') }}" class="text-blue-600 font-semibold hover:underline">Here</a> to Register
            </p>
        </div>

        {{-- Session Status --}}
        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- Validation Errors --}}
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                <x-input id="email" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                <x-input id="password" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>

            <div>
                <x-button class="w-full  justify-center bg-black hover:bg-gray-700 text-white font-semibold py-3 rounded-lg shadow-md ">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        {{-- Optional Social Login / Divider --}}
        {{-- <div class="mt-6 text-center text-gray-400">or login with</div> --}}
    </div>
</section>

@endsection