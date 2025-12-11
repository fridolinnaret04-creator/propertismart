<?php
include "../koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Kategori</title>
</head>
<body>

<h1>Edit Kategori Properti</h1>

<form action="categories-update.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="id_kategori" value="<?= $row['id_kategori'] ?>">

  <label>Nama Kategori:</label>
  <input type="text" name="nama_kategori" value="<?= $row['nama_kategori'] ?>" required>

  <label>Deskripsi:</label>
  <textarea name="deskripsi" required><?= $row['deskripsi'] ?></textarea>

  <label>Harga Properti:</label>
  <input type="text" name="harga" value="<?= $row['harga'] ?>" required>

  <label>Foto Lama:</label><br>
  <?php if ($row['foto'] != "") { ?>
      <img src="../img_categories/<?= $row['foto'] ?>" width="120"><br><br>
  <?php } else { echo "(Tidak ada foto)<br><br>"; } ?>

  <label>Ganti Foto (opsional):</label>
  <input type="file" name="foto" accept="image/*">

  <br><br>
  <button type="submit">Update</button>
  <a href="categories.php">Kembali</a>

</form>

</body>
</html>
