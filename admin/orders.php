<?php include '_auth.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Pesanan</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style> table{width:100%;border-collapse:collapse;} th,td{padding:8px;border:1px solid #ddd;} th{background:#eee;} </style>
</head>
<body>
<div class="admin-wrapper">
  <?php include '_sidebar.php'; ?>
  <div class="content">
    <h3>Manajemen Pesanan</h3>
    <table>
      <tr><th>No</th><th>Nama</th><th>Paket</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
      <?php
      $q = mysqli_query($conn,"SELECT o.*,c.package_name FROM tb_order o 
                               LEFT JOIN tb_catalogues c ON o.catalogue_id=c.catalogue_id 
                               ORDER BY o.created_at DESC");
      $no=1;
      while($row=mysqli_fetch_assoc($q)){
        echo "<tr>
          <td>$no</td>
          <td>{$row['name']}</td>
          <td>{$row['package_name']}</td>
          <td>{$row['wedding_date']}</td>
          <td>{$row['status']}</td>
          <td>
            <a href='order_detail.php?id={$row['order_id']}' class='btn-detail'>Detail</a>
            <a href='order_action.php?id={$row['order_id']}&act=approved' class='btn-detail'>Approve</a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </table>
  </div>
</div>
</body>
</html>
