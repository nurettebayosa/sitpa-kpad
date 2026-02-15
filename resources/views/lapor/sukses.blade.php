<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Terkirim - SITPA KPAD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 h-screen flex items-center justify-center font-sans">

    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-2xl text-center">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        
        <h2 class="text-2xl font-bold text-slate-900 mb-2">Laporan Diterima!</h2>
        <p class="text-slate-600 mb-6">Terima kasih. Laporan Anda telah masuk ke sistem kami dan akan segera diverifikasi.</p>
        
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
            <p class="text-xs text-blue-600 uppercase font-bold tracking-wider mb-1">Kode Tiket Anda</p>
            <div class="text-3xl font-mono font-black text-blue-900 tracking-widest select-all">{{ $tiket }}</div>
            <p class="text-xs text-slate-500 mt-2">Simpan kode ini untuk mengecek status kasus.</p>
        </div>

        <a href="{{ url('/') }}" class="block w-full bg-slate-900 text-white py-3 rounded-xl font-semibold hover:bg-slate-800 transition">Kembali ke Beranda</a>
    </div>

</body>
</html>