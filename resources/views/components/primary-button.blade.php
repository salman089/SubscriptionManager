<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:from-blue-500 hover:to-purple-500 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-[#0a0a0a] transition ease-in-out duration-150 shadow-[0_0_20px_rgba(37,99,235,0.3)]']) }}>
    {{ $slot }}
</button>
