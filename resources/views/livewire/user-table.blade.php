<div class="container mx-auto mt-8">
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
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $user->name }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">
                    {!! $user->no_hp ? '<span>'.$user->no_hp.'</span><br>' : '' !!}
                    {!! $user->email ? '<span>'.$user->email.'</span><br>' : '' !!}
                    {!! $user->alamat ? '<span>'.$user->alamat.'</span>' : '' !!}
                </td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $user->role }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2 flex">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 me-2 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                    <!-- modal untuk  delete confirm -->
                    <div x-data="{ openModal: false }">
                        <button @click="openModal = true" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</button>

                        <div x-show="openModal" x-cloak @click.away="openModal = false" class="fixed inset-0 transition-opacity z-50">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

                            <div class="fixed inset-0 flex items-center justify-center p-4">
                                <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                                    <div class="mb-4">
                                        <p class="text-gray-700 dark:text-gray-400">Apakah anda yakin ingin menghapus user ini?</p>
                                    </div>

                                    <div class="flex justify-end">
                                        <button @click="openModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Tidak</button>
                                        <button @click="openModal = false" wire:click="destroy({{ $user->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-r">Ya</button>
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
