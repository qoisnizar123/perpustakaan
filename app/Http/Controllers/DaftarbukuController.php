<?php

namespace App\Http\Controllers;

use App\Models\{Buku, Kategori};

class DaftarbukuController extends Controller
{
    public function daftarBuku()
    {
        return view('daftar_buku', [
            'bukus' => Buku::all(),
            'kategoris' => Kategori::all()
        ]);
    }
}