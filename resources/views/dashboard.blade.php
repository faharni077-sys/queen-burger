<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #120f0f; color: white; min-height: 100vh; }
        .navbar { padding: 20px 50px; }
        .logo { color: #E18720; font-weight: bold; font-size: 22px; }
        .nav-link { color: white !important; font-weight: bold; margin-left: 20px; font-size: 14px; }
        .nav-link:hover { color: #E18720 !important; }
        .hero { padding: 100px 0; }
        .btn-custom { background-color: #E18720; color: white; border-radius: 8px; padding: 10px 30px; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="/" class="logo d-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets/images/burgerlogokecil.png') }}" alt="Logo" class="me-2" style="height: 30px; width: auto;">
            <span class="logo">QUEEN BURGER</span>
            </a>
            <div class="ms-auto">
                <a class="nav-link d-inline" href="/">HOME</a>
                <a class="nav-link d-inline" href="/about">ABOUT</a>
                <a class="nav-link d-inline" href="/menu">MENU</a>
                @if(Auth::check())
                    <a class="nav-link d-inline text-danger" href="/logout">LOGOUT</a>
                @else
                    <a class="nav-link d-inline" href="/login">LOGIN</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container hero">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 style="font-size: 45px; font-weight: bold;">Rasakan Keajaiban di <br> <span>Setiap Gigitan</span></h1>
                <p class="text-white my-4">Nikmati harmoni rasa dari perpaduan daging sapi pilihan yang juicy, sayuran organik segar, dan saus rahasia khas <strong>Queen R Burger</strong>. Setiap lapisannya dipanggang dengan cinta untuk memberikan pengalaman makan burger yang tak terlupakan langsung ke meja Anda..</p>
                <a href="/menu" class="btn-custom">LIHAT MENU</a>
                <a href="/menu" class="btn-custom bg-transparent border border-warning ms-3">PESAN</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/images/burgerbesar1.png') }}" alt="Burger" class="img-fluid rounded" style="width: 60%; height: auto; object-fit: cover;">
            </div>
        </div>
    </div>
</body>
</html>