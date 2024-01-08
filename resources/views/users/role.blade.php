<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div x-data="{ openModal: false }">
                <x-button-basic @click="openModal = true" color="primary">
                    Tambah Role
                </x-button-basic>

                <div x-show="openModal" x-cloak @click.away="openModal = false" class="fixed inset-0 overflow-y-auto z-50">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <!-- Modal -->
                        <div @click.away="openModal = false" class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            @livewire('user.role-create')
                        </div>
                    </div>
                </div>
            </div>
            @livewire('user.role-table')
        </div>
    </div>
</x-app-layout>
