<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data siswa dari database
    $siswas = Siswa::all();

    // Kirim data siswa ke view index.blade.php
    return view('siswa.index', compact('siswas'));
    }

    // Masukkan data laporan siswa
    public function store(Request $request)
    {
        $request->validate([
            'pelapor'=> 'required|string',
            'terlapor'=> 'required|string',
            'kelas'=> 'required|string',
            'laporan'=> 'required|string',
            'foto'=> 'required|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
        ]);

        $foto = $request->file('foto')->store('bukti', 'public');

        Siswa::create([
            'pelapor'=> $request->pelapor,
            'terlapor'=> $request->terlapor,
            'kelas'=> $request->kelas,
            'laporan'=> $request->laporan,
            'foto'=> $foto,
            'status'=> 'Belum Di Baca',
        ]);

        return redirect('siswa')->with('Pesan', 'Laporan sudah diterima guru');
    }

}
