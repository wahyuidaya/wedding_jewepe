<?php
include '_auth.php';
$id = $_GET['id'];

// Ambil data pesanan
$data = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT o.*, c.package_name, c.price, c.image 
    FROM tb_order o
    LEFT JOIN tb_catalogues c ON o.catalogue_id=c.catalogue_id
    WHERE o.order_id='$id'
"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Pesanan</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    .detail-box {background:#fff;padding:20px;border-radius:10px;box-shadow:0 2px 6px rgba(0,0,0,.1);}
    .detail-box img {max-width:250px;border-radius:10px;margin-bottom:1rem;}
    .detail-row {margin:10px 0;}
    .label {font-weight:bold;display:inline-block;width:150px;}
  </style>
</head>
<body>
<div class="admin-wrapper">
  <?php include '_sidebar.php'; ?>
  <div class="content">
    <h3>Detail Pesanan</h3>
    <div class="detail-box">
      <?php if($data['image']){ ?>
        <img src="../uploads/<?php echo $data['image']; ?>" alt="">
      <?php } ?>
      <div class="detail-row"><span class="label">Nama Pemesan:</span> <?php echo $data['name']; ?></div>
      <div class="detail-row"><span class="label">Email:</span> <?php echo $data['email']; ?></div>
      <div class="detail-row"><span class="label">No HP:</span> <?php echo $data['phone_number']; ?></div>
      <div class="detail-row"><span class="label">Tanggal Pernikahan:</span> <?php echo $data['wedding_date']; ?></div>
      <div class="detail-row"><span class="label">Paket:</span> <?php echo $data['package_name']; ?></div>
      <div class="detail-row"><span class="label">Harga:</span> Rp <?php echo number_format($data['price'],0,',','.'); ?></div>
      <div class="detail-row"><span class="label">Status:</span> <?php echo ucfirst($data['status']); ?></div>
      <div class="detail-row"><span class="label">Dibuat pada:</span> <?php echo $data['created_at']; ?></div>
      <div class="detail-row"><span class="label">Update terakhir:</span> <?php echo $data['updated_at']; ?></div>
    </div>
    <br>
    <a href="orders.php" class="btn-submit">Kembali</a>
  </div>
</div>
</body>
</html>
