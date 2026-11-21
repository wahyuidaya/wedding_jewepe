<?php
session_start();
include '../koneksi_db.php';

if(!isset($_SESSION['admin'])){
  header("Location: login.php");
  exit;
}
?>
