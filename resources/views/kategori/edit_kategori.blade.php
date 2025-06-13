@extends('layouts.layouts')

@section('title', 'Edit Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">✏️ Edit Kategori</h1>
    </div>

    <div class="card shadow-sm border-0 w-50">
        <div class="card-body">
            <form action="{{ url('edit_kategori/' . $kategori->id) }}" method="post">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold">Nama Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" 
                        placeholder="Masukkan nama kategori" value="{{ old('kategori', $kategori->kategori) }}" required>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url('kategori') }}" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
