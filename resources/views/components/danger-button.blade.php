<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-red-600/10 border border-red-500/20 rounded-xl font-bold text-xs text-red-500 uppercase tracking-widest hover:bg-red-600 hover:text-white active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-[#0a0a0a] transition ease-in-out duration-150 shadow-[0_0_15px_rgba(220,38,38,0.1)]']) }}>
    {{ $slot }}
</button>
