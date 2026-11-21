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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<style>
.pw-eye-wrap{position:relative;width:100%;display:block;}
.pw-eye-wrap input{width:100% !important;padding-right:42px !important;box-sizing:border-box !important;}
.pw-eye-btn{position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;padding:4px;display:flex;align-items:center;justify-content:center;color:#64748b;z-index:5;}
.pw-eye-btn:hover{color:#1e293b;}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var eyeOpen = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>';
  var eyeClosed = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>';
  document.querySelectorAll('input[type="password"]').forEach(function(inp) {
    if (inp.closest('.pw-eye-wrap')) return;
    var wrap = document.createElement('div');
    wrap.className = 'pw-eye-wrap';
    inp.parentNode.insertBefore(wrap, inp);
    wrap.appendChild(inp);
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'pw-eye-btn';
    btn.setAttribute('aria-label', 'Tampilkan/Sembunyikan Password');
    btn.innerHTML = eyeOpen;
    btn.addEventListener('click', function() {
      var isPw = inp.type === 'password';
      inp.type = isPw ? 'text' : 'password';
      btn.innerHTML = isPw ? eyeClosed : eyeOpen;
    });
    wrap.appendChild(btn);
  });
});
</script>

</body>
</html>

