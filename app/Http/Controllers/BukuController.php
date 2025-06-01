<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function buku()
    {
        return view('buku.index');
    }

    public function tambahbuku()
    {
        return view('buku.tambah_buku');
    }
}