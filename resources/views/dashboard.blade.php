<x-app-layout>
    <div class="py-6 sm:py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full min-h-screen">

        <div class="mb-10 sm:mb-12">
            <h2 class="font-extrabold text-3xl sm:text-4xl text-white tracking-tight leading-tight">
                Welcome back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">{{ explode(' ', Auth::user()->name)[0] }}</span> 👋
            </h2>
            <p class="text-gray-400 mt-2 text-sm sm:text-lg max-w-2xl">
                Here is a high-level look at your financial health and upcoming subscription renewals.
            </p>
        </div>

        <div class="relative">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

            <livewire:subscription.dashboard-overview />
        </div>

        <div class="mt-12 flex justify-center">
            <a href="{{ route('subscriptions.index') }}"
               wire:navigate
               class="group relative inline-flex items-center justify-center w-full sm:w-auto px-10 py-4 bg-[#121212] border border-gray-800 rounded-2xl font-bold text-gray-300 hover:text-white hover:border-gray-600 hover:bg-[#1a1a21] shadow-2xl transition-all duration-300 active:scale-95">

                <div class="absolute inset-0 rounded-2xl bg-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <svg class="w-5 h-5 mr-3 text-blue-500 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>

                <span class="relative">Detailed Subscriptions List</span>

                <svg class="ml-2 w-4 h-4 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

    </div>
</x-app-layout>
