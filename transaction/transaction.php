<?php
session_start();
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Transaksi Properti</title>
  <link rel="stylesheet" href="../css/style.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8fafc;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #004080;
      color: white;
      text-align: center;
      padding: 15px;
    }

    header nav a {
      color:white;
      margin:0 6px;
      text-decoration:none;
    }

    main {
      padding: 20px;
      max-width: 900px;
      margin: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
      font-size: 14px;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:hover { background-color: #f1f1f1; }

    .btn {
      display: inline-block;
      background-color: #007bff;
      color: white;
      padding: 8px 14px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 10px;
    }

    .btn:hover { background-color: #0056b3; }
  </style>
</head>

<body>

<header>
  <h1>Data Transaksi Properti</h1>
  <nav>
    <a href="../admin.php">Dashboard</a> |
    <a href="../categories/categories.php">Kategori</a>
    <a href="transaction-cetak.php" target="_blank" 
   style="background:#004080;color:white;padding:8px 15px;border-radius:5px;text-decoration:none;">
   📄 Cetak PDF
</a>

  </nav>
</header>

<main>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Properti</th>
        <th>Nama Pembeli</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Tanggal</th>
      </tr>
    </thead>

    <tbody>
      <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");

        if (mysqli_num_rows($query) == 0) {
            echo "<tr><td colspan='7' style='text-align:center;color:#777;'>Belum ada transaksi</td></tr>";
        }

        while ($row = mysqli_fetch_assoc($query)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$row[nama_properti]</td>
              <td>$row[nama_pembeli]</td>
              <td>$row[no_hp]</td>
              <td>$row[alamat]</td>
              <td><strong>$row[status]</strong></td>
              <td>$row[tanggal]</td>
            </tr>
            ";
            $no++;
        }
      ?>
    </tbody>
  </table>

  <a href="../admin.php" class="btn">Kembali ke Dashboard</a>

</main>

</body>
</html>
