<?php
include '_auth.php';

if(isset($_GET['id']) && isset($_GET['act'])){
  $id  = $_GET['id'];
  $act = $_GET['act'];

  // validasi hanya boleh 'approved' atau 'requested'
  if(in_array($act, ['approved','requested'])){
    $now = date('Y-m-d H:i:s');
    mysqli_query($conn,"UPDATE tb_order SET status='$act', updated_at='$now' WHERE order_id='$id'");
  }
}

header("Location: orders.php");
exit;
?>
