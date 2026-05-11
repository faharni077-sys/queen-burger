<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Queen Burger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #120f0f; color: white; }
        .navbar { background-color: #1b1b18; border-bottom: 2px solid #E18720; padding: 15px 50px; }
        .burger-card { background-color: #1b1b18; border: 1px solid #444; border-radius: 15px; }
        .btn-orange { background-color: #E18720; color: white; font-weight: bold; border: none; }
        .modal-content { background-color: #1b1b18; border: 2px solid #E18720; color: white; }
        .form-control, .form-select { background-color: #2a2a2a; border: 1px solid #444; color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="/" class="logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('assets/images/burgerlogokecil.png') }}" alt="Logo" class="me-2" style="height: 30px; width: auto;">
              <span>QUEEN BURGER</span>
            </a>
            <div class="ms-auto">
                <a class="text-white mx-3 text-decoration-none fw-bold" href="/">HOME</a>
                <a class="text-white mx-3 text-decoration-none fw-bold" href="/cart">KERANJANG</a>
                <a class="text-danger mx-3 text-decoration-none fw-bold" href="/logout">LOGOUT</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-5 fw-bold" <span style="color: #E18720;">PILIH <span style="color: #E18720;">BURGERMU</span></h2>
        <div class="row">
            @foreach($burgers as $burger)
            <div class="col-md-4 mb-4">
                <div class="card burger-card p-3 h-100 text-center shadow">
                    <img src="{{ asset('assets/images/' . $burger->gambar) }}" class="card-img-top mb-3" style="height: 200px; object-fit: cover;">
                    <h4 class="fw-bold text-white">{{ $burger->nama_burger }}</h4>
                    <p class="text-warning fw-bold">Rp {{ number_format($burger->harga) }}</p>
                    <button class="btn btn-orange w-100" data-bs-toggle="modal" data-bs-target="#modal{{ $burger->id }}">ORDER SEKARANG</button>
                </div>
            </div>

            <div class="modal fade" id="modal{{ $burger->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="/cart" method="POST" class="modal-content">
                        @csrf
                        <div class="modal-header border-secondary">
                            <h5 class="modal-title">Custom {{ $burger->nama_burger }}</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="nama_burger" value="{{ $burger->nama_burger }}">
                            <input type="hidden" name="total_harga" id="hiddenTotal{{ $burger->id }}" value="{{ $burger->harga }}">

                            <label class="small mb-2">Pilih Jenis Roti</label>
                            <select name="roti" id="roti{{ $burger->id }}" class="form-select mb-3" onchange="hitungTotal({{ $burger->id }}, {{ $burger->harga }})">
                                <option value="0">Roti Biasa (Gratis)</option>
                                <option value="3000">Roti Brioche (+3.000)</option>
                                <option value="5000">Roti Kentang (+5.000)</option>
                            </select>

                            <label class="small mb-2">Extra Topping (Input Kemauan Pelanggan)</label>
                            <div class="d-flex align-items-center mb-2 justify-content-between bg-dark p-2 rounded">
                                <span>Extra Cheese (+5k)</span>
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="kurang('keju', {{ $burger->id }}, {{ $burger->harga }})">-</button>
                                    <span class="mx-2" id="qtyKeju{{ $burger->id }}">0</span>
                                    <input type="hidden" name="cheese_qty" id="valKeju{{ $burger->id }}" value="0">
                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="tambah('keju', {{ $burger->id }}, {{ $burger->harga }})">+</button>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3 justify-content-between bg-dark p-2 rounded">
                                <span>Double Patty (+10k)</span>
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="kurang('patty', {{ $burger->id }}, {{ $burger->harga }})">-</button>
                                    <span class="mx-2" id="qtyPatty{{ $burger->id }}">0</span>
                                    <input type="hidden" name="patty_qty" id="valPatty{{ $burger->id }}" value="0">
                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="tambah('patty', {{ $burger->id }}, {{ $burger->harga }})">+</button>
                                </div>
                            </div>

                            <hr>
                            <label class="small mb-2">Sayur & Saus Gratis</label>
                            <div class="row px-2">
                                <div class="col-6"><input type="checkbox" name="request[]" value="Tomat"> Tomat</div>
                                <div class="col-6"><input type="checkbox" name="request[]" value="Selada"> Selada</div>
                                <div class="col-6"><input type="checkbox" name="request[]" value="Extra Sauce"> Extra Sauce</div>
                            </div>

                            <hr>
                            <label class="small mb-2">Catatan Khusus (Request Spesial)</label>
                            <textarea name="catatan" class="form-control" placeholder="Contoh: Sayurnya sedikit aja, jangan pakai bawang bombay"></textarea>

                            <h4 class="text-warning fw-bold mt-4">Total: Rp <span id="textTotal{{ $burger->id }}">{{ number_format($burger->harga) }}</span></h4>
                        </div>
                        <div class="modal-footer border-secondary">
                            <button type="submit" class="btn btn-orange w-100">TAMBAH KE KERANJANG</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function hitungTotal(id, hargaAwal) {
            let roti = parseInt(document.getElementById('roti' + id).value);
            let keju = parseInt(document.getElementById('qtyKeju' + id).innerText) * 5000;
            let patty = parseInt(document.getElementById('qtyPatty' + id).innerText) * 10000;
            
            let total = hargaAwal + roti + keju + patty;
            document.getElementById('textTotal' + id).innerText = total.toLocaleString();
            document.getElementById('hiddenTotal' + id).value = total;
        }

        function tambah(item, id, hargaAwal) {
            let el = (item === 'keju') ? 'qtyKeju' + id : 'qtyPatty' + id;
            let hidden = (item === 'keju') ? 'valKeju' + id : 'valPatty' + id;
            let qty = parseInt(document.getElementById(el).innerText) + 1;
            document.getElementById(el).innerText = qty;
            document.getElementById(hidden).value = qty;
            hitungTotal(id, hargaAwal);
        }

        function kurang(item, id, hargaAwal) {
            let el = (item === 'keju') ? 'qtyKeju' + id : 'qtyPatty' + id;
            let hidden = (item === 'keju') ? 'valKeju' + id : 'valPatty' + id;
            let qty = parseInt(document.getElementById(el).innerText);
            if (qty > 0) {
                qty--;
                document.getElementById(el).innerText = qty;
                document.getElementById(hidden).value = qty;
                hitungTotal(id, hargaAwal);
            }
        }
    </script>
</body>
</html>