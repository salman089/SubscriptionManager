<div
    x-data="{
        show: false,
        message: '',
        type: 'success'
    }"
    x-on:notify.window="
        show = true;
        message = $event.detail.message;
        type = $event.detail.type || 'success';
        setTimeout(() => show = false, 3000)
    "
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:translate-x-4"
    x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed bottom-5 right-5 z-[300] w-full max-w-[320px] px-4 sm:px-0"
    style="display: none;"
>
    <div
        :class="{
            'bg-blue-600 border-blue-400/30': type === 'success',
            'bg-red-600 border-red-400/30': type === 'error'
        }"
        class="flex items-center gap-3 p-4 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.4)] border text-white"
    >
        <template x-if="type === 'success'">
            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </template>

        <template x-if="type === 'error'">
            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </template>

        <div class="flex-1">
            <p class="font-black text-sm uppercase tracking-widest" x-text="type"></p>
            <p class="text-xs font-bold opacity-90" x-text="message"></p>
        </div>

        <button @click="show = false" class="opacity-50 hover:opacity-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
</div>
