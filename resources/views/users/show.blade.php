<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pengguna') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <table class="w-full">
                <tr>
                    <td class="font-bold pr-4">ID:</td>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <td class="font-bold pr-4">Nama:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="font-bold pr-4">Email:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="font-bold pr-4">Dibuat pada:</td>
                    <td>{{ $user->created_at->format('d F Y H:i:s') }}</td>
                </tr>
            </table>
            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
