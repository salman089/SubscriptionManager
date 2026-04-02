<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white">Welcome back</h2>
        <p class="text-gray-400 text-sm mt-1">Please enter your details to sign in.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <div class="flex justify-between items-center">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition" href="{{ route('password.request') }}">
                        {{ __('Forgot?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded-md bg-[#1a1a21] border-gray-700 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-offset-[#121212] transition cursor-pointer" name="remember">
                <span class="ms-2 text-sm text-gray-400 group-hover:text-gray-200 transition">{{ __('Keep me logged in') }}</span>
            </label>
        </div>

        <div class="mt-8">
            <x-primary-button class="w-full py-4 text-base">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <p class="mt-6 text-center text-sm text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-white font-bold hover:underline decoration-blue-500 underline-offset-4 transition">Sign up free</a>
            </p>
        @endif
    </form>
</x-guest-layout>
