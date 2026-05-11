<?php

use Illuminate\Support\Facades\Route;
use App\Models\Burger;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 1. HALAMAN AWAL (Lobi Utama) - Bisa dibuka siapa saja
Route::get('/', function () {
    return view('dashboard');
})->name('home');

// 2. DASHBOARD (Sesuai permintaan Breeze)
// Kita arahkan /dashboard ke /menu saja biar simpel
Route::get('/dashboard', function () {
    return redirect('/menu');
})->middleware(['auth'])->name('dashboard');

// 3. HALAMAN MENU (Wajib Login)
Route::get('/menu', function () {
    $burgers = Burger::all();
    return view('welcome', compact('burgers'));
})->middleware('auth')->name('menu');

// 4. LOGIC LOGIN MANUAL
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/menu'); // Arahkan ke menu setelah login
    }

    return back()->withErrors([
        'email' => 'Email atau Password salah, silakan cek kembali.',
    ]);
})->name('login');

// 5. LOGOUT
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/'); // Balik ke lobi utama
})->name('logout');

// Tampilkan halaman Keranjang
Route::get('/cart', function () {
    $carts = \App\Models\Cart::all();
    return view('cart', compact('carts'));
})->middleware('auth')->name('cart');

// Hapus item dari Keranjang (Cancel Order)
Route::delete('/cart/{id}', function ($id) {
    \App\Models\Cart::destroy($id);
    return back();
})->name('cart.delete');

// 6. CART (Tambah Pesanan)
Route::post('/cart', function(Request $request){
    Cart::create($request->all());
    return back();
});

// Halaman Pembayaran
Route::get('/checkout', function () {
    $carts = \App\Models\Cart::all();
    $total = $carts->sum('total_harga');
    return view('checkout', compact('carts', 'total'));
})->middleware('auth');

// Proses Bayar (Simulasi Transaksi Berhasil)
Route::post('/bayar', function (Request $request) {
    // 1. Ambil semua item dari keranjang
    $carts = Cart::all();   
    // 2. Pindahkan tiap item ke tabel Orders menggunakan Looping
    foreach($carts as $item) {
        Order::create([
            'nama_burger' => $item->nama_burger,
            'total_harga' => $item->total_harga,
            // PASTIKAN namanyanya 'metode_bayar' sama dengan name di <select> checkout
            'metode_bayar' => $request->metode_bayar, 
        ]);
    }
    // 3. Kosongkan keranjang
    Cart::truncate(); 
    return view('status');
})->middleware('auth');

// 7. ABOUT
Route::view('/about', 'about')->name('about');

require __DIR__.'/auth.php';