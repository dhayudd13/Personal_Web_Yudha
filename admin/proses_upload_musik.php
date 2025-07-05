<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}

require_once("../koneksi.php");

$target_dir_musik = "../musik/";
$target_dir_cover = "../cover/";

// Buat direktori jika belum ada
if (!is_dir($target_dir_musik)) {
  mkdir($target_dir_musik, 0755, true);
}
if (!is_dir($target_dir_cover)) {
  mkdir($target_dir_cover, 0755, true);
}

$fileMusik = $target_dir_musik . basename($_FILES["fileMusik"]["name"]);
$fileCover = $target_dir_cover . basename($_FILES["cover"]["name"]);
$uploadOk = 1;
$fileMusikType = strtolower(pathinfo($fileMusik, PATHINFO_EXTENSION));
$fileCoverType = strtolower(pathinfo($fileCover, PATHINFO_EXTENSION));

// Cek apakah file musik adalah file mp3
if ($fileMusikType != "mp3") {
  $_SESSION['error'] = "Maaf, hanya file MP3 yang diperbolehkan.";
  $uploadOk = 0;
}

// Cek apakah file cover adalah gambar
$check = getimagesize($_FILES["cover"]["tmp_name"]);
if ($check === false) {
  $_SESSION['error'] = "File cover bukan gambar.";
  $uploadOk = 0;
}

// Cek ukuran file musik (maks 10MB)
if ($_FILES["fileMusik"]["size"] > 10000000) {
  $_SESSION['error'] = "Maaf, file musik terlalu besar (maks 10MB).";
  $uploadOk = 0;
}

// Cek ukuran file cover (maks 2MB)
if ($_FILES["cover"]["size"] > 2000000) {
  $_SESSION['error'] = "Maaf, file cover terlalu besar (maks 2MB).";
  $uploadOk = 0;
}

// Cek jika $uploadOk = 0
if ($uploadOk == 0) {
  header("Location: upload_musik.php");
  exit();
} else {
  // Generate unique filenames
  $uniqueFilenameMusik = uniqid() . '.' . $fileMusikType;
  $uniqueFilenameCover = uniqid() . '.' . $fileCoverType;
  
  $finalMusikPath = $target_dir_musik . $uniqueFilenameMusik;
  $finalCoverPath = $target_dir_cover . $uniqueFilenameCover;

  // Pindahkan file musik
  if (move_uploaded_file($_FILES["fileMusik"]["tmp_name"], $finalMusikPath)) {
    // Pindahkan file cover
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $finalCoverPath)) {
      // Simpan path file ke session untuk digunakan di form add_musik
      $_SESSION['file_path'] = $finalMusikPath;
      $_SESSION['cover_path'] = $finalCoverPath;
      header("Location: add_musik.php");
      exit();
    } else {
      $_SESSION['error'] = "Maaf, terjadi kesalahan saat mengupload cover.";
      header("Location: upload_musik.php");
      exit();
    }
  } else {
    $_SESSION['error'] = "Maaf, terjadi kesalahan saat mengupload musik.";
    header("Location: upload_musik.php");
    exit();
  }
}
?>