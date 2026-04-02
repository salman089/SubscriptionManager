<div class="py-6 sm:py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full min-h-screen">
    <div class="flex flex-col xl:flex-row xl:items-end justify-between gap-6 mb-10">
        <div class="flex-1">
            <h2 class="font-extrabold text-3xl sm:text-4xl text-white tracking-tight">
                My <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Subscriptions</span>
            </h2>
            <p class="text-gray-400 mt-2 text-sm sm:text-base">Track, manage, and optimize your recurring expenses.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 w-full xl:w-auto items-end">
            <div class="md:col-span-1">
                <label
                    class="block text-[10px] uppercase font-black text-gray-500 tracking-widest mb-1.5 ml-1">Search</label>
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Service name..."
                    class="w-full bg-[#1a1a21] border-gray-700 text-white rounded-xl py-2.5 px-4 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
            </div>

            <div>
                <label
                    class="block text-[10px] uppercase font-black text-gray-500 tracking-widest mb-1.5 ml-1">From</label>
                <input type="date" wire:model.live="startDate"
                    class="w-full bg-[#1a1a21] border-gray-700 text-white rounded-xl py-2.5 px-4 focus:ring-blue-500 [color-scheme:dark] text-sm">
            </div>

            <div>
                <label
                    class="block text-[10px] uppercase font-black text-gray-500 tracking-widest mb-1.5 ml-1">To</label>
                <input type="date" wire:model.live="endDate"
                    class="w-full bg-[#1a1a21] border-gray-700 text-white rounded-xl py-2.5 px-4 focus:ring-blue-500 [color-scheme:dark] text-sm">
            </div>

            <a href="{{ route('subscriptions.create') }}" wire:navigate
                class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2.5 px-6 rounded-xl shadow-lg transition text-center h-[42px] flex items-center justify-center">
                + Add New
            </a>
        </div>
    </div>

    @if ($subscriptions->isNotEmpty())
        <div class="hidden md:block bg-[#121212] rounded-3xl shadow-2xl border border-gray-800 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#1a1a21]/50 border-b border-gray-800">
                        <th class="p-6 font-bold text-gray-400 text-xs uppercase tracking-widest">Service</th>
                        <th class="p-6 font-bold text-gray-400 text-xs uppercase tracking-widest text-center">Price</th>
                        <th class="p-6 font-bold text-gray-400 text-xs uppercase tracking-widest">Next Bill</th>
                        <th class="p-6 font-bold text-gray-400 text-xs uppercase tracking-widest text-right">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @foreach ($subscriptions as $sub)
                        <tr wire:key="desktop-{{ $sub->id }}"
                            class="hover:bg-[#1a1a21]/80 transition-colors group">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold border border-blue-500/20 uppercase text-xs">
                                        {{ substr($sub->name, 0, 1) }}
                                    </div>
                                    <span
                                        class="font-bold text-gray-100 text-lg group-hover:text-blue-400 transition">{{ $sub->name }}</span>
                                </div>
                            </td>
                            <td class="p-6 text-center font-mono font-bold text-white text-lg">
                                £{{ number_format($sub->price, 2) }}</td>
                            <td class="p-6">
                                <span
                                    class="px-3 py-1 rounded-lg text-sm font-bold {{ \Carbon\Carbon::parse($sub->next_renewal_date)->isPast() ? 'bg-red-500/10 text-red-400 border border-red-500/20' : 'bg-gray-800 text-gray-300' }}">
                                    {{ \Carbon\Carbon::parse($sub->next_renewal_date)->format('d M Y') }}
                                </span>
                            </td>
                            <td class="p-6 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('subscriptions.edit', $sub->id) }}" wire:navigate
                                    class="px-3 py-2 text-gray-400 hover:text-white font-bold transition">Edit</a>

                                <button wire:click="markAsPaid({{ $sub->id }})" wire:loading.attr="disabled"
                                    wire:target="markAsPaid({{ $sub->id }})"
                                    class="relative px-4 py-2 text-green-400 hover:text-white hover:bg-green-500 font-bold border border-green-500/30 rounded-xl transition disabled:opacity-50">
                                    <span wire:loading.remove wire:target="markAsPaid({{ $sub->id }})">Paid</span>
                                    <span wire:loading wire:target="markAsPaid({{ $sub->id }})">
                                        <svg class="animate-spin h-4 w-4 mx-auto" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4" fill="none"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>

                                <button wire:click="confirmCancel({{ $sub->id }})"
                                    class="px-4 py-2 text-gray-500 hover:text-red-400 hover:bg-red-500/10 font-bold rounded-xl transition">Cancel</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-4">
            @foreach ($subscriptions as $sub)
                <div wire:key="mobile-{{ $sub->id }}"
                    class="bg-[#121212] border border-gray-800 rounded-3xl p-6 shadow-xl relative overflow-hidden group">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-12 h-12 rounded-2xl bg-[#1a1a21] border border-gray-800 flex items-center justify-center text-blue-500 font-black text-xl uppercase">
                                {{ substr($sub->name, 0, 1) }}</div>
                            <div>
                                <h3 class="text-white font-extrabold text-xl leading-tight">{{ $sub->name }}</h3>
                                <p class="text-gray-500 text-xs uppercase tracking-widest font-bold mt-1">Next Bill:
                                    <span
                                        class="{{ \Carbon\Carbon::parse($sub->next_renewal_date)->isPast() ? 'text-red-400' : 'text-gray-300' }}">{{ \Carbon\Carbon::parse($sub->next_renewal_date)->format('d M') }}</span>
                                </p>
                            </div>
                        </div>
                        <p class="text-white font-mono font-black text-xl">£{{ number_format($sub->price, 2) }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('subscriptions.edit', $sub->id) }}" wire:navigate
                            class="bg-[#1a1a21] border border-gray-700 text-gray-300 font-bold py-2.5 px-4 rounded-xl flex-1 text-center text-sm">Edit</a>
                        <button wire:click="markAsPaid({{ $sub->id }})" wire:loading.attr="disabled"
                            wire:target="markAsPaid({{ $sub->id }})"
                            class="flex-1 bg-green-500/10 border border-green-500/30 text-green-400 font-black py-2.5 rounded-xl transition text-sm">
                            <span wire:loading.remove wire:target="markAsPaid({{ $sub->id }})">Paid</span>
                            <span wire:loading wire:target="markAsPaid({{ $sub->id }})">...</span>
                        </button>
                        <button wire:click="confirmCancel({{ $sub->id }})"
                            class="bg-red-500/10 border border-red-500/20 text-red-400 font-bold py-2.5 px-3 rounded-xl transition">
                            <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div
            class="p-16 mt-10 text-center flex flex-col items-center bg-[#121212] rounded-[2rem] border-2 border-dashed border-gray-800">
            <div
                class="w-20 h-20 bg-[#1a1a21] rounded-full flex items-center justify-center mb-6 border border-gray-800">
                <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>
            <p class="text-white text-xl font-bold">
                {{ $search || $startDate || $endDate ? 'No matches found' : 'Your list is clear' }}</p>
            <p class="text-gray-500 mt-2 max-w-xs">Adjust your search or add your first monthly subscription.</p>
        </div>
    @endif

    <div class="mt-8">
        {{ $subscriptions->links() }}
    </div>

    @if ($cancelId)
        <div x-data="{ show: @entangle('cancelId') }" x-show="show" x-on:keydown.escape.window="show = false; $wire.closeModal()"
            class="fixed inset-0 z-[200] flex items-center justify-center px-4" style="display: none;">
            <div x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/60 backdrop-blur-xl"
                wire:click="closeModal"></div>
            <div x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-4"
                class="bg-[#121212] border border-white/5 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.5)] p-8 sm:p-10 w-full max-w-md relative z-10 overflow-hidden">
                <div
                    class="absolute -top-24 -left-24 w-48 h-48 bg-red-600/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <div class="relative mb-8 text-center">
                    <div
                        class="w-16 h-16 bg-red-500/10 border border-red-500/20 rounded-2xl flex items-center justify-center mx-auto mb-6 text-red-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-white tracking-tight">Wait, stop!</h3>
                    <p class="text-gray-400 mt-2 leading-relaxed">You are about to remove <span
                            class="text-white font-bold">{{ $cancelName }}</span>. To confirm, please type the name
                        exactly.</p>
                </div>
                <div class="space-y-4">
                    <input type="text" wire:model="confirmNameInput" wire:keydown.enter="executeCancel"
                        placeholder="Type name here..."
                        class="w-full bg-white/5 border border-white/10 text-white rounded-2xl py-4 px-6 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all placeholder-gray-600 text-lg text-center">
                    @error('confirmNameInput')
                        <span
                            class="text-red-400 text-xs font-bold uppercase tracking-widest block text-center animate-pulse">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-3 mt-10">
                    <button wire:click="executeCancel"
                        class="w-full bg-red-600 hover:bg-red-500 text-white rounded-2xl py-4 font-black shadow-[0_0_20px_rgba(220,38,38,0.3)] transition-all active:scale-95 uppercase tracking-widest text-sm">Confirm
                        Delete</button>
                    <button wire:click="closeModal"
                        class="w-full text-gray-500 hover:text-white font-bold py-2 transition-colors">Actually, keep
                        it</button>
                </div>
            </div>
        </div>
    @endif
</div>
