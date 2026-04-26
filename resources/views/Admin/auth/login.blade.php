<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">

        <!-- Header -->
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-semibold text-gray-800">
                Admin Login
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                People need your help...
            </p>
            <p class="text-xs text-gray-400 mt-2">
                Don’t have an account?
                <a href="{{url('/register')}}" class="font-semibold text-indigo-600 hover:underline">
                    Register here
                </a>
            </p>
        </div>

        <!-- Status -->
        <x-auth-session-status class="mb-4 text-green-600" :status="session('status')" />

        <!-- Errors -->
        <x-auth-validation-errors class="mb-4 text-red-500" :errors="$errors" />

        <!-- Form -->
        <form method="POST" action="{{ route('admin.adminlogin') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <x-label for="email" :value="__('Email')" class="text-sm text-gray-700" />
                <x-input id="email"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                         type="email"
                         name="email"
                         :value="old('email')"
                         required autofocus />
            </div>

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" class="text-sm text-gray-700" />
                <x-input id="password"
                         class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                         type="password"
                         name="password"
                         required />
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox"
                           name="remember"
                           class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-gray-600">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-indigo-600 hover:underline">
                        Forgot?
                    </a>
                @endif
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition">
                    Log in
                </button>
            </div>

        </form>

    </div>

</div>

</x-guest-layout>