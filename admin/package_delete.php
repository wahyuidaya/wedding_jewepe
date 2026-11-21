<?php
include '_auth.php';
include '../koneksi_db.php';
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM tb_catalogues WHERE catalogue_id=$id");
header("Location: package.php");
