<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
{
    public function index()
    {
        $edukasi = DB::table('edukasis')
                    ->join('users', 'edukasis.penulis_id', '=', 'users.id')
                    ->select('edukasis.*', 'users.name as penulis')
                    ->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.edukasi.index', compact('edukasi'));
    }

    public function create()
    {
        return view('admin.edukasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/edukasi'), $filename);
            $path = 'uploads/edukasi/' . $filename;
        }

        DB::table('edukasis')->insert([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'gambar' => $path,
            'penulis_id' => Auth::id(),
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.edukasi.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    public function destroy($id)
    {
        // Hapus file gambar lama jika ada (opsional, lewati kalau ribet)
        DB::table('edukasis')->where('id', $id)->delete();
        return redirect()->route('admin.edukasi.index')->with('success', 'Artikel dihapus.');
    }
}