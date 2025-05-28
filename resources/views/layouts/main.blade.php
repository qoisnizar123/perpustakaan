<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="main d-flex flex-column justify-content-between min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakaan</a>
            </div>
        </nav>

        <div class="body-content flex-grow-1">
            <div class="row g-0 h-100">
                <!-- Sidebar -->
                <div class="sidebar col-12 col-lg-2 p-3 d-flex flex-column">
                    <a href="/" @if (request()->route()->uri == '/') class="active" @endif>Beranda</a>
                    <a href="buku" @if (request()->route()->uri == 'buku') class="active" @endif>Buku</a>
                    <a href="kategori" @if (request()->route()->uri == 'kategori') class="active" @endif>Kategori</a>
                    <a href="user" @if (request()->route()->uri == 'user') class="active" @endif>Anggota</a>
                    <a href="riwayat_peminjaman" @if (request()->route()->uri == 'riwayat_peminjaman') class="active" @endif>Peminjaman</a>
                </div>

                <!-- Main Content -->
                <div class="content p-4 col-12 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
