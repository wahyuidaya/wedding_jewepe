<?php include '_auth.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Pesanan</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style> table{width:100%;border-collapse:collapse;} th,td{padding:8px;border:1px solid #ddd;} th{background:#eee;} </style>
</head>
<body>
<div class="admin-wrapper">
  <?php include '_sidebar.php'; ?>
  <div class="content">
    <h3>Laporan Pesanan</h3>
    <form method="get">
      <label>Dari</label><input type="date" name="dari">
      <label>Sampai</label><input type="date" name="sampai">
      <button type="submit" class="btn-submit">Filter</button>
    </form>
    <br>
    <table>
      <tr><th>No</th><th>Nama</th><th>Paket</th><th>Tanggal</th><th>Status</th><th>Harga</th></tr>
      <?php
      $where="";
      if(!empty($_GET['dari']) && !empty($_GET['sampai'])){
        $where="WHERE o.created_at BETWEEN '{$_GET['dari']}' AND '{$_GET['sampai']}'";
      }
      $q = mysqli_query($conn,"SELECT o.*,c.package_name,c.price FROM tb_order o 
                               LEFT JOIN tb_catalogues c ON o.catalogue_id=c.catalogue_id $where 
                               ORDER BY o.created_at DESC");
      $no=1;$total=0;
      while($row=mysqli_fetch_assoc($q)){
        echo "<tr>
          <td>$no</td>
          <td>{$row['name']}</td>
          <td>{$row['package_name']}</td>
          <td>{$row['wedding_date']}</td>
          <td>{$row['status']}</td>
          <td>Rp ".number_format($row['price'],0,',','.')."</td>
        </tr>";
        $no++;
        $total+=$row['price'];
      }
      ?>
      <tr><td colspan="5"><b>Total</b></td><td><b>Rp <?php echo number_format($total,0,',','.'); ?></b></td></tr>
    </table>
  </div>
</div>
</body>
</html>
