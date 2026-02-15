<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Status Laporan - SITPA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white border-b border-gray-200 py-4 shadow-sm">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-2 font-bold text-blue-900">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
            <span class="font-bold">Tracking Kasus</span>
        </div>
    </nav>

    <div class="flex-grow max-w-4xl mx-auto px-4 py-10 w-full">
        
        <div class="bg-white p-6 rounded-2xl shadow-lg mb-8">
            <form action="{{ route('lapor.lacak') }}" method="GET" class="flex gap-2">
                <input type="text" name="tiket" value="{{ $keyword }}" placeholder="Masukkan Kode Tiket (Contoh: TIKET-XY123)" class="flex-grow border-slate-300 rounded-lg focus:ring-blue-500 uppercase font-mono">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700">Cari</button>
            </form>
        </div>

        @if($keyword && !$laporan)
            <div class="text-center py-10">
                <div class="text-6xl mb-4">🤷‍♂️</div>
                <h3 class="text-xl font-bold text-slate-700">Laporan Tidak Ditemukan</h3>
                <p class="text-slate-500">Pastikan Kode Tiket yang Anda masukkan benar.</p>
            </div>
        @endif

        @if($laporan)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="md:col-span-1">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border-t-4 border-blue-600">
                        <div class="mb-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wide">Status Terkini</span>
                            @php
                                $badgeColor = match($laporan->status) {
                                    'pending' => 'bg-gray-100 text-gray-800',
                                    'terverifikasi' => 'bg-blue-100 text-blue-800',
                                    'proses' => 'bg-orange-100 text-orange-800',
                                    'selesai' => 'bg-green-100 text-green-800',
                                    'ditolak' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100'
                                };
                            @endphp
                            <div class="mt-1">
                                <span class="px-3 py-1 rounded-full text-sm font-bold {{ $badgeColor }}">
                                    {{ strtoupper($laporan->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wide">Judul Laporan</span>
                            <h3 class="font-bold text-lg leading-snug">{{ $laporan->judul_laporan }}</h3>
                        </div>

                        <div class="mb-4">
                            <span class="text-xs text-slate-400 uppercase tracking-wide">Tanggal Lapor</span>
                            <p class="text-sm font-medium">{{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y, H:i') }}</p>
                        </div>
                        
                        <div>
                            <span class="text-xs text-slate-400 uppercase tracking-wide">Lokasi</span>
                            <p class="text-sm font-medium">{{ $laporan->lokasi_kejadian }}</p>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <h3 class="font-bold text-xl mb-6">Riwayat Penanganan</h3>
                    
                    @if(count($riwayat) > 0)
                        <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                            
                            @foreach($riwayat as $item)
                                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-200 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                                        <i class="fa-solid fa-clock text-slate-500"></i>
                                    </div>
                                    
                                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
                                        <div class="flex items-center justify-between space-x-2 mb-1">
                                            <span class="font-bold text-slate-900">{{ $item->status }}</span>
                                            <time class="font-caveat font-medium text-xs text-slate-500">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}</time>
                                        </div>
                                        <div class="text-slate-500 text-sm">
                                            {{ $item->keterangan }}
                                        </div>
                                        <div class="mt-2 text-xs text-blue-600 font-semibold">
                                            Oleh: {{ $item->nama_petugas }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    @else
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-hourglass-start text-yellow-400"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Laporan belum diverifikasi oleh petugas. Mohon menunggu 1x24 jam.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif

    </div>
</body>
</html>