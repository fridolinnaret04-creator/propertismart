<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Properti</title>

    <style>
        body {
            font-family: Arial;
            background: #f1f5f9;
            margin: 0;
        }

        h1 {
            background: #004080;
            color: white;
            padding: 20px 30px;
            margin: 0;
        }

        .form-container {
            width: 40%;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .btn {
            padding: 10px 22px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-primary {
            background: #0066ff;
            color: white;
        }

        .btn-secondary {
            background: #004080;
            color: white;
            margin-left: 10px;
        }
    </style>
</head>

<body>

<h1>Tambah Kategori Properti</h1>

<div class="form-container">

    <form action="categories-proses.php" method="POST" enctype="multipart/form-data">

        <label>Nama Kategori:</label>
        <input type="text" name="nama_kategori" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" rows="4" required></textarea>

        <label>Harga Properti:</label>
        <input type="text" name="harga" placeholder="Contoh: Rp 850.000.000" required>

        <label>Foto Properti:</label>
        <input type="file" name="foto" accept="image/*" required>

        <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
        <a href="categories.php" class="btn btn-secondary">Kembali</a>

    </form>

</div>

</body>
</html>
