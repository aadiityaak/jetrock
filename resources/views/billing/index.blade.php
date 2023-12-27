<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Billing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Nama Web
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Paket
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Tanggal Masuk
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Tanggal Deadline
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Total Biaya
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Dibayar
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Hp
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Hp Ads
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Wa
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Dikerjakan oleh
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-gray-800 dark:text-gray-400 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($csMainProjectData as $csMainProject)
                                <tr>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProjectData->firstItem() + $loop->index }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->nama_web }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->nama_paket }}
                                    </td>
                                    <td class="px-6 py-4  max-w-[300px]">
                                        {{ $csMainProject->deskripsi }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->tgl_masuk }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->tgl_deadline }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->biaya }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->dibayar }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->hp }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->hpads }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->kurang }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->wa }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->email }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $csMainProject->dikerjakan_oleh }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <a href="#"
                                            class="text-blue-500 hover:text-blue-700">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $csMainProjectData->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
