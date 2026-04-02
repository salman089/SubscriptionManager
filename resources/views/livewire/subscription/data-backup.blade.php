<div class="w-full min-h-screen px-4 py-6 mx-auto sm:py-8 sm:px-6 lg:px-8 max-w-7xl">
    <div class="flex flex-col justify-between gap-6 mb-10 md:flex-row md:items-end">
        <div class="flex-1">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Data <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Vault</span>
            </h2>
            <p class="mt-2 text-sm text-gray-400 sm:text-base">Secure your subscription data or migrate to a new device
                in seconds.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        <div
            class="bg-[#121212] border border-gray-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden group transition-all hover:border-blue-500/30">
            <div class="absolute w-48 h-48 rounded-full pointer-events-none -top-24 -right-24 bg-blue-600/5 blur-3xl">
            </div>

            <div class="relative z-10 flex flex-col items-center text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 mb-6 text-blue-400 transition-transform duration-500 border rounded-2xl bg-blue-500/10 border-blue-500/20 group-hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>

                <h3 class="mb-2 text-2xl font-extrabold tracking-tight text-white">Generate Backup</h3>
                <p class="max-w-xs mb-8 text-sm leading-relaxed text-gray-500">
                    Creates a JSON snapshot of your data. Perfect for <span class="font-bold text-gray-300">Google
                        Drive</span> or manual storage.
                </p>

                <button wire:click="exportData"
                    class="w-full py-4 font-black text-white transition bg-blue-600 shadow-lg hover:bg-blue-500 rounded-xl shadow-blue-600/20 active:scale-95">
                    Download .json File
                </button>
            </div>
        </div>

        <div
            class="bg-[#121212] border border-gray-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden group transition-all hover:border-purple-500/30">
            <div class="absolute w-48 h-48 rounded-full pointer-events-none -top-24 -right-24 bg-purple-600/5 blur-3xl">
            </div>

            <div class="relative z-10 flex flex-col items-center text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 mb-6 text-purple-400 transition-transform duration-500 border rounded-2xl bg-purple-500/10 border-purple-500/20 group-hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                </div>

                <h3 class="mb-2 text-2xl font-extrabold tracking-tight text-white">Restore Library</h3>
                <p class="max-w-xs mb-6 text-sm leading-relaxed text-gray-500">
                    Upload your backup file to instantly merge or overwrite your current subscription lists.
                </p>

                <form wire:submit.prevent="importData" class="w-full">
                    <div class="relative mb-4">
                        <input type="file" wire:model="backupFile" id="backup_upload" accept=".json" class="hidden">
                        <label for="backup_upload"
                            class="flex flex-col items-center justify-center w-full py-4 border-2 border-dashed border-gray-800 rounded-2xl cursor-pointer hover:border-purple-500/40 transition-colors bg-[#1a1a21]/50">
                            <span class="text-[10px] uppercase font-black text-gray-500 tracking-widest">
                                @if ($backupFile)
                                    {{ $backupFile->getClientOriginalName() }}
                                @else
                                    Select Backup File
                                @endif
                            </span>
                        </label>
                    </div>

                    <button type="submit" wire:loading.attr="disabled"
                        class="w-full bg-[#1a1a21] border border-gray-700 hover:bg-gray-800 text-white font-black py-4 rounded-xl transition disabled:opacity-50">
                        <span wire:loading.remove wire:target="importData">Initiate Restore</span>
                        <span wire:loading wire:target="importData" class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 text-purple-500 animate-spin" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4" fill="none"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Restoring...
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-12 text-center">
        <p class="text-gray-600 text-[10px] uppercase font-black tracking-[0.3em]">
            End-to-end Local Processing &bull; No Server Storage
        </p>
    </div>
</div>
