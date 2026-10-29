<?php
include '_auth.php';
$total_paket = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM tb_catalogues"))[0];
$total_order = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM tb_order"))[0];
$approved    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM tb_order WHERE status='approved'"))[0];
$requested   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM tb_order WHERE status='requested'"))[0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="admin-wrapper">
  <?php include '_sidebar.php'; ?>
  <div class="content">
    <h2>Dashboard</h2>
    <div class="card-info">
      <div class="card-box"><h3><?php echo $total_paket; ?></h3><p>Total Paket</p></div>
      <div class="card-box"><h3><?php echo $total_order; ?></h3><p>Total Pesanan</p></div>
      <div class="card-box"><h3><?php echo $approved; ?></h3><p>Approved</p></div>
      <div class="card-box"><h3><?php echo $requested; ?></h3><p>Requested</p></div>
    </div>
  </div>
</div>
</body>
</html>
