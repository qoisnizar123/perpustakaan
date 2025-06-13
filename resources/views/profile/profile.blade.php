@extends('layouts.layouts')

@section('title', 'Profile')

@section('content')
<h2>Riwayat Peminjaman Anda</h2>
    <x-Riwayatpeminjaman :riwayatpeminjaman='$riwayat_peminjaman' />
@endsection
