@extends('layouts.index')

@section('title', 'Kategori')

@section('content')
    <h1>Daftar Kategori</h1>

    <div class="mt-5">
        <a href="tambah_kategori" class="btn btn-success">Tambah Kategori</a>
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Programming</td>
                    <td>
                        <a href="#" class="btn btn-warning">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection