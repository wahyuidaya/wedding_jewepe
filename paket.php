<?php
include 'koneksi_db.php';
$paket = mysqli_query($conn,"SELECT * FROM tb_catalogues WHERE status_publish='Y' ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Paket Wedding</title>
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
    <h2 class="section-title">Daftar Paket Wedding</h2>
    <div class="container paket-grid">
      <?php while($row=mysqli_fetch_assoc($paket)){ ?>
      <div class="paket-card">
        <img src="uploads/<?php echo $row['image']; ?>">
        <h4><?php echo $row['package_name']; ?></h4>
        <p>Rp <?php echo number_format($row['price'],0,',','.'); ?></p>
        <a href="detail.php?id=<?php echo $row['catalogue_id']; ?>" class="btn">Detail</a>
      </div>
      <?php } ?>
    </div>
  </section>
</body>
</html>
