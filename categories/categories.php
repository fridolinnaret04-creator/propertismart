<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kategori Properti</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    .empty-message {
      text-align: center;
      color: #666;
      font-style: italic;
      margin-top: 10px;
    }
    .btn-clear {
      background: #b71c1c;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn-clear:hover { background: #d32f2f; }
    table tr:hover {
      background-color: #f0f8ff;
      cursor: pointer;
      transition: background 0.3s;
    }
  </style>
</head>
<body>
  <header>
    <h1>Daftar Kategori Properti</h1>
    <nav>
      <a href="../admin.php">Dashboard</a>
      <a href="categories.php">Kategori</a>
      <a href="../transaction/transaction.php">Transaksi</a>
    </nav>
  </header>

  <main>
    <table id="kategoriTable">
      <thead>
        <tr>
          <th>Nama Kategori</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>Rumah</td><td>Hunian keluarga</td></tr>
        <tr><td>Apartemen</td><td>Hunian vertikal</td></tr>
        <tr><td>Tanah</td><td>Lahan untuk investasi</td></tr>
        <tr><td>Ruko</td><td>Tempat usaha sekaligus hunian</td></tr>
      </tbody>
    </table>

    <div style="margin-top:15px;">
      <a href="categories-entry.php" class="btn">+ Tambah Kategori</a>
      <button class="btn-clear" id="clearDataBtn">🗑 Hapus Semua Data Tambahan</button>
    </div>

    <p class="empty-message" id="emptyMessage" style="display:none;">
      Belum ada kategori tambahan yang disimpan.
    </p>
  </main>

  <script>
    const tableBody   = document.querySelector("#kategoriTable tbody");
    const emptyMessage = document.getElementById("emptyMessage");
    const clearBtn     = document.getElementById("clearDataBtn");
    const key          = "properti_kategori";

    const storedData = JSON.parse(localStorage.getItem(key) || "[]");

    if (storedData.length > 0) {
      storedData.forEach(item => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${item.nama}</td>
          <td>${item.deskripsi}</td>
        `;
        tableBody.appendChild(row);
      });
      emptyMessage.style.display = "none";
    } else {
      emptyMessage.style.display = "block";
    }

    tableBody.addEventListener("click", (event) => {
      const clickedRow = event.target.closest("tr");
      if (clickedRow) {
        const nama = clickedRow.cells[0].textContent;
        const deskripsi = clickedRow.cells[1].textContent;
        alert(`📋 Detail Kategori:\n\nNama: ${nama}\nDeskripsi: ${deskripsi}`);
      }
    });

    tableBody.addEventListener("mouseover", (event) => {
      const row = event.target.closest("tr");
      if (row) row.style.backgroundColor = "#e3f2fd";
    });

    tableBody.addEventListener("mouseout", (event) => {
      const row = event.target.closest("tr");
      if (row) row.style.backgroundColor = "";
    });

    clearBtn.addEventListener("click", () => {
      const confirmDelete = confirm("Yakin ingin menghapus semua kategori tambahan?");
      if (confirmDelete) {
        localStorage.removeItem(key);
        alert("✅ Semua kategori tambahan telah dihapus!");
        location.reload();
      } else {
        alert("❌ Penghapusan dibatalkan.");
      }
    });
  </script>
</body>
</html>
