<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['file_path']) || !isset($_SESSION['cover_path'])) {
  header('location:login.php');
  exit;
}

// Ambil path file dari session
$file_path = $_SESSION['file_path'];
$cover_path = $_SESSION['cover_path'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Musik</title>
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
        <li><a href="data_musik.php" class="block hover:text-blue-600">Kelola Musik</a></li>
        <li><a href="about.php" class="block hover:text-blue-600">About</a></li>
        <li>
          <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
            class="block text-red-600 hover:underline font-medium">Logout</a>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="w-3/4 bg-white rounded shadow p-6 ml-6">
      <h2 class="text-2xl font-bold text-blue-900 mb-6">Tambah Data Musik</h2>
      
      <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="proses_add_musik.php" method="post">
          <input type="hidden" name="file_path" value="<?php echo htmlspecialchars($file_path); ?>">
          <input type="hidden" name="cover_path" value="<?php echo htmlspecialchars($cover_path); ?>">
          
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
              Judul Musik
            </label>
            <input type="text" name="judul" id="judul" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="artis">
              Artis
            </label>
            <input type="text" name="artis" id="artis" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="genre">
              Genre
            </label>
            <input type="text" name="genre" id="genre" required
              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="tahun">
                Tahun
              </label>
              <input type="number" name="tahun" id="tahun" min="1900" max="<?php echo date('Y'); ?>" required
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="durasi">
                Durasi (hh:mm:ss)
              </label>
              <input type="text" name="durasi" id="durasi" placeholder="00:00:00" required
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
          </div>
          
          <div class="flex items-center justify-between mt-6">
            <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              <i class="fas fa-save mr-2"></i>Simpan Data
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
<?php
// Hapus session file_path dan cover_path setelah digunakan
unset($_SESSION['file_path']);
unset($_SESSION['cover_path']);
?>