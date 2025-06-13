<?php

namespace App\Http\Controllers;

use App\Models\{Buku, Kategori, User};

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'buku' => Buku::count(),
            'kategori' => Kategori::count(),
            'user' => User::count()
        ]);
    }
}