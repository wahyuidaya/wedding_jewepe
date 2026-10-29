<?php
include '_auth.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tb_catalogues WHERE catalogue_id='$id'"));

if(isset($_POST['update'])){
  $name = $_POST['package_name'];
  $desc = $_POST['description'];
  $price = $_POST['price'];
  $status = $_POST['status_publish'];
  $uid = $_SESSION['admin'];
  $now = date('Y-m-d H:i:s');

  $img = $data['image'];
  if($_FILES['image']['name']){
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$img);
  }

  $q = "UPDATE tb_catalogues SET package_name='$name',description='$desc',price='$price',
        status_publish='$status',image='$img',user_id='$uid',updated_at='$now'
        WHERE catalogue_id='$id'";
  mysqli_query($conn,$q);
  header("Location: package.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Paket</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="admin-wrapper">
  <?php include '_sidebar.php'; ?>
  <div class="content">
    <h3>Edit Paket Wedding</h3>
    <form method="post" enctype="multipart/form-data">
      <label>Nama Paket</label>
      <input type="text" name="package_name" value="<?php echo $data['package_name']; ?>" required>
      <label>Deskripsi</label>
      <textarea name="description"><?php echo $data['description']; ?></textarea>
      <label>Harga</label>
      <input type="number" name="price" value="<?php echo $data['price']; ?>" required>
      <label>Status</label>
      <select name="status_publish">
        <option value="Y" <?php if($data['status_publish']=='Y') echo 'selected'; ?>>Aktif</option>
        <option value="N" <?php if($data['status_publish']=='N') echo 'selected'; ?>>Tidak Aktif</option>
      </select>
      <label>Gambar</label>
      <input type="file" name="image">
      <?php if($data['image']) echo "<img src='../uploads/".$data['image']."' width='100'>"; ?>
      <br><br>
      <button type="submit" name="update" class="btn-submit">Simpan</button>
      <a href="package.php" class="btn-cancel">Batal</a>
    </form>
  </div>
</div>
</body>
</html>
