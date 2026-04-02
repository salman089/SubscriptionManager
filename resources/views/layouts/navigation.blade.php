<nav x-data="{ open: false }" class="z-50">
    <div
        class="md:hidden fixed top-0 left-0 right-0 h-16 bg-[#121212]/80 backdrop-blur-md border-b border-gray-800 px-4 flex items-center justify-between z-50">
        <a href="{{ route('dashboard') }}" class="text-xl font-extrabold tracking-tight text-white">
            Sub<span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Mgr.</span>
        </a>

        <button @click="open = ! open" class="p-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 md:hidden">
    </div>

    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 w-64 bg-[#121212] border-r border-gray-800 transform md:translate-x-0 transition-transform duration-300 ease-in-out z-50 flex flex-col">

        <div class="h-20 flex items-center px-6 border-b border-gray-800/50">
            <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold tracking-tight text-white group">
                Sub<span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 transition-all group-hover:from-blue-300 group-hover:to-purple-400">Manager.</span>
            </a>
        </div>

        <div class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

            <a href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-3 rounded-xl font-semibold transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20' : 'text-gray-400 hover:text-gray-100 hover:bg-[#1a1a21]' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-500 group-hover:text-gray-300' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Overview
            </a>

            <a href="{{ route('subscriptions.index') }}"
                class="flex items-center px-4 py-3 rounded-xl font-semibold transition-all duration-200 group {{ request()->routeIs('subscriptions.*') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20' : 'text-gray-400 hover:text-gray-100 hover:bg-[#1a1a21]' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('subscriptions.*') ? 'text-blue-500' : 'text-gray-500 group-hover:text-gray-300' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                Subscriptions
            </a>

        </div>

        <div class="p-4 border-t border-gray-800/50 bg-[#0f0f13]/30">

            <a href="{{ route('backup') }}"
                class="flex items-center px-4 py-3 rounded-xl font-semibold transition-all duration-200 group mb-2 {{ request()->routeIs('backup') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20' : 'text-gray-400 hover:text-gray-100 hover:bg-[#1a1a21]' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('backup') ? 'text-blue-500' : 'text-gray-500 group-hover:text-gray-300' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Backup
            </a>

            <a href="{{ route('profile.edit') }}"
                class="flex items-center px-4 py-3 rounded-xl font-semibold transition-all duration-200 group mb-2 {{ request()->routeIs('profile.edit') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20' : 'text-gray-400 hover:text-gray-100 hover:bg-[#1a1a21]' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('profile.edit') ? 'text-blue-500' : 'text-gray-500 group-hover:text-gray-300' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Settings
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-4 py-3 text-sm font-bold text-red-400/80 rounded-xl hover:text-red-400 hover:bg-red-500/10 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Log Out
                </button>
            </form>
        </div>
    </aside>
</nav>
