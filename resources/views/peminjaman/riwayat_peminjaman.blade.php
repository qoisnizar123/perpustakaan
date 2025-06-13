@extends('layouts.layouts')

@section('title', 'Riwayat Peminjaman')

@section('content')
    <h1>Daftar Riwayat Peminjaman</h1>

    <div class="mt-5">
        <x-Riwayatpeminjaman :riwayatpeminjaman='$riwayat_peminjaman' />
    </div>
@endsection
