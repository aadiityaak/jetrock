<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Edit User' }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @livewire('user.edit', ['user' => $user])
        </div>
    </div>
</x-app-layout>
