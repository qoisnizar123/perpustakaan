@extends('layouts.main')

@section('title', 'Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No Telp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Anwar</td>
                    <td>085123456789</td>
                    <td>
                        <a href="#" class="btn btn-primary">Lihat</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection