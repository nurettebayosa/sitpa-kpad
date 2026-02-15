<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('profils')->insert([
            'nama_instansi' => 'KPAD Kabupaten Subang',
            'deskripsi' => 'Lembaga independen yang bertugas melakukan pengawasan penyelenggaraan perlindungan anak di Kabupaten Subang.',
            'alamat' => 'Jl. Jenderal Ahmad Yani No. 12, Pasirkareumbi, Kec. Subang',
            'email' => 'pengaduan@kpad-subang.go.id',
            'telepon' => '(0260) 123-4567',
            'whatsapp' => '6281234567890',
            'instagram' => 'kpad_subang',
            'facebook' => 'KPAD Subang Official',
            'youtube' => 'KPAD Subang TV',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}