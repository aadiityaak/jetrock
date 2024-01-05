<div class="p-4">

    <x-section-title>
        <x-slot name="title">{{ __('User List') }}</x-slot>
        <x-slot name="description">{{ __('List semua karyawan velocity.') }}</x-slot>
    </x-section-title>

    <div class="pt-5">
        <table class="min-w-full bg-white dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left">Nama</th>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="">
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $user->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

</div>
