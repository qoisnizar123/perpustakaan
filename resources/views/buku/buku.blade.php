@extends('layouts.main')

@section('title', 'Buku')

@section('content')
    <h1>Daftar Buku</h1>

    <div class="my-5">
        <a href="tambah_buku" class="btn btn-success">Tambah Buku</a>
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Kategori</th>
                    <th>Pengarang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>A001</td>
                    <td>Laravel Untuk Pemula</td>
                    <td>Programming</td>
                    <td>Andi</td>
                    <td>
                        <a href="#" class="btn btn-warning">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection