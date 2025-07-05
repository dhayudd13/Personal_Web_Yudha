<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}

require_once("../koneksi.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Ambil data untuk menghapus file
  $sql = "SELECT file_path, cover_path FROM tbl_musik WHERE id_musik = '$id'";
  $query = mysqli_query($db, $sql);
  $data = mysqli_fetch_assoc($query);
  
  // Hapus file musik dan cover
  if ($data) {
    if (file_exists($data['file_path'])) {
      unlink($data['file_path']);
    }
    if (file_exists($data['cover_path'])) {
      unlink($data['cover_path']);
    }
  }
  
  // Hapus data dari database
  $sql = "DELETE FROM tbl_musik WHERE id_musik = '$id'";
  $result = mysqli_query($db, $sql);
  
  if ($result) {
    $_SESSION['success'] = "Data musik berhasil dihapus!";
  } else {
    $_SESSION['error'] = "Gagal menghapus data musik: " . mysqli_error($db);
  }
} else {
  $_SESSION['error'] = "ID musik tidak valid!";
}

header("Location: data_musik.php");
exit();
?>