<?php
$servername = 'localhost';
$username   = 'root';
$password   = ''; // kosongkan jika tidak pakai password
$database   = 'db_propertismart';

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die('Connection Failed: ' . mysqli_connect_error());
}
?>
