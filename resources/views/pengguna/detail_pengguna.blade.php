@extends('layouts.layouts')

@section('title', 'Detail Pengguna')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h1 class="fw-bold"><i class="bi bi-person-badge-fill me-2"></i>Detail Pengguna</h1>
            <a href="/pengguna" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($pengguna->status == 'tidak aktif')
            <div class="mb-4">
                <a href="/pengguna_disetujui/{{ $pengguna->id }}" class="btn btn-info">
                    <i class="bi bi-check-circle me-1"></i> Setujui Pengguna
                </a>
            </div>
        @endif

        <div class="card shadow-sm mb-5" style="max-width: 600px;">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" class="form-control" value="{{ $pengguna->username }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">No Telepon</label>
                    <input type="text" class="form-control" value="{{ $pengguna->no_telepon }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea class="form-control" rows="5" style="resize: none" readonly>{{ $pengguna->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <input type="text" class="form-control 
                        @if($pengguna->status == 'aktif') 
                            text-success border-success 
                        @else 
                            text-danger border-danger 
                        @endif" 
                        value="{{ ucfirst($pengguna->status) }}" readonly>
                </div>
            </div>
        </div>

        <x-Riwayatpeminjaman :riwayatpeminjaman='$riwayat_peminjaman' class="mb-5" />
    </div>
@endsection
