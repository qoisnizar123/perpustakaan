@extends('layouts.main')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Tambah Kategori Baru</h1>
    <div>
        <form action="#" method="post">
            <div class="mt-5 w-50">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama kategori">
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection