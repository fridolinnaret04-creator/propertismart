<?php
include "../koneksi.php";

$id = $_GET['id'];

// Ambil foto lama
$q = mysqli_query($koneksi, "SELECT foto FROM kategori WHERE id_kategori='$id'");
$data = mysqli_fetch_assoc($q);

if ($data['foto'] != "" && file_exists("../img_categories/" . $data['foto'])) {
    unlink("../img_categories/" . $data['foto']);
}

// Hapus data kategori
mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

// kembali ke halaman data
header("Location: categories.php");
exit();
?>
