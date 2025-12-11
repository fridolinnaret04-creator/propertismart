<?php
require_once("../dompdf/autoload.inc.php");
include "../koneksi.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// QUERY DATA TRANSAKSI
$data = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");

// HTML UNTUK PDF
$html = '
<h2 style="text-align:center;">LAPORAN DATA TRANSAKSI</h2>
<hr>
<table border="1" width="100%" cellspacing="0" cellpadding="6">
    <tr style="background:#eee;font-weight:bold;">
        <th>ID</th>
        <th>Nama Properti</th>
        <th>Pembeli</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Tanggal</th>
    </tr>
';

while ($row = mysqli_fetch_assoc($data)) {
    $html .= "
    <tr>
        <td>{$row['id_transaksi']}</td>
        <td>{$row['nama_properti']}</td>
        <td>{$row['nama_pembeli']}</td>
        <td>{$row['no_hp']}</td>
        <td>{$row['alamat']}</td>
        <td>{$row['status']}</td>
        <td>{$row['tanggal']}</td>
    </tr>";
}

$html .= "</table>";

// LOAD HTML KE DOMPDF
$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();

// DOWNLOAD FILE
$dompdf->stream("laporan-transaksi.pdf", ["Attachment" => false]);
