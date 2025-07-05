<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}

require_once("../koneksi.php");

if (!isset($_GET['id'])) {
  header("Location: data_musik.php");
  exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_musik WHERE id_musik = '$id'";
$query = mysqli_query($db, $sql);
$musik = mysqli_fetch_assoc($query);

if (!$musik) {
  header("Location: data_musik.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Musik</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
  <div class="flex max-w-7xl mx-auto mt-8 px-4">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-white rounded shadow p-4 h-fit">
      <h2 class="text-xl font-semibold text-blue-700 mb-4 text-center">MENU</h2>
      <ul class="space-y-2 text-gray-700">
        <li><a href="beranda_admin.php" class="block hover:text-blue-600">Beranda</a></li>
        <li><a href="data_artikel.php" class="block hover:text-blue-600">Kelola Artikel</a></li>
        <li><a href="data_gallery.php" class="block hover:text-blue-600">Kelola Gallery</a></li>
        <li><a href="data_musik.php" class="block hover:text-blue-600 font-semibold text-blue-800">Kelola Musik</a></li>
        <li><a href="about.php" class="block hover:text-blue-600">About</a></li>
        <li>
          <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
            class="block text-red-600 hover:underline font-medium">Logout</a>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="w-3/4 bg-white rounded shadow p-6 ml-6">
      <h2 class="text-2xl font-bold text-blue-900 mb-6">Edit Data Musik</h2>
      
      <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="proses_edit_musik.php" method="post">
          <input type="hidden" name="id" value="<?= $musik['id_musik'] ?>">
          
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
              Judul Musik
            </label>
            <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($musik['judul']) ?>" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="artis">
              Artis
            </label>
            <input type="text" name="artis" id="artis" value="<?= htmlspecialchars($musik['artis']) ?>" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="genre">
              Genre
            </label>
            <input type="text" name="genre" id="genre" value="<?= htmlspecialchars($musik['genre']) ?>" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="tahun">
                Tahun
              </label>
              <input type="number" name="tahun" id="tahun" min="1900" max="<?= date('Y') ?>" 
                     value="<?= $musik['tahun'] ?>" required
                     class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="durasi">
                Durasi (hh:mm:ss)
              </label>
              <input type="text" name="durasi" id="durasi" placeholder="00:00:00" 
                     value="<?= $musik['durasi'] ?>" required
                     class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
          </div>
          
          <div class="flex items-center justify-between mt-6">
            <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
            <a href="data_musik.php" class="text-blue-600 hover:text-blue-800 font-medium">
              <i class="fas fa-times mr-1"></i>Batal
            </a>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>