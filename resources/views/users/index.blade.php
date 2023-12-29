<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">

                @if(auth()->check() && auth()->user()->role == 'admin')
                    <div class="text-right mb-4">
                        <a href="{{ route('users.create') }}" class="px-4 py-2 bg-gray-600 dark:bg-gray-400 hover:bg-gray-700 text-white dark:text-gray-800 dark:hover:bg-gray-500 rounded-md">Add User</a>
                    </div>
                @endif

                <x-validation-errors class="mb-4" />
                
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left font-semibold text-sm text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left font-semibold text-sm text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left font-semibold text-sm text-gray-500 dark:text-gray-300 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left font-semibold text-sm text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kontak</th>
                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700"></th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="{{ $loop->odd ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('users.show', $user->id) }}" class="text-sm text-gray-900 dark:text-gray-200">{{ $user->name }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {!! $user->no_hp ? $user->no_hp.'<br>' : '' !!}
                                    {{ $user->alamat }}
                                </td>
                                @if(auth()->check() && auth()->user()->role == 'admin')
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-2 bg-gray-600 dark:bg-gray-400 hover:bg-gray-700 text-white dark:text-gray-800 dark:hover:bg-gray-500 rounded-md">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-gray-900 dark:bg-gray-600 hover:bg-gray-700 text-red-400 dark:hover:bg-gray-500 rounded-md">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->check() && auth()->user()->can('admin') ? '5' : '4' }}" class="px-6 py-4 text-center">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
