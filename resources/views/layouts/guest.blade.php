<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Subscription Manager') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#0a0a0a] text-gray-200 selection:bg-blue-500 selection:text-white">
        <div class="min-h-screen flex flex-col justify-center items-center p-4 sm:pt-0 relative overflow-hidden">

            <div class="absolute top-[-5%] left-[-10%] w-72 h-72 sm:w-96 sm:h-96 bg-blue-600 rounded-full mix-blend-screen filter blur-[80px] sm:blur-[120px] opacity-20 pointer-events-none"></div>
            <div class="absolute bottom-[-5%] right-[-10%] w-72 h-72 sm:w-96 sm:h-96 bg-purple-600 rounded-full mix-blend-screen filter blur-[80px] sm:blur-[120px] opacity-20 pointer-events-none"></div>

            <div class="relative z-10 mb-6 sm:mb-8 text-center">
                <a href="/" class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white transition hover:opacity-80">
                    Sub<span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Manager.</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-6 py-8 sm:px-8 bg-[#121212] border border-gray-800 shadow-2xl overflow-hidden rounded-2xl sm:rounded-3xl relative z-10">
                {{ $slot }}
            </div>

            <div class="relative z-10 mt-8 text-center">
                <p class="text-xs text-gray-500 uppercase tracking-widest font-semibold">
                    &copy; {{ date('Y') }} Subscription Manager. All rights reserved.
                </p>
            </div>

        </div>
    </body>
</html>
