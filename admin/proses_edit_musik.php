<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}

require_once("../koneksi.php");

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $judul = mysqli_real_escape_string($db, $_POST['judul']);
  $artis = mysqli_real_escape_string($db, $_POST['artis']);
  $genre = mysqli_real_escape_string($db, $_POST['genre']);
  $tahun = mysqli_real_escape_string($db, $_POST['tahun']);
  $durasi = mysqli_real_escape_string($db, $_POST['durasi']);

  $sql = "UPDATE tbl_musik SET 
          judul = '$judul', 
          artis = '$artis', 
          genre = '$genre', 
          tahun = '$tahun', 
          durasi = '$durasi'
          WHERE id_musik = '$id'";
  
  $result = mysqli_query($db, $sql);

  if ($result) {
    $_SESSION['success'] = "Data musik berhasil diperbarui!";
  } else {
    $_SESSION['error'] = "Gagal memperbarui data musik: " . mysqli_error($db);
  }
}

header("Location: data_musik.php");
exit();
?>