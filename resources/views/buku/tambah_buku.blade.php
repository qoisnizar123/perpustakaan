@extends('layouts.layouts')

@section('title', 'Tambah Buku')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.0/font/bootstrap-icons.css" rel="stylesheet" />

    <div class="container mt-5">
        <h1 class="mb-4 fw-bold"><i class="bi bi-book-half me-2"></i>Tambah Buku Baru</h1>

        <div class="card shadow-sm w-100 w-md-75 w-lg-50 p-4">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <form action="tambah_buku" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="kode_buku" class="form-label fw-semibold"><i class="bi bi-upc-scan me-1"></i>Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" class="form-control"
                        placeholder="Masukkan kode buku" value="{{ old('kode_buku') }}">
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold"><i class="bi bi-journal-text me-1"></i>Judul Buku</label>
                    <input type="text" name="judul" id="judul" class="form-control"
                        placeholder="Masukkan judul buku" value="{{ old('judul') }}">
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label fw-semibold"><i class="bi bi-image me-1"></i>Cover Buku</label>
                    <input type="file" name="cover" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold"><i class="bi bi-tags me-1"></i>Kategori Buku</label>
                    <select name="kategoris[]" id="kategori" class="form-control select-multiple" multiple>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/buku" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select-multiple').select2({
                placeholder: "Pilih kategori buku",
                width: '100%'
            });
        });
    </script>
@endsection
