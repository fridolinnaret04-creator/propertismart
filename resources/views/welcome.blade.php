<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertiSmart</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        /* NAVBAR */
        .navbar {
            background:#004080;
            color:white;
            padding:15px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .navbar a {
            color:white;
            margin-left:20px;
            text-decoration:none;
            font-weight:600;
        }

        /* HERO HEADER */
        .hero {
            background:url('/assets/bg-home.jpg') center/cover no-repeat;
            height:350px;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            text-align:center;
            background-size:cover;
            position:relative;
        }

        .hero::after {
            content:"";
            position:absolute;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.55);
            top:0;
            left:0;
        }

        .hero-text {
            z-index:2;
        }

        .property-title {
            text-align:center;
            font-size:24px;
            font-weight:600;
            margin-top:40px;
        }

        /* CARD */
        .card-wrapper {
            display:flex;
            justify-content:center;
            gap:30px;
            margin-top:30px;
            flex-wrap:wrap;
        }

        .card {
            width:350px;
            background:white;
            border-radius:10px;
            padding:15px;
            box-shadow:0px 2px 12px rgba(0,0,0,0.15);
            text-align:center;
        }

        .card img {
            width:100%;
            height:200px;
            object-fit:cover;
            border-radius:10px;
        }

        .btn-buy {
            margin-top:12px;
            background:#ffb700;
            color:white;
            padding:10px 20px;
            border-radius:6px;
            cursor:pointer;
            font-weight:bold;
            display:inline-block;
            text-decoration:none;
        }

        /* MODAL */
        .modal-overlay {
            display:none;
            position:fixed;
            top:0; left:0;
            width:100%; height:100%;
            background:rgba(0,0,0,0.6);
            justify-content:center;
            align-items:center;
            z-index:9999;
        }

        .modal-box {
            width:420px;
            background:white;
            padding:25px;
            border-radius:10px;
            animation:fadeIn .2s ease-in-out;
        }

        .modal-box input,
        .modal-box textarea {
            width:100%;
            padding:10px;
            margin-bottom:10px;
            border:1px solid #ccc;
            border-radius:6px;
        }

        .modal-title {
            font-size:20px;
            font-weight:bold;
            color:#004080;
            margin-bottom:15px;
            text-align:center;
        }

        .btn-close {
            background:#333;
            width:100%;
            padding:10px;
            color:white;
            border:none;
            border-radius:6px;
            margin-top:10px;
        }

        @keyframes fadeIn {
            from { opacity:0; transform:scale(.9); }
            to { opacity:1; transform:scale(1); }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div style="font-size:20px;font-weight:600;">PropertiSmart</div>

        <div>
            <a href="/dashboard">Dashboard</a>
            <a href="/register">Register</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <!-- HERO -->
    <div class="hero">
        <div class="hero-text">
            <h1>Selamat Datang di PropertiSmart</h1>
            <p>Platform Pintar untuk mencari & mengelola properti</p>
        </div>
    </div>

    <h3 class="property-title">Properti Pilihan</h3>

    <!-- LIST KATEGORI -->
    <div class="card-wrapper">
        @foreach ($categories as $c)
            <div class="card">
                <img src="{{ asset('assets/thumbnail/'.$c->gambar) }}">

                <h3>{{ $c->nama }}</h3>
                <p>{{ $c->deskripsi }}</p>
                <h4><b>Rp {{ number_format($c->harga,0,',','.') }}</b></h4>

                <button class="btn-buy" onclick="openBuyModal('{{ $c->id_categories }}', '{{ $c->nama }}')">
                    Beli
                </button>
            </div>
        @endforeach
    </div>


    <!-- ============= MODAL PEMBELIAN ============= -->
    <div id="buyModal" class="modal-overlay">
        <div class="modal-box">

            <h3 class="modal-title">Form Pembelian</h3>

            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf

                <input type="hidden" name="id_categories" id="modal_id_categories">

                <label>Nama Properti:</label>
                <input type="text" id="modal_nama_kategori" disabled>

                <label>Nama Pembeli:</label>
                <input type="text" name="nama_pembeli" required>

                <label>No HP:</label>
                <input type="text" name="no_hp" required>

                <label>Alamat:</label>
                <textarea name="alamat" required></textarea>

                <button type="submit" class="btn-buy" style="width:100%;">Beli Sekarang</button>
            </form>

            <button class="btn-close" onclick="closeModal()">Tutup</button>
        </div>
    </div>


    <!-- SCRIPT MODAL -->
    <script>
        function openBuyModal(id, namaKategori) {
            document.getElementById('modal_id_categories').value = id;
            document.getElementById('modal_nama_kategori').value = namaKategori;

            document.getElementById('buyModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('buyModal').style.display = 'none';
        }
    </script>

</body>
</html>
