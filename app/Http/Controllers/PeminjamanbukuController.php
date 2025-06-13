<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PeminjamanbukuController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)
            ->where('status', '!=', 'tidak aktif')
            ->get();

        $bukus = Buku::all();

        return view('peminjaman.peminjaman_buku', [
            'users' => $users,
            'bukus' => $bukus
        ]);
    }

    public function store(Request $request)
    {
        $tanggalPinjam = Carbon::now()->toDateString();
        $jatuhTempo = Carbon::now()->addDays(3)->toDateString();

        $buku = Buku::find($request->id_buku);

        if (!$buku || $buku->status !== 'tersedia') {
            Session::flash('message', 'Tidak bisa dipinjam, buku tidak tersedia');
            Session::flash('alert-class', 'alert-danger');
            return redirect('peminjaman_buku');
        }

        DB::beginTransaction();

        Peminjaman::create([
            'id_user' => $request->id_user,
            'id_buku' => $request->id_buku,
            'tanggal_pinjam' => $tanggalPinjam,
            'jatuh_tempo' => $jatuhTempo
        ]);

        $buku->status = 'tidak tersedia';
        $buku->save();

        DB::commit();

        Session::flash('message', 'Peminjaman berhasil');
        Session::flash('alert-class', 'alert-success');
        return redirect('peminjaman_buku');
    }

    public function pengembalianBuku()
    {
        $users = User::where('role_id', '!=', 1)
            ->where('status', '!=', 'tidak aktif')
            ->get();

        $bukus = Buku::all();

        return view('peminjaman.pengembalian_buku', [
            'users' => $users,
            'bukus' => $bukus
        ]);
    }

    public function prosesPengembalian(Request $request)
    {
        $peminjaman = Peminjaman::where('id_user', $request->id_user)
            ->where('id_buku', $request->id_buku)
            ->whereNull('tanggal_dikembalikan')
            ->first();

        if ($peminjaman) {
            $peminjaman->tanggal_dikembalikan = Carbon::now()->toDateString();
            $peminjaman->save();

            $buku = Buku::find($request->id_buku);
            if ($buku) {
                $buku->status = 'tersedia';
                $buku->save();
            }

            Session::flash('message', 'Buku berhasil dikembalikan');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Tidak ada peminjaman yang ditemukan atau buku sudah dikembalikan');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('pengembalian_buku');
    }
}