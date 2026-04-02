<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white tracking-tight">Verify Email</h2>
        <p class="mt-2 text-sm text-gray-400 leading-relaxed">
            Thanks for signing up! Please verify your email by clicking the link we just sent to you. If you didn't receive it, we'll gladly send another.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-400 p-4 bg-green-500/10 border border-green-500/20 rounded-xl">
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="mt-8 flex flex-col gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full">
                {{ __('Resend Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-center text-sm font-semibold text-gray-400 hover:text-white py-2 transition">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
