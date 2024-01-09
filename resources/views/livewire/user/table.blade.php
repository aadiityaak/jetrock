<div class="container mx-auto mt-8">
    <div x-data="{ openCreateModal: false }" class="mb-4">
        <x-button-basic @click="openCreateModal = true" color="primary">
            Tambah Karyawan
        </x-button-basic>

        <div x-show="openCreateModal" x-cloak @click.away="openCreateModal = false" class="fixed inset-0 overflow-y-auto z-50">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- Modal -->
                <div @click.away="openCreateModal = false" class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="container mx-auto mt-8">
                    <form wire:submit.prevent="store" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        
                        <x-input-basic id="name" name="name" label="Nama" model="name" :error="$errors->first('name')" />
                        <x-input-basic id="email" name="email" label="Email" model="email" :error="$errors->first('email')" />
                        <x-input-basic id="password" name="password" label="Password" model="password" type="password" :error="$errors->first('password')" />
                        
                        <div class="flex items-center justify-between">
                            <x-button-basic @click="openCreateModal = false" type="submit" color="primary">Simpan</x-button-basic>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>

    @if(session()->has('success'))
    <div class="bg-green-100 border mb-5 border-green-400 dark:border-green-700 border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif


    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-md rounded">
        <thead>
            <tr>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">ID</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Nama</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Kontak</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Role</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $index+1 }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $user->name }}
                {!! $user->id_karyawan ? '<span class="text-sm">('.$user->id_karyawan.')</span><br>' : '' !!}
                </td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">
                    {!! $user->no_hp ? '<span>'.$user->no_hp.'</span><br>' : '' !!}
                    {!! $user->email ? '<span>'.$user->email.'</span><br>' : '' !!}
                    {!! $user->alamat ? '<span>'.$user->alamat.'</span>' : '' !!}
                </td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">
                    @foreach($roles as $role)
                        @if($role->id == $user->role)
                            {{ $role->name }}
                        @endif
                    @endforeach
                </td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">
                    <!-- modal untuk  delete confirm -->
                    <div x-data="{ openModal: false }">
                        <div class="flex">
                            <x-a-button href="{{ route('users.edit', $user->id) }}" class="me-2" type="primary">Edit</x-a-button>
                            <x-button-basic @click="openModal = true" color="danger">Hapus</x-button-basic>
                        </div>

                        <div x-show="openModal" x-cloak @click.away="openModal = false" class="fixed inset-0 transition-opacity z-50">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

                            <div class="fixed inset-0 flex items-center justify-center p-4">
                                <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                                    <div class="mb-4">
                                        <p class="text-gray-700 dark:text-gray-400">Apakah anda yakin ingin menghapus <b>{{ $user->name }}</b>?</p>
                                    </div>

                                    <div class="flex justify-end">
                                        <x-button-basic color="danger" text="Tutup" @click="openModal = false" wire:click="destroy({{ $user->id }})" class="me-2">
                                            Ya
                                        </x-button-basic>
                                        <x-button-basic color="primary" text="Tutup" @click="openModal = false">
                                            Tidak
                                        </x-button-basic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
