<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    public function peminjaman()
    {
        return view('peminjaman.index');
    }
}