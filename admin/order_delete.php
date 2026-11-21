<?php
include '_auth.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan ID berupa angka
    if (ctype_digit($id)) {
        mysqli_query($conn, "DELETE FROM tb_order WHERE order_id='$id'");
    }
}

header("Location: orders.php");
exit;
?>
