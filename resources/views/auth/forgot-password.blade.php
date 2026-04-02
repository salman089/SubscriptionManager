<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white tracking-tight">Reset Password</h2>
        <p class="mt-2 text-sm text-gray-400 leading-relaxed">
            Forgot your password? No problem. Enter your email and we'll send you a link to choose a new one.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-8">
            <x-primary-button class="w-full">
                {{ __('Email Reset Link') }}
            </x-primary-button>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-400 hover:text-white transition">
                &larr; Back to login
            </a>
        </div>
    </form>
</x-guest-layout>
