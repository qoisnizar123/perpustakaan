<div class="list-group list-group-flush bg-light rounded shadow-sm p-3">

    @if(Auth::user())
        @if(Auth::user()->role_id == 1)
            <!-- Admin Links -->
            <div class="mb-3 text-uppercase fw-bold text-secondary small">Admin Panel</div>
            <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('dashboard') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-speedometer2 fs-5"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('buku') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('buku') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-book fs-5"></i>
                <span>Manajemen Buku</span>
            </a>
            <a href="{{ url('kategori') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('kategori') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-tags fs-5"></i>
                <span>Kategori Buku</span>
            </a>
            <a href="{{ url('pengguna') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('pengguna') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-people fs-5"></i>
                <span>Manajemen Pengguna</span>
            </a>
            <a href="{{ url('riwayat_peminjaman') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('riwayat_peminjaman') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-clock-history fs-5"></i>
                <span>Riwayat Peminjaman</span>
            </a>
            <a href="/peminjaman_buku" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('peminjaman_buku') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-journal-arrow-down fs-5"></i>
                <span>Proses Peminjaman</span>
            </a>
            <a href="/pengembalian_buku" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('pengembalian_buku') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-journal-arrow-up fs-5"></i>
                <span>Proses Pengembalian</span>
            </a>
        @else
            <!-- User Links -->
            <div class="mb-3 text-uppercase fw-bold text-secondary small">Pengguna</div>
            <a href="/daftar_buku" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('daftar_buku') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-book fs-5"></i>
                <span>Daftar Buku</span>
            </a>
            
            <a href="{{ url('profile') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded {{ request()->is('profile') ? 'active bg-primary text-white' : 'text-dark' }}" style="transition: background-color 0.3s;">
                <i class="bi bi-journal-check fs-5"></i>
                <span>Peminjaman Saya</span>
            </a>
        @endif

        <div class="mt-4 pt-3 border-top">
            <a href="/logout" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded text-danger fw-semibold hover-danger" style="transition: background-color 0.3s;">
                <i class="bi bi-box-arrow-left fs-5"></i>
                <span>Keluar</span>
            </a>
        </div>

    @else
        <a href="/login" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded text-primary" style="transition: background-color 0.3s;">
            <i class="bi bi-box-arrow-in-right fs-5"></i>
            <span>Masuk</span>
        </a>
        <a href="/register" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 px-3 rounded text-success" style="transition: background-color 0.3s;">
            <i class="bi bi-person-plus fs-5"></i>
            <span>Daftar Akun</span>
        </a>
    @endif
</div>

<style>
    .list-group-item:hover {
        background-color: #e7f1ff !important;
        cursor: pointer;
    }
    .hover-danger:hover {
        background-color: #f8d7da !important;
        color: #842029 !important;
    }
</style>
