@extends('layouts.layouts')

@section('title', 'Home')

@section('content')

<div class="my-5">
    <div class="row g-4">
        @foreach ($bukus as $buku)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0 rounded-3 book-card">
                    <div class="overflow-hidden" style="aspect-ratio: 3/4;">
                        <img src="{{ asset('storage/cover/' . $buku->cover) }}" 
                             class="card-img-top img-cover" draggable="false" alt="Cover {{ $buku->judul }}">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-subtitle mb-1 text-muted">{{ $buku->kode_buku }}</h6>
                        <h5 class="card-title flex-grow-1">{{ Str::limit($buku->judul, 40) }}</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="badge 
                                {{ $buku->status == 'tersedia' ? 'bg-success' : 'bg-danger' }} text-uppercase fw-semibold">
                                {{ $buku->status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@push('styles')
<style>
    .book-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }
    .img-cover {
        object-fit: cover;
        width: 100%;
        height: 100%;
        user-select: none;
    }
</style>
@endpush
