<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-transparent border border-gray-700 rounded-xl font-bold text-xs text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-[#0a0a0a] disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
