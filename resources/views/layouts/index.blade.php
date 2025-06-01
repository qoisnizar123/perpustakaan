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
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakaan</a>
            </div>
        </nav>

        <div class="body-content flex-grow-1">
            <div class="row g-0 h-100">
                <!-- Sidebar -->
                <div class="sidebar col-12 col-lg-2 p-3 d-flex flex-column collapse d-lg-block show" id="sidebarMenu">
                    <a href="{{ url('dashboard') }}"
                        class="{{ request()->route()->uri == 'dashboard' ? 'active' : '' }}">Beranda</a>
                    <a href="{{ url('buku') }}"
                        class="{{ request()->route()->uri == 'buku' ? 'active' : '' }}">Buku</a>
                    <a href="{{ url('kategori') }}"
                        class="{{ request()->route()->uri == 'kategori' ? 'active' : '' }}">Kategori</a>
                    <a href="{{ url('user') }}"
                        class="{{ request()->route()->uri == 'user' ? 'active' : '' }}">Anggota</a>
                    <a href="{{ url('peminjaman') }}"
                        class="{{ request()->route()->uri == 'peminjaman' ? 'active' : '' }}">Peminjaman</a>
                </div>

                <!-- Main Content -->
                <div class="content p-4 col-12 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
