<?php
include '_auth.php';

// Hapus paket
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  mysqli_query($conn,"DELETE FROM tb_catalogues WHERE catalogue_id='$id'");
  header("Location: package.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Paket Wedding</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    table{width:100%;border-collapse:collapse;margin-top:1rem;}
    th,td{padding:10px;border:1px solid #ddd;text-align:left;}
    th{background:#f2f2f2;}
    a.btn-small{padding:5px 10px;background:#3498db;color:#fff;border-radius:5px;}
    a.btn-small:hover{background:#2980b9;}
    .btn-danger{background:#e74c3c !important;}
    .btn-danger:hover{background:#c0392b !important;}
  </style>
</head>
<body>
<div class="admin-wrapper">
  <?php include '_sidebar.php'; ?>
  <div class="content">
    <h3>Manajemen Paket Wedding</h3>
    <a href="package_add.php" class="btn-small">+ Tambah Paket</a>
    <table>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama Paket</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      <?php
      $q = mysqli_query($conn,"SELECT * FROM tb_catalogues ORDER BY created_at DESC");
      $no=1;
      while($row=mysqli_fetch_assoc($q)){
        echo "<tr>
          <td>$no</td>
          <td><img src='../uploads/{$row['image']}' width='80'></td>
          <td>{$row['package_name']}</td>
          <td>Rp ".number_format($row['price'],0,',','.')."</td>
          <td>{$row['status_publish']}</td>
          <td>
            <a href='package_edit.php?id={$row['catalogue_id']}' class='btn-small'>Edit</a>
            <a href='package.php?delete={$row['catalogue_id']}' class='btn-small btn-danger' onclick=\"return confirm('Hapus paket ini?')\">Hapus</a>
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
