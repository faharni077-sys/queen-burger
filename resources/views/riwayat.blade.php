<div class="container mt-5">
    <h2 class="text-warning fw-bold">RIWAYAT PESANAN ANDA</h2>
    <table class="table table-dark table-hover mt-4">
        <thead>
            <tr>
                <th>Waktu Pesan</th>
                <th>Menu Burger</th>
                <th>Total Bayar</th>
                <th>Metode</th>
            </tr>
            <div class="container mt-4 text-end">
    <a href="/menu" class="btn btn-warning fw-bold px-4">← KEMBALI KE MENU UTAMA</a>
</div>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                <td>{{ $order->nama_burger }}</td>
                <td>Rp {{ number_format($order->total_harga) }}</td>
                <td><span class="badge bg-info text-dark">{{ $order->metode_bayar }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>