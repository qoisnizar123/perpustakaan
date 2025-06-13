@extends('layouts.layouts')

@section('title', 'Pengguna Terdaftar')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold"><i class="bi bi-person-plus-fill me-2"></i>Pengguna Baru Mendaftar</h1>
        <a href="/pengguna" class="btn btn-outline-primary">
            <i class="bi bi-check2-circle me-1"></i> Pengguna Disetujui
        </a>
    </div>

    @if($penggunaTerdaftar->isEmpty())
        <div class="alert alert-info text-center">
            Tidak ada pengguna baru yang mendaftar saat ini.
        </div>
    @else
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col" style="width: 5%;">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Telepon</th>
                        <th scope="col" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penggunaTerdaftar as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->no_telepon }}</td>
                            <td>
                                <a href="detail_pengguna/{{ $user->id }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye-fill me-1"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
