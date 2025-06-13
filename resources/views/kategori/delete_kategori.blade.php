@extends('layouts.layouts')

@section('title', 'Hapus Kategori')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm border-0 w-50 text-center">
            <div class="card-body p-5">
                <h2 class="mb-4 text-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Yakin ingin menghapus?
                </h2>

                <p class="fs-5">Kategori <strong>"{{ $kategori->kategori }}"</strong> akan dihapus secara permanen.</p>

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="/kategori_destroy/{{ $kategori->id }}" class="btn btn-danger px-4">
                        <i class="bi bi-trash3-fill me-1"></i> Ya, Hapus
                    </a>
                    <a href="/kategori" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-left-circle me-1"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
