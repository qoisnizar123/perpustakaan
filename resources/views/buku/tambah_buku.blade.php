@extends('layouts.main')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Kategori Baru</h1>
    <div>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Buku:</label>
                <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan Kode Buku">
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku:</label>
                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Buku">
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="Kategori" class="form-control">
                    <option value="">Pilih Kategori</option>
                    <option value="1">Programming</option>
                    <option value="2">Desain</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang:</label>
                <input type="text" name="pengarang" id="pengarang" class="form-control"
                    placeholder="Masukkan Nama Pengarang">
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
