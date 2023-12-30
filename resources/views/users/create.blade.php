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
                        <x-label for="name">Name</x-label>
                        <x-input id="name" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="mb-4">
                        <x-label for="email">Email</x-label>
                        <x-input id="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mb-4">
                        <x-label for="role">Role</x-label>
                        <x-select name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="mb-4">
                        <x-label for="password">Password</x-label>
                        <x-input id="password" name="password" type="password" required autocomplete="new-password" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password_confirmation">Confirm Password</x-label>
                        <x-input id="password_confirmation" name="password_confirmation" type="password" required />
                    </div>

                    <div class="flex items-center justify-end">
                        <x-a-button href="{{ route('users.index') }}">{{ __('Cancel') }}</x-a-button>
                        <x-button type="submit" class="ml-3">{{ __('Create User') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>