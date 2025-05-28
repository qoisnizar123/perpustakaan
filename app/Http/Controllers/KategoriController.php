<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori()
    {
        return view('kategori.kategori');
    }

    public function tambahkategori()
    {
        return view('kategori.tambah_kategori');
    }
}