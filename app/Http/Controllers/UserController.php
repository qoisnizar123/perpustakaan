<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $riwayatpeminjaman = Peminjaman::with(['user', 'buku'])->where('id_user', Auth::user()->id)->get();
        return view('profile.profile', ['riwayat_peminjaman' => $riwayatpeminjaman]);
    }

    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'aktif')->get();
        return view('pengguna.pengguna', ['users' => $users]);
    }

    public function penggunaTerdaftar()
    {
        $penggunaTerdaftar = User::where('status', 'tidak aktif')->where('role_id', 2)->get();
        return view('pengguna.pengguna_terdaftar', ['penggunaTerdaftar' => $penggunaTerdaftar]);
    }

    public function show($id)
    {
        $pengguna = User::where('id', $id)->first();
        $riwayatpeminjaman = Peminjaman::with(['user', 'buku'])->where('id_user', $pengguna->id)->get();
        return view('pengguna.detail_pengguna', ['pengguna' => $pengguna, 'riwayat_peminjaman' => $riwayatpeminjaman]);
    }

    public function approve($id)
    {
        $pengguna = User::where('id', $id)->first();
        $pengguna->status = 'aktif';
        $pengguna->save();

        return redirect('detail_pengguna/'.$id)->with('status', 'Pengguna berhasil disetujui');
    }
}