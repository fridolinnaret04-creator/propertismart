<?php
session_start();
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    echo "<script>alert('Username dan password wajib diisi!'); window.location='login.php';</script>";
    exit;
}

// Ambil data user
$stmt = mysqli_prepare($koneksi, "SELECT id_admin, nama_admin, password FROM admin WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) === 1) {
    mysqli_stmt_bind_result($stmt, $id_admin, $nama_admin, $hash_db);
    mysqli_stmt_fetch($stmt);

    // Cek password
    if (password_verify($password, $hash_db)) {
        $_SESSION['id_admin'] = $id_admin;
        $_SESSION['nama_admin'] = $nama_admin;
        $_SESSION['username'] = $username;

        header("Location: admin.php");
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='login.php';</script>";
    exit;
}
?>
