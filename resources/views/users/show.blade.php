<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <x-validation-errors class="mb-4" />
                
                <div class="overflow-x-auto">
                @php
                $fields = [
                    ['label' => 'Name', 'value' => $user->name],
                    ['label' => 'Email', 'value' => $user->email],
                    ['label' => 'No HP', 'value' => $user->no_hp],
                    ['label' => 'Alamat', 'value' => $user->alamat],
                    ['label' => 'Role', 'value' => $user->role],
                    ['label' => 'Status', 'value' => $user->status],
                    ['label' => 'Tanggal Masuk', 'value' => $user->tanggal_masuk],
                ];
                @endphp

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-400">
                    <tbody>
                        @foreach ($fields as $index => $field)
                            <tr class="{{ $index % 2 == 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">
                                <td class="px-6 py-4 font-semibold">{{ $field['label'] }}</td>
                                <td class="px-6 py-4">{{ $field['value'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

                <!-- Tautan untuk kembali ke halaman daftar pengguna -->
                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-600 dark:bg-gray-400 hover:bg-gray-700 text-white dark:text-gray-800 dark:hover:bg-gray-500 rounded-md mr-2">
                        List User
                    </a>
                    <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-2 bg-gray-600 dark:bg-gray-400 hover:bg-gray-700 text-white dark:text-gray-800 dark:hover:bg-gray-500 rounded-md">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>