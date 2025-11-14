<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin PropertiSmart</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #f7f9fc;
    }

    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      height: 100%;
      width: 240px;
      background: #004080;
      transition: 0.4s;
      padding-top: 20px;
      color: white;
      box-shadow: 2px 0 8px rgba(0,0,0,0.25);
    }
    .sidebar.active { width: 70px; }

    .logo-details {
      display: flex;
      align-items: center;
      height: 60px;
      padding-left: 20px;
    }
    .logo-details i {
      font-size: 28px;
      margin-right: 10px;
    }
    .logo-details .logo_name {
      font-size: 20px;
      font-weight: bold;
      white-space: nowrap;
    }

    .nav-links { margin-top: 30px; padding-left:0; }
    .nav-links li {
      list-style: none;
      padding: 10px 0;
    }
    .nav-links li a {
      text-decoration: none;
      color: white;
      display: block;
      font-size: 16px;
      padding: 8px 20px;
      border-radius: 8px;
      margin: 0 10px;
      transition: background 0.3s, transform 0.2s;
    }
    .nav-links li a:hover,
    .nav-links li a.active {
      background: rgba(255,255,255,0.2);
      transform: translateX(4px);
    }

    header {
      margin-left: 240px;
      transition: 0.4s;
      background: #004080;
      color: white;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    header.active { margin-left: 70px; }

    .sidebarBtn {
      font-size: 26px;
      cursor: pointer;
    }

    #text {
      font-size: 18px;
      font-weight: bold;
    }

    #date {
      font-size: 14px;
      font-weight: bold;
    }

    main {
      margin-left: 240px;
      padding: 20px;
      transition: 0.4s;
    }
    main.active { margin-left: 70px; }

    section {
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    h2 { color: #004080; margin-top:0; }

    .btn {
      display: inline-block;
      background-color: #008000;
      color: white;
      padding: 10px 16px;
      text-decoration: none;
      border-radius: 6px;
      margin-top: 10px;
      transition: background 0.3s, transform 0.2s;
    }

    .btn:hover {
      background-color: #006600;
      transform: translateY(-1px);
    }
  </style>
</head>

<body>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-home'></i>
      <span class="logo_name">PropertiSmart</span>
    </div>

    <ul class="nav-links">
      <li><a href="admin.php" class="active">Dashboard</a></li>
      <li><a href="categories/categories.php">Kategori</a></li>
      <li><a href="transaction/transaction.php">Transaksi</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>

  <header>
    <i class='bx bx-menu sidebarBtn'></i>
    <span id="text"></span>
    <span id="date"></span>
  </header>

  <main>
    <section>
      <h2>Manajemen Kategori</h2>
      <a href="categories/categories-entry.php" class="btn">Tambah Kategori</a>
    </section>

    <section>
      <h2>Manajemen Transaksi</h2>
      <a href="transaction/transaction.php" class="btn">Lihat Transaksi</a>
    </section>
  </main>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    let header = document.querySelector("header");
    let main = document.querySelector("main");

    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      header.classList.toggle("active");
      main.classList.toggle("active");

      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    };

    function myFunction() {
      const months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
      const days = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];

      let date = new Date();
      let jam = date.getHours();
      let tanggal = date.getDate();
      let hari = days[date.getDay()];
      let bulan = months[date.getMonth()];
      let tahun = date.getFullYear();

      let m = date.getMinutes();
      let s = date.getSeconds();
      if (m < 10) m = "0" + m;
      if (s < 10) s = "0" + s;

      document.getElementById("date").innerHTML =
        `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;

      requestAnimationFrame(myFunction);
    }

    window.onload = function() {
      let jam = new Date().getHours();

      if (jam >= 4 && jam <= 10) {
        document.getElementById("text").innerText = "Selamat Pagi, Admin";
      } else if (jam >= 11 && jam <= 14) {
        document.getElementById("text").innerText = "Selamat Siang, Admin";
      } else if (jam >= 15 && jam <= 18) {
        document.getElementById("text").innerText = "Selamat Sore, Admin";
      } else {
        document.getElementById("text").innerText = "Selamat Malam, Admin";
      }

      myFunction();
    };
  </script>

</body>
</html>
