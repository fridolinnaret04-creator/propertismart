<?php
session_start();
include "../koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_kategori'];
    $desk = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $foto = "";

    // Jika ada upload foto
    if (!empty($_FILES['foto']['name'])) {

        // Nama file diacak supaya tidak tabrakan
        $nama_file = time() . "_" . $_FILES['foto']['name'];

        // Simpan ke folder img_categories
        $target = "../img_categories/" . $nama_file;

        // Pindahkan file yang diupload
        move_uploaded_file($_FILES['foto']['tmp_name'], $target);

        // Simpan nama file ke database
        $foto = $nama_file;
    }

    // Query insert
    $sql = "INSERT INTO kategori (nama_kategori, deskripsi, harga, foto, id_admin)
            VALUES ('$nama', '$desk', '$harga', '$foto', '".$_SESSION['id_admin']."')";

    mysqli_query($koneksi, $sql);

    header("Location: categories.php");
    exit();
}
?>
