<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Transaksi Properti</title>
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
    header nav a { color:white; margin:0 6px; text-decoration:none; }
    main {
      padding: 20px;
      max-width: 800px;
      margin: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    tr:hover { background-color: #f1f1f1; }
    .btn {
      display: inline-block;
      background-color: #007bff;
      color: white;
      padding: 8px 14px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 15px;
    }
    .btn:hover { background-color: #0056b3; }
    form {
      margin-top: 20px;
      background: white;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    input, select {
      margin: 5px;
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <header>
    <h1>Data Transaksi Properti</h1>
    <nav>
      <a href="../admin.php">Dashboard</a> |
      <a href="../categories/categories.php">Kategori</a>
    </nav>
  </header>

  <main>
    <table id="tabelTransaksi">
      <thead>
        <tr>
          <th>ID Transaksi</th>
          <th>Nama Properti</th>
          <th>Pembeli</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <form id="formTransaksi">
      <h3>Tambah Transaksi Baru</h3>
      <input type="text" id="idTransaksi" placeholder="ID Transaksi (cth: TRX003)" required>
      <input type="text" id="namaProperti" placeholder="Nama Properti" required>
      <input type="text" id="pembeli" placeholder="Nama Pembeli" required>
      <select id="status">
        <option value="Proses">Proses</option>
        <option value="Selesai">Selesai</option>
      </select>
      <button type="submit" class="btn">Tambah Transaksi</button>
    </form>

    <a href="../admin.php" class="btn">Kembali ke Dashboard</a>
  </main>

  <script>
    const key = "data_transaksi";

    function loadTransaksi() {
      const data = JSON.parse(localStorage.getItem(key)) || [];
      const tbody = document.querySelector("#tabelTransaksi tbody");
      tbody.innerHTML = "";

      data.forEach(item => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${item.id}</td>
          <td>${item.namaProperti}</td>
          <td>${item.pembeli}</td>
          <td>${item.status}</td>
        `;
        tbody.appendChild(row);
      });
    }

    document.getElementById("formTransaksi").addEventListener("submit", (e) => {
      e.preventDefault();

      const id = document.getElementById("idTransaksi").value.trim();
      const namaProperti = document.getElementById("namaProperti").value.trim();
      const pembeli = document.getElementById("pembeli").value.trim();
      const status = document.getElementById("status").value;

      if (!id || !namaProperti || !pembeli) {
        alert("Harap isi semua kolom!");
        return;
      }

      const transaksiBaru = { id, namaProperti, pembeli, status };
      const data = JSON.parse(localStorage.getItem(key)) || [];
      data.push(transaksiBaru);
      localStorage.setItem(key, JSON.stringify(data));

      loadTransaksi();
      e.target.reset();
    });

    if (!localStorage.getItem(key)) {
      const dataAwal = [
        { id: "TRX001", namaProperti: "Rumah Sejahtera", pembeli: "Budi", status: "Selesai" },
        { id: "TRX002", namaProperti: "Apartemen Indah", pembeli: "Sari", status: "Proses" }
      ];
      localStorage.setItem(key, JSON.stringify(dataAwal));
    }

    window.addEventListener("DOMContentLoaded", loadTransaksi);
  </script>
</body>
</html>
