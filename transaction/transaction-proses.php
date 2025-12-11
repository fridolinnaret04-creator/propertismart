<?php
session_start();
include "../koneksi.php";

// ============================
// VALIDASI DATA POST
// ============================
if (
    !isset($_POST['nama_properti']) ||
    !isset($_POST['nama_pembeli']) ||
    !isset($_POST['no_hp']) ||
    !isset($_POST['alamat'])
) {
    echo "<script>alert('Data transaksi tidak lengkap.'); 
          window.location='../index.php';</script>";
    exit;
}

$nama_properti = trim($_POST['nama_properti']);
$nama_pembeli  = trim($_POST['nama_pembeli']);
$no_hp         = trim($_POST['no_hp']);
$alamat        = trim($_POST['alamat']);


// ============================
// STATUS TRANSAKSI RANDOM
// ============================
$chance = rand(1, 100);

if ($chance <= 60) {
    $status = "sukses";    // 60%
} elseif ($chance <= 90) {
    $status = "pending";   // 30%
} else {
    $status = "gagal";     // 10%
}


// ============================
// INSERT KE TABEL TRANSAKSI
// ============================
// kolom tabel: id_transaksi, nama_properti, nama_pembeli, no_hp, alamat, status, tanggal

$sql = "
INSERT INTO transaksi (nama_properti, nama_pembeli, no_hp, alamat, status, tanggal)
VALUES ('$nama_properti', '$nama_pembeli', '$no_hp', '$alamat', '$status', NOW())
";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
            alert('Transaksi berhasil! Status: $status');
            window.location='transaction.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menyimpan transaksi: " . mysqli_error($koneksi) . "');
            window.location='../index.php';
          </script>";
}

?>
