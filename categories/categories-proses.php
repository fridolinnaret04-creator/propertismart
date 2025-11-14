<?php
// PROSES HANYA MENAMPILKAN HASIL INPUT (UNSUR LAMA DIPERTAHANKAN)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama']) && isset($_POST['deskripsi'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    echo "<h2 style='color:green;'>✅ Kategori berhasil ditambahkan!</h2>";
    echo "<p><b>Nama:</b> $nama</p>";
    echo "<p><b>Deskripsi:</b> $deskripsi</p>";
    echo "<p><a href='categories.php'>Kembali ke daftar kategori</a></p>";
} else {
    echo "<p style='color:red;'>⚠️ Tidak ada data yang dikirim. Silakan kembali ke <a href='categories-entry.php'>form kategori</a>.</p>";
}
?>
