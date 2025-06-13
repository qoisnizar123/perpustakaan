@extends('layouts.layouts')

@section('title', 'Dashboard')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.0/font/bootstrap-icons.css" rel="stylesheet" />

    <h1 class="mb-4 fw-bold">👋 Selamat Datang, Admin</h1>

    <div class="row">
        @foreach([
            ['books', 'bi-journal-bookmark-fill', 'Buku', $buku, 'bg-primary'],
            ['category', 'bi-tags-fill', 'Kategori', $kategori, 'bg-success'],
            ['user', 'bi-people-fill', 'Pengguna', $user, 'bg-warning']
        ] as [$class, $icon, $label, $count, $bg])
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <div class="rounded-circle {{ $bg }} text-white d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                <i class="bi {{ $icon }} fs-3"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">{{ $label }}</h5>
                            <h3 class="card-text fw-bold">{{ $count }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
