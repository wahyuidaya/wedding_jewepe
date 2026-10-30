<?php
session_start();
include '../koneksi_db.php';

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $pass     = $_POST['password'];

  $query = mysqli_query($conn,"SELECT * FROM tb_users WHERE username='$username' AND password='$pass'");
  $data  = mysqli_fetch_assoc($query);

  if($data){
    $_SESSION['admin'] = $data['user_id'];
    header("Location: dashboard.php");
  } else {
    echo "<script>alert('Login gagal! Username/Password salah');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - Wedding Jewepe</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    body{background:#ecf0f1;}
    .demo-banner{
      background:#1e3a5f;color:#fff;padding:14px 20px;
      text-align:center;font-size:13.5px;line-height:1.7;
    }
    .demo-banner a.back-link{
      display:inline-block;margin-bottom:6px;
      color:#90cdf4;text-decoration:none;font-weight:600;font-size:13px;
    }
    .demo-banner a.back-link:hover{text-decoration:underline;}
    .demo-banner strong{color:#fbd38d;}
    .demo-btn{
      background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);
      color:#fff;padding:6px 16px;border-radius:6px;cursor:pointer;
      font-size:12.5px;font-weight:600;margin-top:8px;transition:background .15s;
    }
    .demo-btn:hover{background:rgba(255,255,255,.22);}
    .login-wrapper{display:flex;justify-content:center;align-items:center;height:calc(100vh - 110px);}
    .login-box{background:#fff;padding:2rem;border-radius:10px;box-shadow:0 2px 6px rgba(0,0,0,.2);width:350px;}
    .login-box h2{text-align:center;margin-bottom:1rem;}
    .login-box input{width:100%;padding:10px;margin-bottom:1rem;border:1px solid #ccc;border-radius:5px;box-sizing:border-box;}
    .btn-submit{width:100%;}
  </style>
</head>
<body>

  <!-- Demo Banner -->
  <div class="demo-banner">
    <div style="margin-bottom: 6px; display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
      <a href="../portal.php" class="back-link" style="color: #6ee7b7; font-weight: 700;">← Kembali ke Portal Wedding Jewepe</a>
      <a href="https://wahyuidaya.github.io" class="back-link">Portofolio Wahyu Idaya ↗</a>
    </div>
    <strong>🔐 Demo Admin — Klik untuk mengisi otomatis:</strong><br>
    <button class="demo-btn" onclick="fillDemo('admin','admin123')">👑 Login sebagai Admin</button>
  </div>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">Wedding Jewepe</div>
    <nav>
      <a href="../index.php">Beranda</a>
      <a href="../paket.php">Paket</a>
      <a href="../pesan.php">Pesan</a>
      <a href="../kontak.php">Kontak</a>
    </nav>
  </div>

  <!-- Form Login -->
  <div class="login-wrapper">
    <div class="login-box">
      <h2>Login Admin</h2>
      <form method="post">
        <input type="text" name="username" id="uname" placeholder="Username" required>
        <input type="password" name="password" id="upass" placeholder="Password" required>
        <button type="submit" name="login" class="btn-submit">Login</button>
      </form>
    </div>
  </div>

  <script>
    window.addEventListener('DOMContentLoaded', function() {
      const p = new URLSearchParams(window.location.search);
      if (p.get('demo') === 'admin') fillDemo('admin', 'admin123');
    });
    function fillDemo(u, p){
      document.getElementById('uname').value = u;
      document.getElementById('upass').value = p;
    }
  </script>
</body>
</html>
