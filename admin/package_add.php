<?php
include '_auth.php';
include '../koneksi_db.php';

if(isset($_POST['save'])){
  $name = $_POST['package_name'];
  $desc = $_POST['description'];
  $price = $_POST['price'];
  $status = $_POST['status_publish'];
  $uid = $_SESSION['admin'];

  $img = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmp,"../uploads/".$img);

  $now = date('Y-m-d H:i:s');
  $q = "INSERT INTO tb_catalogues(package_name,description,price,status_publish,image,user_id,created_at) 
        VALUES('$name','$desc','$price','$status','$img','$uid','$now')";
  mysqli_query($conn,$q);
  header("Location: package.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Paket</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="container" style="max-width:600px;margin:2rem auto;">
  <div class="card">
    <h3>Tambah Paket</h3>
    <form method="post" enctype="multipart/form-data">
      <label>Nama Paket</label>
      <input type="text" name="package_name" required>
      <label>Deskripsi</label>
      <textarea name="description"></textarea>
      <label>Harga</label>
      <input type="number" name="price" required>
      <label>Status</label>
      <select name="status_publish">
        <option value="Y">Aktif</option>
        <option value="N">Tidak Aktif</option>
      </select>
      <label>Gambar</label>
      <input type="file" name="image">
      <button type="submit" name="save" class="btn-submit">Tambah</button>
      <a href="package.php" class="btn-cancel">Batal</a>
    </form>
  </div>
</div>
</body>
</html>
