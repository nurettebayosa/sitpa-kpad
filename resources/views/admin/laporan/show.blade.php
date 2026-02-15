<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <a href="{{ route('admin.laporan.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 mb-6 font-medium">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="md:col-span-2 space-y-6">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">{{ $laporan->judul_laporan }}</h1>
                                <p class="text-gray-500 text-sm mt-1">Tiket: <span class="font-mono font-bold bg-gray-100 px-2 py-1 rounded">{{ $laporan->tiket_id }}</span></p>
                            </div>
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-bold px-3 py-1 rounded-full uppercase">{{ $laporan->status }}</span>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Kronologi Kejadian</label>
                                <p class="text-gray-800 leading-relaxed mt-1 whitespace-pre-line">{{ $laporan->isi_laporan }}</p>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100">
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase">Tanggal Kejadian</label>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($laporan->tanggal_kejadian)->format('d F Y') }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase">Lokasi</label>
                                    <p class="font-medium">{{ $laporan->lokasi_kejadian }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($laporan->status == 'pending')
                    <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100">
                        <h3 class="font-bold text-blue-900 mb-4"><i class="fa-solid fa-gavel mr-2"></i>Tindakan Verifikasi</h3>
                        
                        <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-blue-800 mb-2">Catatan Verifikator (Akan dilihat pelapor)</label>
                                <textarea name="keterangan" rows="3" required class="w-full border-blue-200 rounded-lg focus:ring-blue-500" placeholder="Contoh: Laporan diterima, tim akan segera melakukan investigasi ke lokasi..."></textarea>
                            </div>

                            <div class="flex gap-3">
                                <button type="submit" name="status" value="terverifikasi" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow transition">
                                    <i class="fa-solid fa-check mr-2"></i> TERIMA LAPORAN
                                </button>
                                <button type="submit" name="status" value="ditolak" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg shadow transition" onclick="return confirm('Yakin menolak laporan ini?')">
                                    <i class="fa-solid fa-xmark mr-2"></i> TOLAK
                                </button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>

                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 border-b pb-2">Identitas Pelapor</h3>
                        <div class="space-y-3">
                            <div>
                                <label class="text-xs text-gray-400">Kategori</label>
                                <p class="font-medium">{{ $laporan->kategori_pelapor }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-400">Kontak Darurat</label>
                                <p class="font-mono text-sm bg-gray-50 p-2 rounded">
                                    {{ $laporan->no_hp_darurat ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 border-b pb-2">Bukti Lampiran</h3>
                        @if($laporan->lampiran)
                            <a href="{{ asset($laporan->lampiran) }}" target="_blank">
                                <img src="{{ asset($laporan->lampiran) }}" class="w-full rounded-lg hover:opacity-90 transition border cursor-zoom-in" alt="Bukti">
                            </a>
                            <p class="text-xs text-center text-gray-400 mt-2">Klik gambar untuk memperbesar</p>
                        @else
                            <div class="text-center py-8 bg-gray-50 rounded border border-dashed border-gray-300">
                                <i class="fa-solid fa-image-slash text-gray-300 text-3xl mb-2"></i>
                                <p class="text-xs text-gray-500">Tidak ada lampiran bukti</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>