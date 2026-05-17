<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Queen Burger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #120f0f; color: white; }
        .navbar { background-color: #1b1b18; border-bottom: 2px solid #E18720; padding: 15px 50px; }
        .table { color: white; border-color: #444; }
        .btn-checkout { background-color: #E18720; color: white; font-weight: bold; width: 100%; border-radius: 10px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span style="color:#E18720; font-weight:bold; font-size:22px;">QUEEN R BURGER</span>
            <div class="ms-auto">
                <a class="text-white mx-3 text-decoration-none fw-bold" href="/menu">MENU</a>
                <a class="text-danger mx-3 text-decoration-none fw-bold" href="/logout">LOGOUT</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4 fw-bold"><span style="color: #E18720;">KERANJANG</span> BELANJA</h2>

        <div class="row">
            <div class="col-md-8">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Burger</th>
                            <th>Custom</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalSemua = 0; @endphp
                        
                        @forelse($carts as $item)
                        @php $totalSemua += $item->total_harga; @endphp
                        <tr>
                            <td><strong>{{ $item->nama_burger }}</strong></td>
                            <td class="small">
                                Roti: {{ $item->roti }} <br>
                                Keju: {{ $item->cheese_qty }}, Patty: {{ $item->patty_qty }} <br>
                                <span class="text-secondary italic">{{ $item->catatan }}</span>
                            </td>
                            <td>Rp {{ number_format($item->total_harga) }}</td>
                            <td>
                                <form action="{{ route('cart.delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Cancel</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Keranjang masih kosong, ayo pesan!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <div class="card bg-dark border-warning p-3 text-white">
    <h5 class="fw-bold border-bottom pb-2">Ringkasan Harga</h5>
    
    <div class="d-flex justify-content-between mt-3">
        <span>Total Awal:</span>
        <span>Rp {{ number_format($totalSemua) }}</span>
    </div>

    @if($totalSemua >= 50000)
        @php 
            $diskon = $totalSemua * 0.10; // Diskon 10%
            $totalAkhir = $totalSemua - $diskon;
        @endphp
        <div class="d-flex justify-content-between text-success small">
            <span>Diskon Promo (10%):</span>
            <span>-Rp {{ number_format($diskon) }}</span>
        </div>
    @else
        @php $totalAkhir = $totalSemua; @endphp
    @endif

    <hr>
    <div class="d-flex justify-content-between">
        <span>Total Bayar:</span>
        <h4 class="text-warning fw-bold">Rp {{ number_format($totalAkhir) }}</h4>
    </div>
    <hr>
    <a href="/checkout" class="btn btn-checkout py-2">LANJUT KE PEMBAYARAN</a>
</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>