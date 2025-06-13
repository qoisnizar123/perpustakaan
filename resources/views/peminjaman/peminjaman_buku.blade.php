@extends('layouts.layouts')

@section('title', 'Peminjaman Buku')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 shadow p-4 rounded bg-white">
        <h1 class="mb-4 text-center fw-bold">Form Peminjaman Buku</h1>

        @if (session('message'))
            <div class="alert {{ session('alert-class') ?? 'alert-info' }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/peminjaman_buku" method="post" novalidate>
            @csrf

            <div class="mb-4">
                <label for="id_user" class="form-label fw-semibold">Peminjam</label>
                <select name="id_user" id="id_user" class="form-select inputbox @error('id_user') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Peminjam</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('id_user') == $user->id ? 'selected' : '' }}>
                            {{ $user->username }}
                        </option>
                    @endforeach
                </select>
                @error('id_user')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="id_buku" class="form-label fw-semibold">Buku</label>
                <select name="id_buku" id="id_buku" class="form-select inputbox @error('id_buku') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Buku</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ old('id_buku') == $buku->id ? 'selected' : '' }}>
                            {{ $buku->judul }}
                        </option>
                    @endforeach
                </select>
                @error('id_buku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold fs-5">Pinjam Buku</button>
        </form>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.inputbox').select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    placeholder: 'Pilih...',
                    allowClear: true
                });
            });
        </script>
    @endpush
@endsection
