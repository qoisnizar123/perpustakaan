<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatpeminjamanController extends Controller
{
    public function riwayatpeminjaman()
    {
        return view('riwayat_peminjaman');
    }
}