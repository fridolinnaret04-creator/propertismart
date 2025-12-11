<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id        = $_POST['id_kategori'];
    $nama      = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
    $desk      = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $harga     = mysqli_real_escape_string($koneksi, $_POST['harga']);

    // Ambil data lama
    $old = mysqli_query($koneksi, "SELECT foto FROM kategori WHERE id_kategori='$id'");
    $oldData = mysqli_fetch_assoc($old);
    $foto_lama = $oldData['foto'];
    $foto_baru = $foto_lama;

    // Jika upload foto baru
    if (!empty($_FILES['foto']['name'])) {

        // Hapus foto lama
        if ($foto_lama != "" && file_exists("../img_categories/$foto_lama")) {
            unlink("../img_categories/$foto_lama");
        }

        // Upload foto baru
        $nama_file = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "../img_categories/" . $nama_file);

        $foto_baru = $nama_file;
    }

    // Update database
    $sql = "UPDATE kategori SET 
              nama_kategori='$nama',
              deskripsi='$desk',
              harga='$harga',
              foto='$foto_baru'
            WHERE id_kategori='$id'";

    mysqli_query($koneksi, $sql);

    header("Location: categories.php");
    exit();
}
?>
