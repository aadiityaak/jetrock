<div class="container mx-auto mt-8">
    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-md rounded">
        <thead>
            <tr>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2">ID</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2">Nama</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2">Email</th>
                <th class="border-b border-gray-300 dark:border-gray-700 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $index+1 }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                </td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $user->email }}</td>
                <td class="border-b border-gray-300 dark:border-gray-700 p-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                    <button wire:click="deleteUser({{ $user->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
