<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// --- HALAMAN PUBLIK (Bisa diakses siapa saja) ---

// Halaman Depan
Route::get('/', [WelcomeController::class, 'index'])->name('home');

// Fitur Laporan
Route::get('/lapor', [LaporanController::class, 'index'])->name('lapor.index');
Route::post('/lapor', [LaporanController::class, 'store'])->name('lapor.store');
Route::get('/lapor/sukses/{tiket}', [LaporanController::class, 'sukses'])->name('lapor.sukses');
Route::get('/lacak', [LaporanController::class, 'lacak'])->name('lapor.lacak');


// --- HALAMAN INTERNAL (Wajib Login) ---

// Dashboard
Route::get('/dashboard', function () {
    // Hitung Statistik Real-time
    $total      = DB::table('laporans')->count();
    $pending    = DB::table('laporans')->where('status', 'pending')->count();
    $proses     = DB::table('laporans')->whereIn('status', ['terverifikasi', 'proses'])->count();
    $selesai    = DB::table('laporans')->where('status', 'selesai')->count();
    
    return view('dashboard', compact('total', 'pending', 'proses', 'selesai'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Route Admin & Staf (Diproteksi Auth)
Route::middleware('auth')->group(function () {
    
    // 1. Menu Laporan Masuk (Verifikasi)
    Route::get('/admin/laporan-masuk', [AdminController::class, 'index'])->name('admin.laporan.index');
    Route::get('/admin/laporan/{tiket}', [AdminController::class, 'show'])->name('admin.laporan.show');
    Route::patch('/admin/laporan/{id}', [AdminController::class, 'updateStatus'])->name('admin.laporan.update');

    // 2. Menu Kelola Kasus (Investigasi)
    Route::get('/admin/kasus-aktif', [KasusController::class, 'index'])->name('admin.kasus.index');
    Route::get('/admin/kasus/{tiket}', [KasusController::class, 'show'])->name('admin.kasus.show');
    Route::post('/admin/kasus/{id}/log', [KasusController::class, 'storeLog'])->name('admin.kasus.storeLog');

    // 3. Manajemen Artikel Edukasi
    Route::resource('/admin/edukasi', EdukasiController::class, ['as' => 'admin']);

    // 4. Manajemen User (Khusus Admin - Pakai Middleware 'can:admin')
    Route::resource('/admin/users', UserController::class, ['as' => 'admin'])->middleware('can:admin');

    // 5. Profil Akun (Breeze Bawaan)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';