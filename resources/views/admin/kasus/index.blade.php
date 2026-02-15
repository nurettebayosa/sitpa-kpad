<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-slate-800">Kasus Sedang Ditangani</h2>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Active Cases</span>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3">Update Terakhir</th>
                                <th class="px-6 py-3">Tiket</th>
                                <th class="px-6 py-3">Kasus</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kasus as $item)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</td>
                                <td class="px-6 py-4 font-mono font-bold text-blue-600">{{ $item->tiket_id }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ Str::limit($item->judul_laporan, 40) }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-bold 
                                        {{ $item->status == 'proses' ? 'bg-orange-100 text-orange-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ strtoupper($item->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.kasus.show', $item->tiket_id) }}" class="bg-slate-800 text-white px-3 py-1.5 rounded text-xs font-bold hover:bg-slate-900 transition">
                                        Update Info
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                    <p>Belum ada kasus yang berjalan.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $kasus->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>