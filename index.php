<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PropertiSmart | Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* HEADER */
    header {
      background: #004080;
      padding: 12px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }

    header .logo {
      display: flex;
      align-items: center;
      font-size: 22px;
      font-weight: bold;
    }

    header nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
    }

    header nav a:hover {
      text-decoration: underline;
    }

    /* HERO */
    .hero {
      background: url("assets/rumah1.png") center/cover no-repeat;
      height: 350px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      color: white;
      position: relative;
    }

    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 40, 90, 0.65);
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero h1 {
      font-size: 38px;
      margin: 0;
      font-weight: bold;
    }

    .hero p {
      margin-top: 8px;
      font-size: 18px;
    }

    /* PROPERTY GRID */
    .property-section {
      padding: 40px 20px;
      max-width: 1200px;
      margin: auto;
    }

    .property-section h2 {
      font-size: 28px;
      color: #004080;
      margin-bottom: 20px;
      text-align: center;
      font-weight: bold;
    }

    .property-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 25px;
    }

    .property-card {
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s ease;
      cursor: pointer;
      text-align: center;
    }

    .property-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .property-card h3 {
      margin: 12px 0;
      font-size: 20px;
      color: #004080;
    }

    .property-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    /* FOOTER */
    footer {
      background: #004080;
      text-align: center;
      padding: 15px;
      color: white;
      margin-top: 40px;
    }
  </style>
</head>

<body>

<header>
  <div class="logo">
    <img src="assets/logo.png" width="40" style="margin-right:10px;"> PropertiSmart
  </div>
  <nav>
    <a href="index.php">Dashboard</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<!-- HERO -->
<section class="hero">
  <div class="hero-content">
    <h1>Selamat Datang di PropertiSmart</h1>
    <p>Platform pintar untuk mencari & mengelola properti Anda</p>
  </div>
</section>

<!-- PROPERTY LIST -->
<section class="property-section">
  <h2>Properti Pilihan</h2>

  <div class="property-grid">

    <div class="property-card">
      <img src="assets/rumah1.png" alt="Rumah Sejahtera">
      <h3>Rumah Sejahtera</h3>
    </div>

    <div class="property-card">
      <img src="assets/thumbnail/apartemen.png" alt="Apartemen Indah">
      <h3>Apartemen Indah</h3>
    </div>

    <div class="property-card">
      <img src="assets/rumah2.png" alt="Villa Harmoni">
      <h3>Villa Harmoni</h3>
    </div>

  </div>
</section>

<footer>
  &copy; 2025 PropertiSmart
</footer>

</body>
</html>
