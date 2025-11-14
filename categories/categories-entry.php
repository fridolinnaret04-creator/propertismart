<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kategori</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8fafc;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #004080;
      color: white;
      text-align: center;
      padding: 15px;
    }
    main {
      padding: 20px;
      max-width: 600px;
      margin: auto;
    }
    form {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0 15px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button, .btn-back {
      background-color: #007bff;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      margin-right: 10px;
    }
    button:hover, .btn-back:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <header>
    <h1>Tambah Kategori Properti</h1>
    <nav>
      <a href="../admin.php" style="color:white;">Dashboard</a> |
      <a href="categories.php" style="color:white;">Kategori</a>
    </nav>
  </header>

  <main>
    <form action="categories-proses.php" method="post" id="kategoriForm">
      <label for="nama">Nama Kategori:</label>
      <input type="text" name="nama" id="nama" placeholder="Contoh: Ruko">

      <label for="deskripsi">Deskripsi:</label>
      <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi kategori"></textarea>

      <button type="submit" id="btnSimpan">Simpan</button>
      <a href="categories.php" class="btn-back" id="btnKembali">Kembali</a>
    </form>
  </main>

  <script>
    function showToast(message) {
      alert(message); // simple, tetap unsur lama validasi
    }

    const form = document.getElementById('kategoriForm');
    form.addEventListener('submit', (e) => {
      const nama = document.getElementById('nama').value.trim();
      const deskripsi = document.getElementById('deskripsi').value.trim();

      if (!nama || !deskripsi) {
        e.preventDefault();
        showToast('Harap isi semua kolom!');
      }
    });
  </script>
</body>
</html>
