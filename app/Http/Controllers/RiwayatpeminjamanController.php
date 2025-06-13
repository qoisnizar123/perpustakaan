<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class RiwayatpeminjamanController extends Controller
{
    public function index()
    {
        return view('peminjaman.riwayat_peminjaman', [
            'riwayat_peminjaman' => Peminjaman::with(['user', 'buku'])->get()
        ]);
    }
}