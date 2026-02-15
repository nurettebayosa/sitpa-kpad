<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KasusController extends Controller
{
    // 1. Daftar Kasus Aktif (Yang sedang ditangani)
    public function index()
    {
        $kasus = DB::table('laporans')
                    ->whereIn('status', ['terverifikasi', 'proses']) // Hanya yang aktif
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        
        return view('admin.kasus.index', compact('kasus'));
    }

    // 2. Detail & Update Perkembangan
    public function show($tiket)
    {
        $laporan = DB::table('laporans')->where('tiket_id', $tiket)->first();
        if(!$laporan) abort(404);

        // Ambil riwayat update sebelumnya
        $riwayat = DB::table('riwayat_kasus')
                    ->join('users', 'riwayat_kasus.user_id', '=', 'users.id')
                    ->where('laporan_id', $laporan->id)
                    ->select('riwayat_kasus.*', 'users.name as nama_petugas')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.kasus.show', compact('laporan', 'riwayat'));
    }

    // 3. Simpan Update Baru (Logbook)
    public function storeLog(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required',
            'status_update' => 'required' // Misal: "Mediasi", "Kunjungan", "Selesai"
        ]);

        // Catat di Riwayat
        DB::table('riwayat_kasus')->insert([
            'laporan_id' => $id,
            'user_id' => Auth::id(),
            'status' => $request->status_update, // Judul update
            'keterangan' => $request->keterangan, // Detail
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Update Status Utama Laporan (Opsional)
        // Kalau pilih "Kasus Selesai", status laporan jadi 'selesai'.
        // Kalau lainnya, status laporan jadi 'proses'.
        $status_utama = ($request->status_update == 'Kasus Selesai') ? 'selesai' : 'proses';
        
        DB::table('laporans')->where('id', $id)->update([
            'status' => $status_utama,
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Perkembangan kasus berhasil dicatat.');
    }
}