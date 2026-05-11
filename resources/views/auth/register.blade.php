<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Queen Burger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #120f0f; color: white; min-height: 100vh; }
        
        /* NAVBAR STYLE */
        .navbar { padding: 20px 50px; }
        .logo-text { color: #E18720; font-weight: bold; font-size: 20px; }
        .nav-link { color: white !important; font-weight: bold; margin-left: 20px; font-size: 14px; }
        .nav-link:hover { color: #E18720 !important; }

        /* REGISTER CARD STYLE */
        .full-height-center { 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            padding: 40px 0;
        }
        .card-auth { 
            background-color: #1b1b18; 
            border: 2px solid #E18720; 
            border-radius: 20px; 
            overflow: hidden; 
            width: 100%; 
            max-width: 900px; 
        }
        .btn-orange { 
            background-color: #E18720; 
            color: white; 
            border: none; 
            padding: 12px; 
            border-radius: 10px; 
            width: 100%; 
            font-weight: bold; 
        }
        .form-control { background-color: #252522; border: 1px solid #444; color: white; }
        .form-control:focus { background-color: #252522; color: white; border-color: #E18720; box-shadow: none; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="logo-text">QUEEN BURGER</span>
            <div class="ms-auto">
                <a class="nav-link d-inline" href="/">RUMAH</a>
                <a class="nav-link d-inline" href="#">TENTANG</a>
                <a class="nav-link d-inline" href="#">MENU</a>
                <a class="nav-link d-inline" href="/login">LOGIN</a>
            </div>
        </div>
    </nav>

    <div class="container full-height-center">
        <div class="card-auth shadow-lg">
            <div class="row g-0">
                <div class="col-md-6 d-none d-md-block">
                    <img src="{{ asset('assets/images/burgerterbang.png') }}" style="height: 100%; object-fit: cover; width: 100%;">
                </div>
                <div class="col-md-6" style="padding: 40px;">
                    <h2 style="color:white; font-weight:bold;">DAFTAR</h2>
                    <p class="small text-secondary mb-4">Buat akun untuk mulai menikmati burger kerajaan.</p>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="small mb-1">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Alamat Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="small mb-1">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn-orange">DAFTAR SEKARANG</button>
                        
                        <p class="mt-3 text-center small text-secondary">
                            Sudah punya akun? <a href="/login" class="text-decoration-none" style="color: #E18720;">Login di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>