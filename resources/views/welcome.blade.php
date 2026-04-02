<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Subscription Manager</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="bg-[#0a0a0a] text-gray-200 flex p-4 sm:p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col font-sans selection:bg-blue-500 selection:text-white">

        <header class="w-full lg:max-w-5xl max-w-md text-sm mb-6 lg:mb-12">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-3 sm:gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-4 py-2 border border-gray-700 hover:border-blue-500 hover:text-white text-gray-300 rounded-md font-semibold transition text-xs sm:text-sm">
                            Dashboard &rarr;
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-3 py-2 text-gray-400 hover:text-white font-medium transition text-xs sm:text-sm">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow-[0_0_15px_rgba(37,99,235,0.4)] transition text-xs sm:text-sm">
                                Get Started
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <div class="flex items-center justify-center w-full lg:grow">
            <main class="flex max-w-md w-full flex-col lg:max-w-5xl lg:flex-row shadow-2xl rounded-2xl overflow-hidden border border-gray-800 bg-[#121212]">

                <div class="flex-1 p-8 lg:p-14 flex flex-col justify-center relative z-10 order-2 lg:order-1">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 sm:mb-6 tracking-tight leading-tight">
                        Take Control of Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Subscriptions.</span>
                    </h1>
                    <p class="mb-8 sm:mb-10 text-gray-400 text-base sm:text-lg leading-relaxed">
                        Stop paying for things you don't use. See exactly where your money is going and never be surprised by a renewal charge again.
                    </p>

                    <ul class="flex flex-col mb-8 sm:mb-10 space-y-4 sm:space-y-5">
                        <li class="flex items-center gap-3 sm:gap-4">
                            <div class="flex-shrink-0 w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-blue-500/20 flex items-center justify-center">
                                <span class="text-blue-400 font-bold text-xs sm:text-sm">✓</span>
                            </div>
                            <span class="text-gray-300 font-medium text-sm sm:text-base lg:text-lg">Track monthly spending instantly</span>
                        </li>
                        <li class="flex items-center gap-3 sm:gap-4">
                            <div class="flex-shrink-0 w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-blue-500/20 flex items-center justify-center">
                                <span class="text-blue-400 font-bold text-xs sm:text-sm">✓</span>
                            </div>
                            <span class="text-gray-300 font-medium text-sm sm:text-base lg:text-lg">Know when your next bill is due</span>
                        </li>
                        <li class="flex items-center gap-3 sm:gap-4">
                            <div class="flex-shrink-0 w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-blue-500/20 flex items-center justify-center">
                                <span class="text-blue-400 font-bold text-xs sm:text-sm">✓</span>
                            </div>
                            <span class="text-gray-300 font-medium text-sm sm:text-base lg:text-lg">Get reminders before you get charged</span>
                        </li>
                    </ul>

                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block w-full sm:w-auto text-center bg-white text-black hover:bg-gray-200 font-bold py-3 sm:py-3.5 px-8 rounded-lg shadow-md transition text-base sm:text-lg">
                                Open Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-block w-full sm:w-auto text-center bg-white text-black hover:bg-gray-200 font-bold py-3 sm:py-3.5 px-8 rounded-lg shadow-md transition text-base sm:text-lg">
                                Start Tracking Now
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="bg-[#0f0f13] relative w-full lg:w-[450px] shrink-0 overflow-hidden flex flex-col justify-center p-6 sm:p-8 lg:p-12 border-b lg:border-b-0 lg:border-l border-gray-800 order-1 lg:order-2">

                    <div class="absolute top-5 right-5 w-32 h-32 bg-blue-600 rounded-full mix-blend-screen filter blur-[60px] opacity-30"></div>
                    <div class="absolute bottom-5 left-5 w-32 h-32 bg-purple-600 rounded-full mix-blend-screen filter blur-[60px] opacity-20"></div>

                    <div class="relative bg-[#1a1a21]/80 border border-gray-700/50 rounded-2xl p-5 sm:p-7 shadow-2xl backdrop-blur-xl">
                        <div class="text-gray-400 text-[10px] sm:text-xs font-semibold uppercase tracking-wider mb-1">Monthly Spend</div>
                        <div class="text-3xl sm:text-5xl font-extrabold mb-6 sm:mb-8 text-white">£124<span class="text-xl sm:text-2xl text-gray-500">.99</span></div>

                        <div class="space-y-3 sm:space-y-4">
                            <div class="bg-[#24242d] rounded-xl p-3 sm:p-4 flex justify-between items-center border border-gray-700/30">
                                <div class="flex items-center gap-3 sm:gap-4">
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-black flex items-center justify-center">
                                        <svg viewBox="0 0 100 100" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 82.5V17.5L79 82.5V17.5" stroke="#E50914" stroke-width="16" stroke-linecap="square"/>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-100 text-sm sm:text-lg leading-tight">Netflix</span>
                                    </div>
                                </div>
                                <span class="text-gray-200 font-bold text-sm sm:text-lg">£15.99</span>
                            </div>

                            <div class="bg-[#24242d] rounded-xl p-3 sm:p-4 flex justify-between items-center border border-gray-700/30">
                                <div class="flex items-center gap-3 sm:gap-4">
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-indigo-500/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                            <path d="M14.6 9.4l-4.2 4.2M6 18l-2.4 2.4M18 6l2.4 -2.4M16 11l-3 -3M13 14l3 3M8 8l3 3M11 11l-3 -3M13 5l2 2-2 2M19 11l-2-2 2-2M11 19l-2-2 2-2M5 13l2 2-2 2" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col text-sm sm:text-lg">
                                        <span class="font-bold text-gray-100 leading-tight">Gym</span>
                                    </div>
                                </div>
                                <span class="text-gray-200 font-bold text-sm sm:text-lg">£45.00</span>
                            </div>

                            <div class="bg-[#24242d] rounded-xl p-3 sm:p-4 flex justify-between items-center border border-gray-700/30">
                                <div class="flex items-center gap-3 sm:gap-4">
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-[#1DB954]/10 flex items-center justify-center text-[#1DB954]">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 0C5.4 0 0 5.4 0 12C0 18.6 5.4 24 12 24C18.6 24 24 18.6 24 12C24 5.4 18.6 0 12 0ZM17.4 17.3C17.2 17.6 16.7 17.7 16.4 17.5C13.6 15.8 10.1 15.4 5.9 16.4C5.5 16.5 5.2 16.2 5.1 15.9C5 15.5 5.3 15.2 5.6 15.1C10.2 14 14.1 14.5 17.2 16.4C17.5 16.6 17.6 17 17.4 17.3ZM18.9 14C18.6 14.4 18.1 14.6 17.7 14.3C14.5 12.3 9.6 11.7 5.7 12.9C5.2 13 4.7 12.8 4.6 12.3C4.5 11.8 4.7 11.3 5.2 11.2C9.7 9.8 15.1 10.5 18.7 12.7C19.1 13 19.2 13.5 18.9 14ZM19 10.6C15.1 8.3 8.8 8.1 5.1 9.2C4.5 9.4 3.9 9 3.7 8.4C3.5 7.8 3.9 7.2 4.5 7C8.7 5.7 15.7 6 20.1 8.6C20.6 8.9 20.8 9.6 20.5 10.2C20.2 10.7 19.5 10.9 19 10.6Z"/>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col text-sm sm:text-lg">
                                        <span class="font-bold text-gray-100 leading-tight">Spotify</span>
                                    </div>
                                </div>
                                <span class="text-gray-200 font-bold text-sm sm:text-lg">£10.99</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div class="h-8 lg:h-14 hidden lg:block"></div>
    </body>
</html>
