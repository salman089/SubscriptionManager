<div class="py-4 sm:py-10 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto w-full min-h-screen">

    <div class="flex flex-row items-start justify-between gap-4 mb-8 sm:mb-12">
        <div class="flex-1">
            <h2 class="font-black text-2xl sm:text-5xl text-white tracking-tight leading-tight">
                {{ $subscriptionId ? 'Edit' : 'Add' }} <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Service</span>
            </h2>
            <p class="text-gray-400 mt-1 text-xs sm:text-lg max-w-[200px] sm:max-w-none">
                {{ $subscriptionId ? 'Update settings.' : 'Track new expense.' }}
            </p>
        </div>

        <a href="{{ route('subscriptions.index') }}" wire:navigate
            class="shrink-0 inline-flex items-center px-4 py-2 bg-[#1a1a21] border border-gray-800 rounded-xl text-[10px] sm:text-xs font-bold text-gray-400 hover:text-white hover:border-gray-600 transition group uppercase tracking-widest shadow-lg">
            <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-1 transition-transform text-blue-500"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="hidden sm:inline">Back to List</span>
            <span class="sm:hidden">Back</span>
        </a>
    </div>

    <div
        class="bg-[#121212] border border-gray-800 rounded-[2rem] sm:rounded-[3rem] shadow-2xl p-5 sm:p-12 relative overflow-hidden">

        <div
            class="absolute top-0 right-0 w-24 h-24 sm:w-48 sm:h-48 bg-blue-600/10 rounded-full blur-3xl pointer-events-none">
        </div>

        <form wire:submit.prevent="save" class="space-y-5 sm:space-y-8 relative z-10">

            <div>
                <x-input-label for="name" :value="__('Service Name')" class="ml-1" />
                <x-text-input id="name" type="text" wire:model="name" placeholder="Netflix, Gym, AWS..."
                    class="block mt-1.5 w-full py-4 px-5 text-base" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 ml-1" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Description (Optional)')" class="ml-1" />
                <textarea id="description" wire:model="description" rows="3" placeholder="Shared with family, annual billing..."
                    class="block mt-1.5 w-full bg-[#1a1a21] border-gray-700 text-white rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent py-4 px-5 transition placeholder-gray-600 text-base leading-relaxed"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2 ml-1" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-8">
                <div>
                    <x-input-label for="price" :value="__('Monthly Price')" class="ml-1" />
                    <div class="relative mt-1.5">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                            <span class="text-gray-500 font-black text-lg">£</span>
                        </div>
                        <x-text-input id="price" type="number" step="0.01" min="0" wire:model="price"
                            class="block w-full pl-10 py-4 text-base" placeholder="0.00" />
                    </div>
                    <x-input-error :messages="$errors->get('price')" class="mt-2 ml-1" />
                </div>

                <div>
                    <x-input-label for="date" :value="__('Next Bill Date')" class="ml-1" />
                    <x-text-input id="date" type="date" wire:model="next_renewal_date"
                        class="block mt-1.5 w-full py-4 px-5 text-base [color-scheme:dark]" />
                    <x-input-error :messages="$errors->get('next_renewal_date')" class="mt-2 ml-1" />
                </div>
            </div>

            <div class="pt-4 sm:pt-6 border-t border-gray-800/50 mt-4">
                <x-primary-button class="w-full py-5 relative" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="save" class="flex items-center justify-center gap-2">
                        {{ $subscriptionId ? 'Save Changes' : 'Confirm Subscription' }}
                    </span>

                    <span wire:loading wire:target="save"
                        class="flex items-center justify-center gap-3 whitespace-nowrap">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span>Processing...</span>
                    </span>
                </x-primary-button>
            </div>
        </form>
    </div>

    <div class="h-20 md:hidden"></div>
</div>
