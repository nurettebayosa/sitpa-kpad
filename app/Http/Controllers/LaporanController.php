<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    // Tampilkan Form
    public function index()
    {
        // Ambil data profil untuk footer/header
        $profil = DB::table('profils')->first();
        return view('lapor.create', compact('profil'));
    }

    // Proses Simpan Laporan
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'judul_laporan' => 'required|max:255',
            'isi_laporan' => 'required',
            'lokasi_kejadian' => 'required',
            'tanggal_kejadian' => 'required|date',
            'kategori_pelapor' => 'required',
            'lampiran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        // 2. Generate Kode Tiket Unik (Misal: TIKET-XY12Z)
        $tiket_id = 'TIKET-' . strtoupper(Str::random(6));

        // 3. Handle Upload File (Kalau ada)
        $path_bukti = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bukti'), $filename);
            $path_bukti = 'uploads/bukti/' . $filename;
        }

        // 4. Simpan ke Database
        DB::table('laporans')->insert([
            'tiket_id' => $tiket_id,
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'lokasi_kejadian' => $request->lokasi_kejadian,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'kategori_pelapor' => $request->kategori_pelapor,
            'no_hp_darurat' => $request->no_hp_darurat, // Boleh null
            'lampiran' => $path_bukti,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 5. Lempar ke Halaman Sukses bawa Kode Tiket
        return redirect()->route('lapor.sukses', ['tiket' => $tiket_id]);
    }

    // Halaman Sukses
    public function sukses($tiket)
    {
        $profil = DB::table('profils')->first();
        return view('lapor.sukses', compact('tiket', 'profil'));
    }

    // Fitur Cek Status / Lacak Laporan
    public function lacak(Request $request)
    {
        $keyword = $request->input('tiket'); // Ambil dari input search
        $profil = DB::table('profils')->first();
        
        $laporan = null;
        $riwayat = [];

        if ($keyword) {
            // Cari laporan berdasarkan tiket_id
            $laporan = DB::table('laporans')->where('tiket_id', $keyword)->first();
            
            if ($laporan) {
                // Jika ketemu, ambil riwayat updatenya (join dengan tabel users untuk nama petugas)
                $riwayat = DB::table('riwayat_kasus')
                            ->join('users', 'riwayat_kasus.user_id', '=', 'users.id')
                            ->where('laporan_id', $laporan->id)
                            ->select('riwayat_kasus.*', 'users.name as nama_petugas')
                            ->orderBy('created_at', 'desc')
                            ->get();
            }
        }

        return view('lapor.lacak', compact('laporan', 'riwayat', 'keyword', 'profil'));
    }
}