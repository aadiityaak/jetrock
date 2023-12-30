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
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        
                        <x-table-header :columns="['ID', 'Data Web', 'Tanggal', 'Biaya', 'Kontak', 'Dikerjakan oleh', 'Aksi']" />

                        <tbody class="divide-y divide-gray-200 text-gray-800 dark:text-gray-400 dark:divide-gray-700">
                            @foreach ($csMainProjectData as $csMainProject)

                            <tr class="{{ $loop->odd ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">
                                <td class="px-4 py-3 align-top">
                                    {{ $csMainProjectData->firstItem() + $loop->index }}
                                </td>
                                <td class="px-4 py-3 align-top max-w-[200px]">
                                    <b>{{ $csMainProject->jenis }}</b>
                                    <br>
                                    <b>{{ $csMainProject->nama_web }}</b>
                                    <br>
                                    <b>{{ $csMainProject->nama_paket }}</b>
                                    <br>
                                    {{ $csMainProject->deskripsi }}
                                </td>
                                <td class="px-4 py-3 align-top">
                                    Masuk :
                                    {{ dateToDMY($csMainProject->tgl_masuk) }}
                                    <br>
                                    Deadline :
                                    {{ dateToDMY($csMainProject->tgl_deadline) }}
                                </td>
                                <td class="px-4 py-3 align-top">
                                    {!! $csMainProject->trf ? 'TRF: '.$csMainProject->trf.'<br>' : '' !!}
                                    Biaya :
                                    {{ rupiah($csMainProject->biaya) }}
                                    <br>
                                    Dibayar :
                                    {{ rupiah($csMainProject->dibayar) }}
                                </td>
                                <td class="px-4 py-3 align-top max-w-[200px]">
                                    {!! $csMainProject->hp ? 'HP: '.$csMainProject->hp.'<br>' : '' !!}
                                    {!! $csMainProject->telegram ? 'Telegram: '.$csMainProject->telegram .'<br>' : '' !!}
                                    {!! $csMainProject->wa ? 'WA: '.$csMainProject->wa .'<br>' : '' !!}
                                    {!! $csMainProject->hpads ? 'HP Ads: '.$csMainProject->hpads .'<br>' : '' !!}
                                    {!! $csMainProject->email ? 'Email: '.$csMainProject->email : '' !!}
                                </td>
                                <td class="px-4 py-3 align-top">
                                @php
                                    // Menggunakan preg_match_all untuk mendapatkan semua pasangan kode_karyawan dan angka
                                    preg_match_all('/(\d+)\[(\d+)\]/', $csMainProject->dikerjakan_oleh, $matches, PREG_SET_ORDER);

                                    // Menyimpan informasi user untuk setiap pasangan kode_karyawan dan angka
                                    $users = [];
                                    foreach ($matches as $match) {
                                        $kode_karyawan = $match[1];
                                        $persentase = $match[2];

                                        // Query ke tabel users untuk mendapatkan informasi user berdasarkan kode_karyawan
                                        $user = \App\Models\User::where('kode_karyawan', $kode_karyawan)->first();

                                        // Menyimpan informasi user
                                        if ($user) {
                                            $users[] = ['name' => $user->name, 'persentase' => $persentase];
                                        }
                                    }
                                @endphp

                                @foreach ($users as $user)
                                    {{ $user['name'] }} ({{ $user['persentase'] }}%)<br>
                                @endforeach
                                </td>
                                <td class="px-4 py-3 align-top">
                                    <x-a-button href="#" class="ml-3">Edit</x-a-button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4 text-gray-700 dark:text-gray-400">
                {{ $csMainProjectData->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
