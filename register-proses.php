<?php
session_start();
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Jika bukan request POST → kembali
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Ambil data form
$nama = trim($_POST['nama_admin'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// Validasi
if ($nama === '' || $username === '' || $password === '') {
    echo "<script>alert('Semua field harus diisi!'); window.location='register.php';</script>";
    exit;
}

// Cek apakah username sudah ada
$cek = mysqli_prepare($koneksi, "SELECT id_admin FROM admin WHERE username = ?");
mysqli_stmt_bind_param($cek, "s", $username);
mysqli_stmt_execute($cek);
mysqli_stmt_store_result($cek);

if (mysqli_stmt_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah digunakan!'); window.location='register.php';</script>";
    exit;
}
mysqli_stmt_close($cek);

// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert ke database
$stmt = mysqli_prepare($koneksi,
    "INSERT INTO admin (nama_admin, username, password) VALUES (?, ?, ?)"
);
mysqli_stmt_bind_param($stmt, "sss", $nama, $username, $hash);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    exit;
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_stmt_close($stmt);
?>
