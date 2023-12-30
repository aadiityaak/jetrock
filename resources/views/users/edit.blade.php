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
                        <x-label for="name">Name</x-label>
                        <x-input id="name" name="name" :value="$user->name" />
                    </div>

                    <div class="mb-4">
                        <x-label for="email">Email</x-label>
                        <x-input id="email" name="email" :value="$user->email" />
                    </div>

                    <div class="mb-4">
                        <x-label for="alamat">Alamat</x-label>
                        <x-textarea id="alamat" name="alamat">{{ $user->alamat }}</x-textarea>
                    </div>

                    <div class="mb-4">
                        <x-label for="no_hp">No. HP</x-label>
                        <x-input id="no_hp" name="no_hp" :value="$user->no_hp" />
                    </div>

                    <div class="mb-4">
                        <x-label for="tanggal_masuk">Tgl. Masuk</x-label>
                        <x-input id="tanggal_masuk" name="tanggal_masuk" type="date" :value="$user->tanggal_masuk" />
                    </div>

                    <div class="mb-4">
                        <x-label for="kode_karyawan">Kode Karyawan</x-label>
                        <x-input id="kode_karyawan" name="kode_karyawan" :value="$user->kode_karyawan" />
                    </div>

                    <div class="mb-4">
                        <x-label for="role">Role</x-label>
                        <x-select name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="mb-4">
                        <x-label for="status">Status</x-label>
                        <x-select name="status" id="status">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ $user->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="flex items-center justify-end">
                        <x-a-button href="{{ route('users.index') }}">{{ __('Cancel') }}</x-a-button>
                        <x-button type="submit" class="ml-3">{{ __('Update User') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
