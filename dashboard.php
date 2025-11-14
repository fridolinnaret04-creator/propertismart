<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - PropertiSmart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="margin:0; font-family:Arial, sans-serif; background-color:#f4f4f9;">

    <header style="background-color:#004080; color:white; padding:15px; display:flex; align-items:center; justify-content:space-between;">
        <div style="display:flex; align-items:center;">
            <img src="assets/logo.png" alt="PropertiSmart Logo" width="60" style="margin-right:10px; background:white; padding:5px; border-radius:8px;">
            <h2 style="margin:0;">Dashboard PropertiSmart</h2>
        </div>
        <nav>
            <a href="index.php" style="color:white; text-decoration:none; margin-right:10px;">Beranda</a>
            <a href="login.php" style="color:white; text-decoration:none; background:#e74c3c; padding:8px 12px; border-radius:5px;">Login</a>
        </nav>
    </header>

    <main style="padding:30px;">
        <h3>Selamat Datang, Pengunjung</h3>
        <p>Kelola data properti Anda dengan mudah melalui PropertiSmart.</p>

        <div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:20px;">
            <div style="flex:1; min-width:250px; background:white; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                <img src="assets/rumah1.png" alt="Rumah" width="80">
                <h4>Data Rumah</h4>
                <p>Kelola informasi rumah yang tersedia.</p>
                <button style="padding:8px 12px; background:#27ae60; border:none; color:white; border-radius:5px; cursor:pointer;">Lihat Detail</button>
            </div>

            <div style="flex:1; min-width:250px; background:white; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                <img src="assets/apartemen.png" alt="Apartemen" width="80">
                <h4>Data Apartemen</h4>
                <p>Kelola informasi apartemen yang tersedia.</p>
                <button style="padding:8px 12px; background:#2980b9; border:none; color:white; border-radius:5px; cursor:pointer;">Lihat Detail</button>
            </div>
        </div>
    </main>

    <footer style="background:#004080; color:white; text-align:center; padding:15px; margin-top:40px;">
        <p>&copy; 2025 PropertiSmart</p>
    </footer>

</body>
</html>
