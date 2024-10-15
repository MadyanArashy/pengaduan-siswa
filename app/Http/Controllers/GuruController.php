<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Siswa;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        // Ambil semua data siswa dari database
    $siswas = Siswa::all();

    // Kirim data siswa ke view index.blade.php
    return view('guru.index', compact('siswas'));
    }

    // Masukkan data laporan siswa
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'status'=>'required',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'status'=> $request->status,
        ]);

        return redirect('guru')->with('Pesan', 'Status laporan telah diubah');
    }

}
