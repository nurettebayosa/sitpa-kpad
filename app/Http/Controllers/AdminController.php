<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // 1. Halaman Daftar Laporan Masuk (Pending)
    public function index()
    {
        $laporans = DB::table('laporans')
                    ->where('status', 'pending')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10); // 10 per halaman
        
        return view('admin.laporan.index', compact('laporans'));
    }

    // 2. Halaman Detail & Verifikasi
    public function show($tiket)
    {
        $laporan = DB::table('laporans')->where('tiket_id', $tiket)->first();
        
        if(!$laporan) abort(404);

        return view('admin.laporan.show', compact('laporan'));
    }

    // 3. Proses Verifikasi (Terima/Tolak)
    public function updateStatus(Request $request, $id)
    {
        $status_baru = $request->input('status'); // terverifikasi / ditolak
        $keterangan  = $request->input('keterangan');

        // Update Tabel Laporan
        DB::table('laporans')->where('id', $id)->update([
            'status' => $status_baru,
            'updated_at' => now()
        ]);

        // Catat di Riwayat Kasus (Supaya pelapor bisa lacak)
        DB::table('riwayat_kasus')->insert([
            'laporan_id' => $id,
            'user_id' => Auth::id(), // Siapa admin yang klik
            'status' => ucfirst($status_baru),
            'keterangan' => $keterangan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.laporan.index')->with('success', 'Status laporan berhasil diperbarui.');
    }
}