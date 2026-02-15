<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <a href="{{ route('admin.kasus.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 mb-6 font-medium">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Kasus
            </a>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="md:col-span-1">
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-orange-500 sticky top-6">
                        <h3 class="font-bold text-gray-900 mb-4">Catat Perkembangan</h3>
                        
                        <form action="{{ route('admin.kasus.storeLog', $laporan->id) }}" method="POST">
                            @csrf
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Tindakan</label>
                                <select name="status_update" class="w-full border-gray-300 rounded-lg focus:ring-orange-500">
                                    <option value="Investigasi Lapangan">Investigasi Lapangan</option>
                                    <option value="Mediasi Tahap 1">Mediasi Tahap 1</option>
                                    <option value="Mediasi Tahap 2">Mediasi Tahap 2</option>
                                    <option value="Pendampingan Psikologis">Pendampingan Psikologis</option>
                                    <option value="Pendampingan Hukum">Pendampingan Hukum</option>
                                    <option value="Kasus Selesai">✅ KASUS SELESAI (Tutup)</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan Detail</label>
                                <textarea name="keterangan" rows="4" required class="w-full border-gray-300 rounded-lg focus:ring-orange-500" placeholder="Jelaskan hasil tindakan..."></textarea>
                            </div>

                            <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 rounded-lg transition">
                                <i class="fa-solid fa-paper-plane mr-2"></i> Simpan Log
                            </button>
                        </form>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <div class="bg-white p-8 rounded-xl shadow-sm">
                        <div class="flex justify-between items-start mb-6 border-b pb-4">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">{{ $laporan->judul_laporan }}</h1>
                                <p class="text-sm text-gray-500">Tiket: <span class="font-mono text-blue-600">{{ $laporan->tiket_id }}</span></p>
                            </div>
                            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-bold">{{ strtoupper($laporan->status) }}</span>
                        </div>

                        <div class="relative border-l-2 border-gray-200 ml-3 space-y-8">
                            @foreach($riwayat as $log)
                            <div class="relative pl-8 group">
                                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full border-2 border-white 
                                    {{ $log->status == 'Kasus Selesai' ? 'bg-green-500' : 'bg-blue-500' }} shadow"></div>
                                
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-baseline mb-1">
                                    <h4 class="font-bold text-gray-800 {{ $log->status == 'Kasus Selesai' ? 'text-green-600' : '' }}">{{ $log->status }}</h4>
                                    <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($log->created_at)->format('d M Y, H:i') }}</span>
                                </div>
                                <p class="text-gray-600 text-sm bg-gray-50 p-3 rounded-lg border border-gray-100">
                                    {{ $log->keterangan }}
                                </p>
                                <p class="text-xs text-gray-400 mt-1">Oleh: {{ $log->nama_petugas }}</p>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>