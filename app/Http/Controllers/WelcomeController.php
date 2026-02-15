<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil data profil organisasi dari database
        $profil = DB::table('profils')->first();
        
        // Kirim data ke tampilan halaman depan
        return view('welcome', compact('profil'));
    }
}