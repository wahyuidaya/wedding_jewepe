<?php
include 'koneksi_db.php';
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tb_settings LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak Kami</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="navbar">
    <div class="logo">Wedding Jewepe</div>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="paket.php">Paket</a>
      <a href="kontak.php">Kontak</a>
      <a href="admin/login.php" class="btn-nav">Login</a>
    </nav>
  </div>

  <section>
    <div class="container card">
      <h3>Kontak Kami</h3>
      <p><b>Alamat:</b> <?php echo $setting['address']; ?></p>
      <p><b>Telepon:</b> <?php echo $setting['phone_number1']; ?> <?php if($setting['phone_number2']) echo "/ ".$setting['phone_number2']; ?></p>
      <p><b>Email:</b> <?php echo $setting['email1']; ?> <?php if($setting['email2']) echo "/ ".$setting['email2']; ?></p>
      <p><b>Instagram:</b> <a href="<?php echo $setting['instagram_url']; ?>"><?php echo $setting['instagram_url']; ?></a></p>
      <p><b>Facebook:</b> <a href="<?php echo $setting['facebook_url']; ?>"><?php echo $setting['facebook_url']; ?></a></p>
      <p><b>Youtube:</b> <a href="<?php echo $setting['youtube_url']; ?>"><?php echo $setting['youtube_url']; ?></a></p>
      <h4>Maps:</h4>
      <div><?php echo $setting['maps']; ?></div>
    </div>
  </section>
</body>
</html>
