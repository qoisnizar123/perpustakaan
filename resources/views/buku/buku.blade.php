@extends('layouts.layouts')

@section('title', 'Buku')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">📚 Daftar Buku</h1>
            <a href="tambah_buku" class="btn btn-success btn-lg shadow-sm">
                <i class="bi bi-plus-circle me-2"></i> Tambah Buku
            </a>
        </div>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bukus as $buku)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center fw-semibold">{{ $buku->kode_buku }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>
                                @foreach ($buku->kategoris as $kategori)
                                    <span class="badge bg-primary me-1">{{ $kategori->kategori }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($buku->status === 'Tersedia')
                                    <span class="badge bg-success">{{ $buku->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $buku->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/edit_buku/{{ $buku->id }}" class="btn btn-sm btn-warning me-2">
                                    <i class="bi bi-pencil-square"></i> Ubah
                                </a>
                                <a href="/delete_buku/{{ $buku->id }}" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
