<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}

require_once("../koneksi.php");

if (isset($_POST['submit'])) {
  $judul = mysqli_real_escape_string($db, $_POST['judul']);
  $artis = mysqli_real_escape_string($db, $_POST['artis']);
  $genre = mysqli_real_escape_string($db, $_POST['genre']);
  $tahun = mysqli_real_escape_string($db, $_POST['tahun']);
  $durasi = mysqli_real_escape_string($db, $_POST['durasi']);
  $file_path = mysqli_real_escape_string($db, $_POST['file_path']);
  $cover_path = mysqli_real_escape_string($db, $_POST['cover_path']);

  $sql = "INSERT INTO tbl_musik (judul, artis, genre, tahun, durasi, file_path, cover_path) 
          VALUES ('$judul', '$artis', '$genre', '$tahun', '$durasi', '$file_path', '$cover_path')";
  
  $result = mysqli_query($db, $sql);

  if ($result) {
    $_SESSION['success'] = "Data musik berhasil ditambahkan!";
    header("Location: data_musik.php");
  } else {
    $_SESSION['error'] = "Gagal menambahkan data musik: " . mysqli_error($db);
    header("Location: add_musik.php");
  }
} else {
  header("Location: add_musik.php");
}
exit();
?>