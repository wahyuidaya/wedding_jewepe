<?php
include 'koneksi_db.php';
$catalogue_id = isset($_GET['catalogue']) ? $_GET['catalogue'] : null;

if(isset($_POST['pesan'])){
  $name  = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date  = $_POST['wedding_date'];
  $cid   = $_POST['catalogue_id'];
  $now   = date('Y-m-d H:i:s');

  $q = "INSERT INTO tb_order(catalogue_id,name,email,phone_number,wedding_date,status,user_id,created_at) 
        VALUES('$cid','$name','$email','$phone','$date','requested','0','$now')";
  mysqli_query($conn,$q);
  echo "<script>alert('Pesanan berhasil!'); window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Pesan</title>
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
    <div class="container card" style="max-width:600px;margin:auto;">
      <h3>Form Pemesanan</h3>
      <form method="post">
        <input type="hidden" name="catalogue_id" value="<?php echo $catalogue_id; ?>">
        <label>Nama</label>
        <input type="text" name="name" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>No HP</label>
        <input type="text" name="phone" required>
        <label>Tanggal Pernikahan</label>
        <input type="date" name="wedding_date" required>
        <button type="submit" name="pesan" class="btn-submit">Pesan</button>
      </form>
    </div>
  </section>
</body>
</html>
