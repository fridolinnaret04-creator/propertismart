<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color:#004080;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th {
            background: #004080;
            color: white;
            padding: 8px;
            text-align: center;
        }

        td {
            padding: 8px;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <h2>Laporan Data Transaksi Properti</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Properti</th>
                <th>Pembeli</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($transactions as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->category->nama }}</td>
                    <td>{{ $t->nama_pembeli }}</td>
                    <td>{{ $t->no_hp }}</td>
                    <td>{{ $t->alamat }}</td>
                    <td>Rp {{ number_format($t->harga, 0, ',', '.') }}</td>
                    <td>{{ $t->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
