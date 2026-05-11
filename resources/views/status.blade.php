<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #120f0f; color: white; display: flex; align-items: center; justify-content: center; height: 100vh; font-family: sans-serif; }
        .status-box { background-color: #1b1b18; border: 2px solid orange; padding: 50px; border-radius: 20px; text-align: center; width: 450px; }
        .loader { border: 5px solid #333; border-top: 5px solid orange; border-radius: 50%; width: 60px; height: 60px; animation: spin 1s linear infinite; margin: 30px auto; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        .badge-status { font-size: 1.2rem; padding: 10px 20px; border-radius: 10px; font-weight: bold; }
    </style>
</head>
<body>

    <div class="status-box shadow-lg">
        <h2 class="fw-bold text-warning mb-4">PEMBAYARAN BERHASIL!</h2>
        
        <div id="loading-animation" class="loader"></div>
        
        <p class="mb-2">Status Pesanan:</p>
        <div id="status-text" class="badge-status bg-warning text-dark d-inline-block">
            SEDANG DIMASAK...
        </div>
        
        <p class="small text-secondary mt-4" id="info-text">Mohon tunggu sebentar, koki sedang beraksi!</p>
    </div>

    <script>
        // Ambil elemen teks status
        const statusElement = document.getElementById('status-text');
        const infoElement = document.getElementById('info-text');
        const loader = document.getElementById('loading-animation');

        // Alur Perubahan Status
        setTimeout(() => {
            statusElement.innerText = "MENYIAPKAN BOX...";
            statusElement.className = "badge-status bg-info text-dark d-inline-block";
            infoElement.innerText = "Burger sudah matang, sedang dikemas!";
        }, 3000); // Berubah setelah 3 detik

        setTimeout(() => {
            statusElement.innerText = "PESANAN SIAP!";
            statusElement.className = "badge-status bg-success text-white d-inline-block";
            infoElement.innerText = "Selesai! Kamu akan kembali ke Menu...";
            loader.style.display = "none"; // Hilangkan putaran kalau sudah siap
        }, 6000); // Berubah setelah 6 detik

        // Otomatis pindah ke halaman menu setelah 8 detik
        setTimeout(() => {
            window.location.href = "/menu";
        }, 8500);
    </script>

</body>
</html>