@extends('layouts.layouts')

@section('title', 'Hapus Buku')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.0/font/bootstrap-icons.css" rel="stylesheet" />

    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-100 w-md-75 w-lg-50 text-center">
            <div class="mb-4">
                <i class="bi bi-exclamation-triangle-fill text-danger display-4"></i>
            </div>

            <h3 class="fw-bold text-danger">Yakin ingin menghapus buku ini?</h3>
            <p class="fs-5">"<strong>{{ $buku->judul }}</strong>" akan dihapus secara permanen.</p>

            <div class="mt-4 d-flex justify-content-center gap-3">
                <a href="/buku_destroy/{{ $buku->id }}" class="btn btn-danger px-4">
                    <i class="bi bi-trash-fill me-1"></i> Ya, Hapus
                </a>
                <a href="/buku" class="btn btn-outline-secondary px-4">
                    <i class="bi bi-arrow-left me-1"></i> Batal
                </a>
            </div>
        </div>
    </div>
@endsection
