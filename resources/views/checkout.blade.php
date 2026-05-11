<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #120f0f; color: white; }
        .card-pay { background-color: #1b1b18; border: 1px solid orange; border-radius: 15px; }
        .btn-pay { background-color: orange; color: white; font-weight: bold; width: 100%; border: none; padding: 12px; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="fw-bold mb-4">METODE <span style="color: orange;">PEMBAYARAN</span></h2>
                <div class="card card-pay p-4 text-start">
                    <h5>Total yang harus dibayar:</h5>
                    <h2 class="text-warning fw-bold mb-4">Rp {{ number_format($total) }}</h2>
                    
                    <form action="/bayar" method="POST">
                        @csrf
                        <label class="mb-2">Pilih Bank / E-Wallet</label>
                        <select name="metode_bayar" class="form-select bg-dark text-white border-secondary mb-4" required>
                            <option value="">-- Pilih Pembayaran --</option>
                            <option>Transfer Bank BCA</option>
                            <option>DANA / OVO</option>
                            <option>QRIS</option>
                            <option>Bayar di Kasir (COD)</option>
                        </select>
                        <button type="submit" class="btn-pay">KONFIRMASI PEMBAYARAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>