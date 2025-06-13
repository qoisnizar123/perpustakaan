@extends('layouts.layouts')

@section('title', 'Pengguna')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Daftar Pengguna</h1>
            <a href="pengguna_terdaftar" class="btn btn-success">
                <i class="bi bi-person-plus-fill me-1"></i> Pengguna Baru
            </a>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th><i class="bi bi-person-fill me-1"></i>Username</th>
                            <th><i class="bi bi-telephone-fill me-1"></i>Telepon</th>
                            <th class="text-center"><i class="bi bi-gear-fill me-1"></i>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->no_telepon }}</td>
                                <td class="text-center">
                                    <a href="detail_pengguna/{{ $user->id }}" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-info-circle-fill me-1"></i>Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @if($users->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada pengguna terdaftar.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
