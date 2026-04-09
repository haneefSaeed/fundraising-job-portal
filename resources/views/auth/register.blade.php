@extends('layouts.app')
@section('content')

<section class="min-h-screen flex items-center justify-center bg-gray-100 py-12">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 md:p-12">
        {{-- Header --}}
        <div class="text-center mb-8">
            <!-- Optional Logo -->
            <!-- <img src="{{ asset('images/logo.png') }}" alt="logo" class="h-7 w-auto mx-auto mb-4"> -->
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Register</h1>
            <h5 class="text-gray-600 mb-2">Start your journey with us</h5>
            <p class="text-gray-500 text-sm">
                Already registered?
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login Here</a>
            </p>
        </div>

        {{-- Validation Errors --}}
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" class="text-gray-700 font-semibold" />
                <x-input id="name" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Username -->
            <div>
                <x-label for="username" :value="__('Username')" class="text-gray-700 font-semibold" />
                <x-input id="username" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    type="text" name="username" :value="old('username')" required />
            </div>

            <!-- Email -->
            <div>
                <x-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                <x-input id="email" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                <x-input id="password" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold" />
                <x-input id="password_confirmation" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    type="password" name="password_confirmation" required />
            </div>

            <div>
                <x-button class="w-full justify-center bg-black hover:bg-gray-700 text-white font-semibold py-3 rounded-lg shadow-md">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        {{-- Optional Social Login / Divider --}}
        {{-- <div class="mt-6 text-center text-gray-400">or register with</div> --}}
    </div>
</section>

@endsection