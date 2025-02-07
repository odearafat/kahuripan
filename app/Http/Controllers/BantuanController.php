<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bantuan;

class BantuanController extends Controller
{
    public function index()
{
    // Hanya menampilkan data jika ada request POST dan valid
    return view('bantuan.index');
}

public function cari(Request $request)
{
    // Validasi input NIK
    $request->validate([
        'nik' => 'required|digits:16'
    ]);

    // Cari data berdasarkan NIK
    $bantuan = Bantuan::where('nik', $request->nik)->get();

    if ($bantuan->isEmpty()) {
        return redirect('/')->with('error', 'NIK tidak ditemukan');
    }

    // Jika ditemukan, tampilkan nama dan tabel bantuan
    return view('bantuan.index', [
        'nama' => $bantuan->first()->nama,
        'bantuan' => $bantuan
    ]);
}
}

