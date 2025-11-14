<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - PropertiSmart</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- HEADER -->
<header class="auth-header">
  <div class="logo">
    <img src="assets/logo.png" width="40" style="margin-right:10px;"> PropertiSmart
  </div>

  <nav>
    <a href="index.php">Dashboard</a>
  </nav>
</header>

<!-- FORM LOGIN -->
<div class="auth-container">
  <div class="auth-box">
    <h2>Login Akun</h2>

    <form action="login-proses.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>

      <button type="submit">Login</button>

      <p class="auth-link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </form>
  </div>
</div>

<style>
.auth-container {
  display: flex;
  justify-content: center;
  margin-top: 80px;
}

.auth-box {
  width: 380px;
  padding: 25px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  text-align: center;
}

.auth-box input {
  width: 100%;
  padding: 12px;
  margin-top: 12px;
  border-radius: 8px;
  border: 1px solid #ccc;
}

.auth-box button {
  width: 100%;
  padding: 12px;
  margin-top: 20px;
  border: none;
  background: #004080;
  color: white;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
}

.auth-box button:hover {
  background: #003060;
}

.auth-link {
  margin-top: 15px;
}
</style>

</body>
</html>
