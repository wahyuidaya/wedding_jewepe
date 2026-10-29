<?php
include '_auth.php';
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tb_settings LIMIT 1"));

if(isset($_POST['save'])){
  $website = $_POST['website_name'];
  $phone1  = $_POST['phone_number1'];
  $phone2  = $_POST['phone_number2'];
  $email1  = $_POST['email1'];
  $email2  = $_POST['email2'];
  $address = $_POST['address'];
  $maps    = $_POST['maps'];
  $fb      = $_POST['facebook_url'];
  $ig      = $_POST['instagram_url'];
  $yt      = $_POST['youtube_url'];
  $header  = $_POST['header_bussines_hour'];
  $time    = $_POST['time_bussines_hour'];
  $logo    = $data['logo'];

  if($_FILES['logo']['name']){
    $logo = $_FILES['logo']['name'];
    move_uploaded_file($_FILES['logo']['tmp_name'],"../uploads/".$logo);
  }

  $now = date('Y-m-d H:i:s');
  if($data){
    $q = "UPDATE tb_settings SET website_name='$website',phone_number1='$phone1',phone_number2='$phone2',
          email1='$email1',email2='$email2',address='$address',maps='$maps',facebook_url='$fb',
          instagram_url='$ig',youtube_url='$yt',header_bussines_hour='$header',
          time_bussines_hour='$time',logo='$logo',updated_at='$now' WHERE id_setting=".$data['id_setting'];
  } else {
    $q = "INSERT INTO tb_settings(website_name,phone_number1,phone_number2,email1,email2,address,maps,
          facebook_url,instagram_url,youtube_url,header_bussines_hour,time_bussines_hour,logo,created_at)
          VALUES('$website','$phone1','$phone2','$email1','$email2','$address','$maps','$fb','$ig','$yt',
          '$header','$time','$logo','$now')";
  }
  mysqli_query($conn,$q);
  header("Location: settings.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Profil Web</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="admin-wrapper">
  <?php include '_sidebar.php'; ?>
  <div class="content">
    <h3>Manajemen Profil Web</h3>
    <form method="post" enctype="multipart/form-data">
      <label>Nama Website</label>
      <input type="text" name="website_name" value="<?php echo $data['website_name']; ?>">
      <label>No Telp 1</label>
      <input type="text" name="phone_number1" value="<?php echo $data['phone_number1']; ?>">
      <label>No Telp 2</label>
      <input type="text" name="phone_number2" value="<?php echo $data['phone_number2']; ?>">
      <label>Email 1</label>
      <input type="text" name="email1" value="<?php echo $data['email1']; ?>">
      <label>Email 2</label>
      <input type="text" name="email2" value="<?php echo $data['email2']; ?>">
      <label>Alamat</label>
      <textarea name="address"><?php echo $data['address']; ?></textarea>
      <label>Maps</label>
      <textarea name="maps"><?php echo $data['maps']; ?></textarea>
      <label>Facebook</label>
      <input type="text" name="facebook_url" value="<?php echo $data['facebook_url']; ?>">
      <label>Instagram</label>
      <input type="text" name="instagram_url" value="<?php echo $data['instagram_url']; ?>">
      <label>Youtube</label>
      <input type="text" name="youtube_url" value="<?php echo $data['youtube_url']; ?>">
      <label>Header Jam Operasional</label>
      <input type="text" name="header_bussines_hour" value="<?php echo $data['header_bussines_hour']; ?>">
      <label>Jam Operasional</label>
      <textarea name="time_bussines_hour"><?php echo $data['time_bussines_hour']; ?></textarea>
      <label>Logo</label>
      <input type="file" name="logo">
      <?php if($data['logo']) echo "<img src='../uploads/".$data['logo']."' width='100'>"; ?>
      <button type="submit" name="save" class="btn-submit">Simpan</button>
    </form>
  </div>
</div>
</body>
</html>
