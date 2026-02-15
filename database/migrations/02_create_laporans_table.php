<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('tiket_id', 20)->unique(); // Kode Unik (misal: KPAD-X7B9)
            $table->string('judul_laporan');
            $table->text('isi_laporan');
            $table->string('lokasi_kejadian');
            $table->date('tanggal_kejadian');
            $table->string('kategori_pelapor'); // Korban/Saksi/Ortu
            $table->string('no_hp_darurat')->nullable(); // Dienkripsi
            $table->string('lampiran')->nullable();
            $table->enum('status', ['pending', 'terverifikasi', 'proses', 'selesai', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('laporans'); }
};