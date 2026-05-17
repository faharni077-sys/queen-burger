<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Queen Burger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #120f0f; color: white; font-family: sans-serif; }
        .navbar { background-color: #1b1b18; border-bottom: 2px solid #E18720; padding: 15px 50px; }
        .history-card { background-color: #1b1b18; border: 2px solid #E18720; border-radius: 15px; padding: 30px; }
        .table-dark { --bs-table-bg: #1b1b18; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg mb-5">
        <div class="container-fluid">
            <a href="/" class="logo d-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets/images/burgerlogokecil.png') }}" alt="Logo" class="me-2" style="height: 30px; width: auto;">
                <span style="color:#E18720; font-weight:bold; font-size:22px;">QUEEN BURGER</span>
            </a>
            <div class="ms-auto">
                <a class="text-white mx-3 text-decoration-none fw-bold" href="/">HOME</a>
                <a class="text-white mx-3 text-decoration-none fw-bold" href="/menu">MENU</a>
                <a class="text-danger mx-3 text-decoration-none fw-bold" href="/logout">LOGOUT</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="history-card shadow-lg">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-warning fw-bold mb-0">RIWAYAT PESANAN ANDA 📜</h2>
                <a href="/menu" class="btn btn-outline-warning fw-bold">← KEMBALI KE MENU</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover align-middle">
                    <thead class="table-warning text-dark">
                        <tr>
                            <th class="py-3">Waktu Pesan</th>
                            <th class="py-3">Menu Burger</th>
                            <th class="py-3">Total Bayar</th>
                            <th class="py-3">Metode</th>
                            <th class="py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->created_at->format('d M Y, H:i') }} WIB</td>
                            <td class="fw-bold text-white">{{ $order->nama_burger }}</td>
                            <td class="text-warning fw-bold">Rp {{ number_format($order->total_harga) }}</td>
                            <td>{{ $order->metode_bayar ?? 'COD' }}</td>
                            <td class="text-center"><span class="badge bg-success px-3 py-2">Selesai</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>