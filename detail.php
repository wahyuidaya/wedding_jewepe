<?php
include 'koneksi_db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tb_catalogues WHERE catalogue_id='$id'"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $data['package_name']; ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="navbar">
    <div class="logo">Wedding</div>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="paket.php">Paket</a>
      <a href="pesan.php">Pesan</a>
      <a href="kontak.php">Kontak</a>
    </nav>
    <button class="hamburger" onclick="toggleMobileMenu()" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="mobile-menu" id="mobileMenu">
    <button class="close-btn" onclick="toggleMobileMenu()">&times;</button>
    <a href="index.php" onclick="toggleMobileMenu()">Beranda</a>
    <a href="paket.php" onclick="toggleMobileMenu()">Paket</a>
    <a href="pesan.php" onclick="toggleMobileMenu()">Pesan</a>
    <a href="kontak.php" onclick="toggleMobileMenu()">Kontak</a>
  </div>
  <script>function toggleMobileMenu(){ document.getElementById("mobileMenu").classList.toggle("open"); }</script>

  <section>
    <div class="container card">
      <img src="uploads/<?php echo $data['image']; ?>" style="width:100%;border-radius:10px;">
      <h2><?php echo $data['package_name']; ?></h2>
      <p><?php echo $data['description']; ?></p>
      <p><b>Harga:</b> Rp <?php echo number_format($data['price'],0,',','.'); ?></p>
      <a href="pesan.php?catalogue=<?php echo $data['catalogue_id']; ?>" class="btn">Pesan Sekarang</a>
    </div>
  </section>
</body>
</html>
