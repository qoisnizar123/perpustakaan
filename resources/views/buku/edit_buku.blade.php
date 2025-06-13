@extends('layouts.layouts')

@section('title', 'Edit Buku')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.0/font/bootstrap-icons.css" rel="stylesheet" />

    <div class="container mt-5">
        <h1 class="fw-bold mb-4"><i class="bi bi-pencil-square me-2"></i>Edit Buku</h1>

        <div class="card shadow-sm p-4 w-100 w-md-75 w-lg-50">
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

            <form action="/edit_buku/{{ $buku->id }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="kode_buku" class="form-label fw-semibold"><i class="bi bi-upc-scan me-1"></i>Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" class="form-control" 
                           value="{{ $buku->kode_buku }}" placeholder="Kode buku">
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold"><i class="bi bi-journal-text me-1"></i>Judul Buku</label>
                    <input type="text" name="judul" id="judul" class="form-control" 
                           value="{{ $buku->judul }}" placeholder="Judul buku">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-image me-1"></i>Cover Baru (Opsional)</label>
                    <input type="file" name="cover" class="form-control">
                    @if($buku->cover)
                        <div class="mt-3">
                            <label class="form-label fw-semibold">Cover Saat Ini:</label>
                            <div>
                                <img src="{{ asset('storage/cover/' . $buku->cover) }}" class="img-thumbnail" width="250px">
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-tags me-1"></i>Kategori</label>
                    <select name="kategoris[]" class="form-control select-multiple" multiple>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" @selected($buku->kategoris->contains($kategori->id))>
                                {{ $kategori->kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3 d-flex justify-content-between">
                    <a href="/buku" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
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
    @endpush
@endsection
