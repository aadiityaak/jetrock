<div class="container mx-auto mt-8">
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
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Nama Role</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Deskripsi</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $role->id }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $role->name }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $role->description }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">
                    
                    <!-- modal untuk edit role -->
                    <div x-data="{ openModal: false }">
                        <div class="flex">
                            <x-button-basic @click="openModal = true" color="primary">Edit</x-button-basic>
                        </div>

                        <div x-show="openModal" x-cloak @click.away="openModal = false" class="fixed inset-0 transition-opacity z-50">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

                            <div class="fixed inset-0 flex items-center justify-center p-4">
                                <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                                    <div class="mb-4">
                                        <p class="text-gray-700 dark:text-gray-400">Edit Role</p>
                                    </div>

                                    <x-input-basic id="name" name="name" label="Role Name" model="name" :error="$errors->first('name')" />
                                    <x-input-basic id="description" name="description" label="Description" model="description" :error="$errors->first('description')" />

                                    <div class="flex justify-end">
                                        <x-button-basic color="secondary" class="me-2" text="Tutup" @click="openModal = false">
                                            Tidak
                                        </x-button-basic>
                                        <x-button-basic color="primary" text="Simpan" @click="openModal = false" wire:click="update({{ $role->id }})">
                                            Simpan
                                        </x-button-basic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal untuk  delete confirm -->
                    <div x-data="{ openModal: false }">
                        <div class="flex">
                            <x-button-basic @click="openModal = true" color="danger">Hapus</x-button-basic>
                        </div>

                        <div x-show="openModal" x-cloak @click.away="openModal = false" class="fixed inset-0 transition-opacity z-50">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

                            <div class="fixed inset-0 flex items-center justify-center p-4">
                                <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                                    <div class="mb-4">
                                        <p class="text-gray-700 dark:text-gray-400">Apakah anda yakin ingin menghapus <b>{{ $role->name }}</b>?</p>
                                    </div>

                                    <div class="flex justify-end">
                                        <x-button-basic color="danger" text="Tutup" @click="openModal = false" wire:click="destroy({{ $role->id }})" class="me-2">
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
