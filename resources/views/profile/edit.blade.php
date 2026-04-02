<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">

        <div class="mb-8">
            <h2 class="font-extrabold text-3xl text-white tracking-tight">
                {{ __('Profile Settings') }}
            </h2>
            <p class="text-gray-400 mt-1">Manage your account details and security.</p>
        </div>

        <div class="space-y-6">
            <div class="p-4 sm:p-8 bg-[#121212] border border-gray-800 shadow-xl sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#121212] border border-gray-800 shadow-xl sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#121212] border border-gray-800 shadow-xl sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
