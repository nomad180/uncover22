<x-layout>
    <x-app-layout>
        <div>
            <div class="px-4 py-4 md:mx-40">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center my-4">
                        {{ __('Account Settings') }}
                    </h2>
                </x-slot>
                <div class="mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="mx-auto px-4 sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10 pt-6">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="mx-auto px-4 sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10  pt-6">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="mx-auto px-4 sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10 pt-6">
                        <div class="max-w-xl">
                            @include('profile.partials.user-invoices')
                        </div>
                    </div>

                    <div class="mx-auto px-4 sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10  pt-6">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</x-layout>
