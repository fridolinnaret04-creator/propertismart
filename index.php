<?php
session_start();
include 'koneksi.php';

//
// ================================
// HERO IMAGE OTOMATIS
// ================================
// Mengambil foto pertama dari tabel kategori
$qHero = mysqli_query($koneksi, "SELECT foto FROM kategori ORDER BY id_kategori ASC LIMIT 1");

if (mysqli_num_rows($qHero) > 0) {
    $hero = mysqli_fetch_assoc($qHero);
    // folder img_categories/
    $hero_img = "img_categories/" . $hero['foto'];
} else {
    // bila kategori kosong → default
    $hero_img = "assets/rumah1.png";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PropertiSmart | Dashboard</title>
  <link rel="stylesheet" href="css/style.css">

  <style>
    header {
      background: #004080;
      padding: 12px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }
    header .logo {
      display: flex;
      align-items: center;
      font-size: 22px;
      font-weight: bold;
    }
    header nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
    }
    header nav a:hover { text-decoration: underline; }

    /* ===========================================
       HERO OTOMATIS
    ============================================ */
    .hero {
      background: url("<?= $hero_img ?>") center/cover no-repeat;
      height: 350px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      color: white;
      position: relative;
    }
    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 40, 90, 0.65);
    }
    .hero-content { position: relative; z-index: 2; }
    .hero h1 { font-size: 38px; margin: 0; font-weight: bold; }
    .hero p { margin-top: 8px; font-size: 18px; }

    .property-section {
      padding: 40px 20px;
      max-width: 1200px;
      margin: auto;
    }
    .property-section h2 {
      font-size: 28px;
      color: #004080;
      margin-bottom: 20px;
      text-align: center;
      font-weight: bold;
    }

    .property-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 25px;
    }

    .property-card {
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s ease;
      text-align: center;
    }
    .property-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .property-card h3 { margin: 12px 0; font-size: 20px; color: #004080; }
    .property-card p { padding: 0 10px 10px; font-size: 14px; color: #555; }

    .btn-beli {
      background: #ffb700;
      border: none;
      padding: 8px 15px;
      border-radius: 6px;
      color: black;
      margin-bottom: 15px;
      cursor: pointer;
      font-weight: bold;
    }

    .modal-container {
      display:none;
      position:fixed;
      inset:0;
      background:rgba(0,0,0,0.4);
      justify-content:center;
      align-items:center;
    }
    .modal-box {
      width: 420px;
      background:white;
      padding:20px;
      border-radius:10px;
    }
    .modal-box input, .modal-box textarea {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 15px;
    }
    .btn-close {
      background:red;
      padding:5px 10px;
      color:white;
      float:right;
      cursor:pointer;
    }
  </style>
</head>

<body>

<header>
  <div class="logo">
    <img src="assets/logo.png" width="40" style="margin-right:10px;"> PropertiSmart
  </div>
  <nav>
    <a href="index.php">Dashboard</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<section class="hero">
  <div class="hero-content">
    <h1>Selamat Datang di PropertiSmart</h1>
    <p>Platform pintar untuk mencari & mengelola properti Anda</p>
  </div>
</section>

<section class="property-section">
  <h2>Properti Pilihan</h2>

  <div class="property-grid">
    <?php
      $sql = "SELECT * FROM kategori";
      $result = mysqli_query($koneksi, $sql);

      if (mysqli_num_rows($result) == 0) {
          echo "<h3 style='text-align:center;color:red;'>Belum ada data kategori</h3>";
      }

      while ($row = mysqli_fetch_assoc($result)) {

          // folder img_categories
          $foto = "img_categories/" . $row['foto'];
          $namaPropertiJS = htmlspecialchars($row['nama_kategori'], ENT_QUOTES);

          // FIX HARGA AGAR TIDAK ERROR
          $harga_bersih = preg_replace('/[^0-9]/', '', $row['harga']);
          $harga_int = ($harga_bersih == "") ? 0 : intval($harga_bersih);
          $harga_format = number_format($harga_int, 0, ',', '.');

          echo "
          <div class='property-card'>
              <img src='$foto' alt='Properti'>
              <h3>$row[nama_kategori]</h3>
              <p>$row[deskripsi]</p>
              <p style='font-weight:bold;color:#004080;'>Rp $harga_format</p>

              <button class='btn-beli' onclick='bukaModal(\"$namaPropertiJS\")'>Beli</button>
          </div>
          ";
      }
    ?>
  </div>
</section>

<!-- MODAL BELI -->
<div id="modal" class="modal-container" onclick="tutupModal()">
  <div class="modal-box" onclick="event.stopPropagation()">

    <span class="btn-close" onclick="tutupModal()">X</span>
    <h2>Form Pembelian</h2>

    <form action="transaction/transaction-proses.php" method="POST">

      <label>Nama Properti:</label>
      <input type="text" id="nama_properti" name="nama_properti" readonly required>

      <label>Nama Pembeli:</label>
      <input type="text" name="nama_pembeli" required>

      <label>No HP:</label>
      <input type="text" name="no_hp" required>

      <label>Alamat:</label>
      <textarea name="alamat" rows="3" required></textarea>

      <button type="submit" class="btn-beli" style="width:100%;">Beli Sekarang</button>
    </form>

  </div>
</div>

<script>
function bukaModal(namaProperti) {
  document.getElementById("modal").style.display = "flex";
  document.getElementById("nama_properti").value = namaProperti;
}
function tutupModal() {
  document.getElementById("modal").style.display = "none";
}
</script>

<footer style="text-align:center;padding:20px;color:#555;">
  &copy; 2025 PropertiSmart
</footer>

</body>
</html>
