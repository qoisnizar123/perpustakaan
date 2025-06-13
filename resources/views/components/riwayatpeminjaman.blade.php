<div class="table-responsive shadow rounded">
    <table class="table table-hover align-middle">
        <thead class="table-primary">
            <tr>
                <th scope="col" style="width:5%;">No.</th>
                <th scope="col">Buku</th>
                <th scope="col">Peminjam</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Jatuh Tempo</th>
                <th scope="col">Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayatpeminjaman as $p)
                @php
                    $isLate = $p->tanggal_dikembalikan && $p->jatuh_tempo < $p->tanggal_dikembalikan;
                    $class = $p->tanggal_dikembalikan 
                        ? ($isLate ? 'table-warning' : 'table-success')
                        : '';
                    $statusIcon = $p->tanggal_dikembalikan
                        ? ($isLate ? '<i class="bi bi-x-circle-fill text-danger"></i>' : '<i class="bi bi-check-circle-fill text-success"></i>')
                        : '<i class="bi bi-hourglass-split text-info"></i>';
                    $statusText = $p->tanggal_dikembalikan
                        ? ($isLate ? 'Terlambat' : 'Tepat Waktu')
                        : 'Belum Dikembalikan';
                @endphp
                <tr class="{{ $class }}">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->buku->judul }}</td>
                    <td>{{ $p->user->username }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->jatuh_tempo)->format('d M Y') }}</td>
                    <td>
                        {{ $p->tanggal_dikembalikan ? \Carbon\Carbon::parse($p->tanggal_dikembalikan)->format('d M Y') : '-' }}
                        <br>
                        <small>{!! $statusIcon !!} {{ $statusText }}</small>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted fst-italic">Tidak ada data riwayat peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
