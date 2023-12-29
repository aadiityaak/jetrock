<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">

                <x-validation-errors class="mb-4" />

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Role</label>
                        <select name="role" id="role" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 bg-gray-600 dark:bg-gray-400 hover:bg-gray-700 text-white dark:text-gray-800 dark:hover:bg-gray-500 rounded-md">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>