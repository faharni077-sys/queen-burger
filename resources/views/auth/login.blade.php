<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Queen Burger</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #191111;
            height: 100vh;
            margin: 0;
            padding: 0;
            color: white;
        }

        .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding-top: 80px;
        }

        .login-card{
            background-color: #1b1b18;
            border: 2px solid orange;
            border-radius: 20px;
            overflow: hidden;
            width: 850px;
            z-index: 1;
        }

        .burger-img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-area{
            padding: 40px;
        }

        .form-control{
            background-color: #2a2a2a;
            border: none;
            color: white;
        }

        .form-control:focus{
            background-color: #2a2a2a;
            color: white;
            box-shadow: none;
            border: 1px solid orange;
        }

        .btn-login{
            background-color: orange;
            color: white;
            width: 100%;
            border: none;
            padding: 10px;
            border-radius: 10px;
        }

        .btn-login:hover{
            background-color: darkorange;
        }

        a{
            color: orange;
            text-decoration: none;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1b1b18; border-bottom: 2px solid #E18720; padding: 15px 50px;">
    <div class="container-fluid">
        <a href="/" class="logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('assets/images/burgerlogokecil.png') }}" alt="Logo" class="me-2" style="height: 30px; width: auto;">
            <span style="color:#E18720; font-weight:bold; font-size:22px;">QUEEN BURGER</span>
        </a>
        <div class="ms-auto">
            <a class="text-white mx-3 text-decoration-none fw-bold" href="/">HOME</a>
            <a class="text-white mx-3 text-decoration-none fw-bold" href="/about">ABOUT</a>
            <a class="text-white mx-3 text-decoration-none fw-bold" href="#" onclick="alert('Eits! Harus Login dulu bosku kalau mau liat Menu hehe')">MENU</a>
            <a class="text-white mx-3 text-decoration-none fw-bold" href="/register">DAFTAR</a>
        </div>
    </div>
</nav>

<div class="wrapper">
    <div class="login-card">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/burgertangan1.png') }}" class="burger-img">
            </div>
            <div class="col-md-6 form-area">
                <h2 class="mb-4 text-warning">LOGIN</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn-login">LOGIN</button>
                    <p class="mt-3">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>