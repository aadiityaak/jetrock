<div>
    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Nama:</label>
            <input wire:model="name" type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Email:</label>
            <input wire:model="email" type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline disabled">
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Alamat:</label>
            <textarea wire:model="alamat" id="alamat" name="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('alamat') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="no_hp" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">No. HP:</label>
            <input wire:model="no_hp" type="text" id="no_hp" name="no_hp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('no_hp') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="id_karyawan" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">ID Karyawan:</label>
            <input wire:model="id_karyawan" for="id_karyawan" type="number" id="id_karyawan" name="id_karyawan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('id_karyawan') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Role:</label>
            <select wire:model="role" id="role" name="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($roles as $roleOption)
                    <option value="{{ $roleOption }}" {{ $roleOption == $user->role ? 'selected' : '' }}>{{ ucfirst($roleOption) }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('users.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kembali</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
