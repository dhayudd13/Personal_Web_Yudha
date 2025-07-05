<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}
require_once("../koneksi.php");

// Ambil data musik
$sql = "SELECT * FROM tbl_musik ORDER BY id_musik DESC";
$query = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Musik</title>
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
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-900">Data Musik</h2>
        <a href="upload_musik.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          <i class="fas fa-plus mr-2"></i>Tambah Musik
        </a>
      </div>
      
      <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
          <?php 
          echo $_SESSION['success']; 
          unset($_SESSION['success']);
          ?>
        </div>
      <?php endif; ?>
      
      <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
          <?php 
          echo $_SESSION['error']; 
          unset($_SESSION['error']);
          ?>
        </div>
      <?php endif; ?>
      
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-3 px-4 border-b text-left">ID</th>
              <th class="py-3 px-4 border-b text-left">Cover</th>
              <th class="py-3 px-4 border-b text-left">Judul</th>
              <th class="py-3 px-4 border-b text-left">Artis</th>
              <th class="py-3 px-4 border-b text-left">Genre</th>
              <th class="py-3 px-4 border-b text-left">Tahun</th>
              <th class="py-3 px-4 border-b text-left">Durasi</th>
              <th class="py-3 px-4 border-b text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($query) > 0): ?>
              <?php while ($musik = mysqli_fetch_array($query)): ?>
                <tr class="hover:bg-gray-50">
                  <td class="py-3 px-4 border-b"><?= $musik['id_musik'] ?></td>
                  <td class="py-3 px-4 border-b">
                    <img src="<?= $musik['cover_path'] ?>" alt="Cover" class="w-16 h-16 object-cover rounded">
                  </td>
                  <td class="py-3 px-4 border-b font-medium"><?= htmlspecialchars($musik['judul']) ?></td>
                  <td class="py-3 px-4 border-b"><?= htmlspecialchars($musik['artis']) ?></td>
                  <td class="py-3 px-4 border-b"><?= htmlspecialchars($musik['genre']) ?></td>
                  <td class="py-3 px-4 border-b"><?= $musik['tahun'] ?></td>
                  <td class="py-3 px-4 border-b"><?= $musik['durasi'] ?></td>
                  <td class="py-3 px-4 border-b text-center">
                    <a href="edit_musik.php?id=<?= $musik['id_musik'] ?>" class="text-blue-600 hover:text-blue-800 mr-3">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="delete_musik.php?id=<?= $musik['id_musik'] ?>" 
                       class="text-red-600 hover:text-red-800"
                       onclick="return confirm('Apakah Anda yakin ingin menghapus musik ini?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="8" class="py-4 px-4 border-b text-center text-gray-500">
                  <i class="fas fa-music-slash text-2xl mb-2 block"></i>
                  Tidak ada data musik
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>