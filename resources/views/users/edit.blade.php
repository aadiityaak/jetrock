<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">

                <x-validation-errors class="mb-4" />
                
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Alamat</label>
                        <textarea name="alamat" id="alamat" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">{{ $user->alamat }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 dark:text-gray-300">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ $user->no_hp }}" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ $user->tanggal_masuk }}" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Kode Karyawan</label>
                        <input type="text" name="kode_karyawan" id="kode_karyawan" value="{{ $user->kode_karyawan }}" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Role</label>
                        <select name="role" id="role" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Status Karyawan</label>
                        <select name="status" id="status" class="mt-1 p-2 w-full border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ $user->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 bg-gray-600 dark:bg-gray-400 hover:bg-gray-700 text-white dark:text-gray-800 dark:hover:bg-gray-500 rounded-md">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
