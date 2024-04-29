@extends('layouts.app')
@section('content')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="content">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="font-size: 22pt; font-family: 'Barlow',serif">AD Register now!</h1>
                </div>

                <div class="col-lg-12">
                    <h5 style="font-size: 14pt; font-family: 'Barlow',serif">People need your help...</h5>
                </div>
                <div class="col-lg-12 mt-3">
                    <p style="font-size: 10pt; font-family: 'Barlow',serif">If you haven't registerd yet, click <a style="font-weight: 600" href="{{url('/register')}}">Here </a> to Register</h5>
                </div>
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

                <!-- Username -->
                <div class="mt-4">
                    <x-label for="username" :value="__('Username')" />

                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
                </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection
