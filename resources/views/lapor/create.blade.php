<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Pelaporan - SITPA KPAD Subang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans text-slate-800">

    <nav class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-3xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-2 font-bold text-blue-900">
                &larr; Kembali ke Beranda
            </a>
            <span class="text-sm text-slate-500">Formulir Pengaduan Masyarakat</span>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-4 py-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-blue-900 p-8 text-white">
                <h1 class="text-2xl font-bold mb-2">Sampaikan Laporan Anda</h1>
                <p class="text-blue-200 text-sm">Identitas Anda akan kami rahasiakan. Mohon isi data sebenar-benarnya untuk memudahkan penanganan.</p>
            </div>

            <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                
                <div>
                    <label class="block font-semibold text-slate-700 mb-2">Judul Laporan / Subjek *</label>
                    <input type="text" name="judul_laporan" required class="w-full border-slate-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Kekerasan fisik pada anak di Desa X">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-2">Hubungan dengan Korban *</label>
                        <select name="kategori_pelapor" required class="w-full border-slate-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih --</option>
                            <option value="Orang Tua">Orang Tua / Wali</option>
                            <option value="Keluarga/Kerabat">Keluarga / Kerabat</option>
                            <option value="Guru/Sekolah">Guru / Pihak Sekolah</option>
                            <option value="Tetangga/Masyarakat">Tetangga / Masyarakat</option>
                            <option value="Korban Sendiri">Saya Korban Sendiri</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-2">Tanggal Kejadian *</label>
                        <input type="date" name="tanggal_kejadian" required class="w-full border-slate-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-2">Lokasi Kejadian (Lengkap) *</label>
                    <textarea name="lokasi_kejadian" rows="2" required class="w-full border-slate-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Nama Jalan, Desa, Kecamatan..."></textarea>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-2">Kronologi / Isi Laporan *</label>
                    <textarea name="isi_laporan" rows="5" required class="w-full border-slate-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Ceritakan detail kejadian..."></textarea>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-2">Kontak Darurat (Opsional)</label>
                    <input type="text" name="no_hp_darurat" class="w-full border-slate-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="No WA/Email jika ingin dihubungi petugas (Akan dirahasiakan)">
                    <p class="text-xs text-slate-500 mt-1">*Kosongkan jika ingin benar-benar anonim.</p>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-2">Bukti Pendukung (Foto/Dokumen)</label>
                    <input type="file" name="lampiran" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-xs text-slate-500 mt-1">Maks 2MB. Format: JPG, PNG.</p>
                </div>

                <hr class="border-slate-200">

                <div class="flex justify-end gap-4">
                    <a href="{{ url('/') }}" class="px-6 py-3 bg-slate-200 text-slate-700 rounded-xl font-semibold hover:bg-slate-300 transition">Batal</a>
                    <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                        KIRIM LAPORAN SEKARANG
                    </button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>