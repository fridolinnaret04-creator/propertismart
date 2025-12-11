<?php
session_start();
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kategori Properti</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    .empty-message { text-align:center; color:#666; font-style:italic; margin-top:10px; }
    .btn-clear { background:#b71c1c; color:white; padding:8px 12px; border-radius:5px; }
    .btn-clear:hover { background:#d32f2f; }
    table tr:hover { background:#f0f8ff; cursor:pointer; }

    /* FOTO */
    .foto-properti {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
  </style>
</head>

<body>

<header>
  <h1>Daftar Kategori Properti</h1>
  <nav>
    <a href="../admin.php">Dashboard</a>
    <a href="categories.php">Kategori</a>
    <a href="../transaction/transaction.php">Transaksi</a>
  </nav>
</header>

<main>

<table id="kategoriTable">
<thead>
  <tr>
    <th>Nama Kategori</th>
    <th>Deskripsi</th>
    <th>Foto</th>
    <th>Aksi</th>
  </tr>
</thead>

<tbody>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
if (mysqli_num_rows($query) == 0) {
    echo "<tr><td colspan='4' style='text-align:center;color:#777;'>Belum ada data kategori</td></tr>";
}
while ($row = mysqli_fetch_assoc($query)) {
?>
<tr>
  <td><?= $row['nama_kategori'] ?></td>

  <td><?= $row['deskripsi'] ?></td>

  <td>
    <?php 
        $filepath = "../img_categories/" . $row['foto'];

        if ($row['foto'] != "" && file_exists($filepath)) {
    ?>
        <img src="<?= $filepath ?>" class="foto-properti" 
             style="width:80px; height:60px; object-fit:cover; border-radius:6px;">
    <?php 
        } else {
            echo "<span style='color:#888;'>(Tidak ada foto)</span>";
        }
    ?>
</td>

  <td>
    <a href="categories-edit.php?id=<?= $row['id_kategori'] ?>" class="btn">Edit</a>
    <a href="categories-delete.php?id=<?= $row['id_kategori'] ?>" 
       class="btn-clear"
       onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a>
  </td>
</tr>
<?php } ?>
</tbody>
</table>

<div style="margin-top:15px;">
  <a href="categories-entry.php" class="btn">+ Tambah Kategori</a>
</div>

</main>

</body>
</html>
