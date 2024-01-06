<div class="container mx-auto mt-8">

    @if (session()->has('success'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
    <form wire:submit.prevent="store" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Nama:</label>
            <input wire:model="name" type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Email:</label>
            <input wire:model="email" type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Password:</label>
            <input wire:model="password" type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('password') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
        
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Simpan
            </button>
        </div>
    </form>
</div>
