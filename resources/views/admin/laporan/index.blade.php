<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-slate-800">Laporan Masuk (Pending)</h2>
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Perlu Tindakan</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                <tr>
                                    <th class="px-6 py-3">Tanggal</th>
                                    <th class="px-6 py-3">Tiket ID</th>
                                    <th class="px-6 py-3">Judul Laporan</th>
                                    <th class="px-6 py-3">Pelapor</th>
                                    <th class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($laporans as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 font-mono font-bold text-blue-600">{{ $item->tiket_id }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ Str::limit($item->judul_laporan, 40) }}</td>
                                    <td class="px-6 py-4">{{ $item->kategori_pelapor }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('admin.laporan.show', $item->tiket_id) }}" class="inline-block bg-blue-600 text-white px-3 py-1.5 rounded text-xs font-bold hover:bg-blue-700 transition">
                                            Proses &rarr;
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                        <i class="fa-solid fa-check-circle text-4xl mb-2 text-green-200"></i>
                                        <p>Tidak ada laporan baru. Semua aman!</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $laporans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>