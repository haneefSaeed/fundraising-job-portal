<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-black px-4">

    <div class="w-full max-w-xs bg-neutral-900 border border-neutral-800 rounded-xl p-5 shadow-lg">

        <!-- Errors -->
        <x-auth-validation-errors class="mb-3 text-red-400 text-sm" :errors="$errors" />

        <form method="POST" action="{{ route('admin.adminlogin') }}" class="space-y-3">
            @csrf

            <!-- Email -->
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Email"
                   required autofocus
                   class="w-full px-3 py-2 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-white" />

            <!-- Password -->
            <input type="password"
                   name="password"
                   placeholder="Password"
                   required
                   class="w-full px-3 py-2 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-white" />

            <!-- Submit -->
            <button type="submit"
                    class="w-full bg-white text-black py-2 rounded-md text-sm font-medium hover:bg-gray-200 transition">
                Login
            </button>

        </form>

    </div>

</div>

</x-guest-layout>