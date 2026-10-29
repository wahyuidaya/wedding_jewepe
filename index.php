<?php
include 'koneksi_db.php';
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tb_settings LIMIT 1"));
$paket = mysqli_query($conn,"SELECT * FROM tb_catalogues WHERE status_publish='Y' ORDER BY created_at DESC LIMIT 3");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $setting['website_name']; ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="logo"><?php echo $setting['website_name']; ?></div>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="paket.php">Paket</a>
      <a href="kontak.php">Kontak</a>
      <a href="admin/login.php" class="btn-nav">Login</a>
    </nav>
    <button class="hamburger" onclick="toggleMobileMenu()" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="mobile-menu" id="mobileMenu">
    <button class="close-btn" onclick="toggleMobileMenu()">&times;</button>
    <a href="index.php" onclick="toggleMobileMenu()">Beranda</a>
    <a href="paket.php" onclick="toggleMobileMenu()">Paket</a>
    <a href="kontak.php" onclick="toggleMobileMenu()">Kontak</a>
    <a href="admin/login.php" onclick="toggleMobileMenu()">Login</a>
  </div>
  <script>function toggleMobileMenu(){ document.getElementById("mobileMenu").classList.toggle("open"); }</script>

  <!-- Hero -->
  <div class="hero" style="background:url('uploads/<?php echo $setting['logo']; ?>') center/cover no-repeat;">
    <div>
      <h1>Selamat Datang di <?php echo $setting['website_name']; ?></h1>
    </div>
  </div>

  <!-- Paket Wedding -->
  <section>
    <h2 class="section-title">Paket Wedding</h2>
    <div class="container paket-grid">
      <?php while($row=mysqli_fetch_assoc($paket)){ ?>
      <div class="paket-card">
        <img src="uploads/<?php echo $row['image']; ?>" alt="">
        <h4><?php echo $row['package_name']; ?></h4>
        <p>Rp <?php echo number_format($row['price'],0,',','.'); ?></p>
        <a href="detail.php?id=<?php echo $row['catalogue_id']; ?>" class="btn">Detail</a>
      </div>
      <?php } ?>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; <?php echo date('Y'); ?> <?php echo $setting['website_name']; ?> - All Rights Reserved</p>
  </footer>
</body>
</html>
