<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musik | Yudha</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f9fafb',
              100: '#f3f4f6',
              200: '#e5e7eb',
              300: '#d1d5db',
              400: '#9ca3af',
              500: '#6b7280',
              600: '#4b5563',
              700: '#374151',
              800: '#1f2937',
              900: '#111827',
            }
          },
          animation: {
            'fade-in': 'fadeIn 0.3s ease-out',
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            'float': 'float 6s ease-in-out infinite'
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: 0, transform: 'translateY(8px)' },
              '100%': { opacity: 1, transform: 'translateY(0)' }
            },
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-10px)' }
            }
          }
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      background-color: #f8fafc;
      position: relative;
      min-height: 100vh;
      font-family: 'Inter', sans-serif;
    }

    .dark body {
      background-color: #0f172a;
    }

    .minimalist-header {
      background: white;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
      border-bottom: 1px solid #e2e8f0;
      padding: 1.5rem 0;
    }
    
    .dark .minimalist-header {
      background: #1e293b;
      border-bottom: 1px solid #334155;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
    }
    
    /* Dark mode toggle */
    .toggle-switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .toggle-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #e2e8f0;
      transition: .4s;
      border-radius: 34px;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }
    
    input:checked + .slider {
      background-color: #4b5563;
    }
    
    input:checked + .slider:before {
      transform: translateX(26px);
    }
    
    .slider i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 14px;
    }
    
    .slider .fa-sun {
      left: 8px;
      color: #fbbf24;
    }
    
    .slider .fa-moon {
      right: 8px;
      color: #d1d5db;
    }
    
    input:checked + .slider .fa-sun {
      color: #fbbf24;
    }
    
    input:checked + .slider .fa-moon {
      color: #d1d5db;
    }
    
    .dark-mode-toggle-container {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1000;
      animation: fade-in 0.8s ease-out;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 50px;
      padding: 4px;
      backdrop-filter: blur(4px);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .dark .dark-mode-toggle-container {
      background: rgba(15, 23, 42, 0.9);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    
    /* Minimalist Navigation */
    .minimalist-nav ul li {
      position: relative;
      padding: 8px 0;
    }
    
    .minimalist-nav ul li::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: #3b82f6;
      transition: width 0.3s ease;
    }
    
    .minimalist-nav ul li:hover::after {
      width: 100%;
    }
    
    .minimalist-nav ul li.active::after {
      width: 100%;
      background: #3b82f6;
    }
    
    .minimalist-nav ul li.active a {
      color: #3b82f6;
      font-weight: 600;
    }
    
    .dark .minimalist-nav ul li.active a {
      color: #60a5fa;
    }
    
    /* Music Card Styles */
    .music-card {
      background-color: white;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      animation: fade-in 0.6s ease-out;
      animation-fill-mode: backwards;
      border: 1px solid #f1f5f9;
      padding: 1.5rem;
      position: relative;
      overflow: hidden;
    }
    
    .music-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: #3b82f6;
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }
    
    .music-card:hover::before {
      transform: translateX(0);
    }
    
    .dark .music-card {
      background-color: #1e293b;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border: 1px solid #334155;
    }
    
    .music-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
      z-index: 2;
      border-color: #cbd5e1;
    }
    
    .dark .music-card:hover {
      border-color: #475569;
    }
    
    .music-content {
      position: relative;
      z-index: 1;
    }
    
    .music-title {
      color: #1e293b;
      font-weight: 600;
      font-size: 1.25rem;
      margin-bottom: 0.75rem;
      transition: color 0.3s;
      position: relative;
      display: inline-block;
    }
    
    .music-title::after {
      content: "";
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #3b82f6;
      transition: width 0.3s ease;
    }
    
    .music-card:hover .music-title::after {
      width: 100%;
    }
    
    .dark .music-title {
      color: #e2e8f0;
    }
    
    .music-card:hover .music-title {
      color: #3b82f6;
    }
    
    .music-artist {
      color: #64748b;
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 1rem;
    }
    
    .dark .music-artist {
      color: #94a3b8;
    }
    
    .music-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: #94a3b8;
      font-size: 0.85rem;
      padding-top: 1rem;
      border-top: 1px dashed #e2e8f0;
    }
    
    .dark .music-meta {
      color: #64748b;
      border-top: 1px dashed #334155;
    }
    
    .play-button {
      color: #3b82f6;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      transition: transform 0.3s;
    }
    
    .play-button i {
      margin-left: 0.3rem;
      transition: transform 0.3s;
    }
    
    .music-card:hover .play-button {
      transform: translateX(5px);
    }
    
    .music-card:hover .play-button i {
      transform: translateX(3px);
    }
    
    /* Minimalist Footer */
    .minimalist-footer {
      background: white;
      border-top: 1px solid #e2e8f0;
    }
    
    .dark .minimalist-footer {
      background: #1e293b;
      border-top: 1px solid #334155;
    }
    
    /* Search Form */
    .search-container {
      position: relative;
      margin-bottom: 2rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }
    
    .search-container input {
      width: 100%;
      padding: 14px 20px;
      padding-left: 50px;
      border-radius: 50px;
      border: 1px solid #e2e8f0;
      font-size: 1rem;
      transition: all 0.3s;
      background-color: #f8fafc;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    
    .dark .search-container input {
      background-color: #1e293b;
      border-color: #334155;
      color: #e2e8f0;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .search-container input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    
    .search-icon {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
    }
    
    /* Empty State */
    .empty-state {
      background: rgba(241, 245, 249, 0.6);
      border-radius: 16px;
      padding: 3rem;
      text-align: center;
      border: 1px dashed #cbd5e1;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .dark .empty-state {
      background: rgba(30, 41, 59, 0.5);
      border: 1px dashed #475569;
    }
    
    .empty-state i {
      font-size: 3rem;
      color: #cbd5e1;
      margin-bottom: 1rem;
    }
    
    .dark .empty-state i {
      color: #475569;
    }
    
    /* Genre Tags */
    .genre-tag {
      display: inline-block;
      background: #e0f2fe;
      color: #0c4a6e;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 0.8rem;
      margin-right: 8px;
      margin-bottom: 8px;
      transition: all 0.3s;
    }
    
    .dark .genre-tag {
      background: #1e3a8a;
      color: #dbeafe;
    }
    
    .music-card:hover .genre-tag {
      background: #3b82f6;
      color: white;
    }
    
    /* Audio Player */
    .audio-player {
      width: 100%;
      margin-top: 1rem;
    }
    
    .audio-player audio {
      width: 100%;
    }
    
    .audio-player::-webkit-media-controls-panel {
      background-color: #f1f5f9;
      border-radius: 8px;
    }
    
    .dark .audio-player::-webkit-media-controls-panel {
      background-color: #1e293b;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .section-title {
        font-size: 1.5rem;
      }
      
      .music-card {
        padding: 1.25rem;
      }
    }
    
    @media (max-width: 480px) {
      .section-title {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body class="text-slate-800 dark:text-slate-200 transition-colors">
  <!-- Dark Mode Toggle -->
  <div class="dark-mode-toggle-container">
    <label class="toggle-switch">
      <input type="checkbox" id="darkModeToggle">
      <span class="slider">
        <i class="fas fa-sun"></i>
        <i class="fas fa-moon"></i>
      </span>
    </label>
  </div>

  <!-- Minimalist Header -->
  <header class="minimalist-header">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row md:items-center md:justify-between">
      <div class="flex items-center justify-center md:justify-start">
        <div class="bg-slate-100 dark:bg-slate-700 p-3 rounded-lg mr-4">
          <i class="fas fa-music text-blue-500 text-xl animate-float"></i>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Musik <span class="text-blue-500">|</span> Yudha Adi Nugraha</h1>
      </div>
      
      <!-- Minimalist Navigation -->
      <nav class="minimalist-nav mt-4 md:mt-0">
        <ul class="flex flex-wrap justify-center space-x-6 font-medium">
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-newspaper mr-2"></i><a href="index.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Artikel</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-images mr-2"></i><a href="gallery.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Gallery</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-user mr-2"></i><a href="about.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">About</a></li>
          <li class="px-3 py-1 rounded transition-colors active"><i class="fas fa-music mr-2"></i><a href="musik.php" class="text-blue-500 font-medium">Musik</a></li>
            <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-gamepad mr-2"></i><a href="game.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Game</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-sign-in-alt mr-2"></i><a href="admin/login.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-5xl mx-auto px-6 py-10">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-slate-800 dark:text-white mb-4">Koleksi Musik</h2>
      <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
        Nikmati koleksi musik favorit saya. Dengarkan langsung di web atau download untuk didengarkan offline.
      </p>
    </div>
    
    <!-- Form Pencarian -->
    <form method="GET" action="musik.php" class="search-container">
      <i class="fas fa-search search-icon"></i>
      <input 
        type="text" 
        name="q" 
        placeholder="Cari lagu, artis, atau genre..." 
        value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>"
      >
    </form>
    
    <div class="grid grid-cols-1 gap-6">
      <?php
      // Cek apakah ada parameter pencarian
      $search_query = isset($_GET['q']) ? trim($_GET['q']) : '';
      
      // Query untuk musik
      $sql = "SELECT * FROM tbl_musik";
      
      // Tambahkan kondisi jika ada pencarian
      if (!empty($search_query)) {
        $sql .= " WHERE judul LIKE ? OR artis LIKE ? OR genre LIKE ?";
        $sql .= " ORDER BY judul ASC";
        $stmt = mysqli_prepare($db, $sql);
        if ($stmt) {
          $search_term = "%$search_query%";
          mysqli_stmt_bind_param($stmt, "sss", $search_term, $search_term, $search_term);
          mysqli_stmt_execute($stmt);
          $query = mysqli_stmt_get_result($stmt);
        } else {
          $error = "Error in prepared statement: " . mysqli_error($db);
        }
      } else {
        $sql .= " ORDER BY id_musik DESC";
        $query = mysqli_query($db, $sql);
      }
      
      // Tampilkan hasil
      if (isset($query) && mysqli_num_rows($query) > 0) {
        while ($musik = mysqli_fetch_array($query)) {
          // Pastikan path file benar
          $cover_path = $musik['cover_path'];
          $file_path = $musik['file_path'];
          
          // Perbaiki path jika diperlukan
          // Hapus '../' di awal path jika ada
          $cover_path = preg_replace('/^\.\.\//', '', $cover_path);
          $file_path = preg_replace('/^\.\.\//', '', $file_path);
          
          // Jika path tidak dimulai dengan 'http', tambahkan base path
          if (!preg_match('/^https?:\/\//', $file_path)) {
            // Dapatkan base URL dari direktori saat ini
            $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
            $base_url = $protocol . "://$_SERVER[HTTP_HOST]";
            $current_dir = dirname($_SERVER['PHP_SELF']);
            
            // Hapus 'admin/' jika ada di path
            $current_dir = str_replace('/admin', '', $current_dir);
            
            // Pastikan tidak ada double slash
            $base_url = rtrim($base_url, '/');
            $current_dir = rtrim($current_dir, '/');
            $file_path = ltrim($file_path, '/');
            $cover_path = ltrim($cover_path, '/');
            
            // Buat URL lengkap untuk file
            $file_url = "$base_url$current_dir/$file_path";
            $cover_url = "$base_url$current_dir/$cover_path";
          } else {
            $file_url = $file_path;
            $cover_url = $cover_path;
          }
          
          echo "<div class='music-card'>";
          echo "<div class='music-content'>";
          echo "<div class='flex items-start'>";
          echo "<div class='mr-4 flex-shrink-0'>";
          echo "<img src='{$cover_url}' alt='Cover' class='w-16 h-16 rounded-lg object-cover shadow-md'>";
          echo "</div>";
          echo "<div class='flex-grow'>";
          echo "<h3 class='music-title'>{$musik['judul']}</h3>";
          echo "<p class='music-artist'><i class='fas fa-user mr-2'></i>{$musik['artis']}</p>";
          
          // Metadata
          echo "<div class='flex flex-wrap mb-3'>";
          echo "<span class='genre-tag'><i class='fas fa-music mr-1'></i>{$musik['genre']}</span>";
          echo "<span class='genre-tag'><i class='fas fa-clock mr-1'></i>{$musik['durasi']}</span>";
          echo "<span class='genre-tag'><i class='fas fa-calendar mr-1'></i>{$musik['tahun']}</span>";
          echo "</div>";
          
          // Audio Player
          echo "<div class='audio-player'>";
          echo "<audio controls>";
          echo "<source src='{$file_url}' type='audio/mpeg'>";
          echo "Browser Anda tidak mendukung pemutar audio.";
          echo "</audio>";
          echo "</div>";
          
          echo "</div>";
          echo "</div>";
          
          echo "<div class='music-meta'>";
          // Perbaikan: Gunakan URL lengkap untuk tombol download
          echo "<a href='{$file_url}' download class='play-button'><i class='fas fa-download mr-1'></i> Download</a>";
          echo "<span> <i class='fas fa-headphones mr-1'></i>  plays
          </span>";
          echo "</div>";
          
          echo "</div>";
          echo "</div>";
        }
      } else {
        // Tampilkan pesan jika tidak ada hasil
        echo '<div class="empty-state">';
        echo '<i class="fas fa-music"></i>';
        
        if (!empty($search_query)) {
          echo '<p class="text-slate-600 dark:text-slate-400 text-xl">Tidak ditemukan musik yang sesuai</p>';
          echo '<p class="text-slate-500 dark:text-slate-500 mt-2">Coba dengan kata kunci lain atau lihat semua musik</p>';
        } else {
          echo '<p class="text-slate-600 dark:text-slate-400 text-xl">Belum ada musik yang tersedia</p>';
        }
        echo '</div>';
      }
      
      // Tampilkan error jika ada
      if (isset($error)) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 dark:bg-red-900 dark:border-red-700 dark:text-red-100">';
        echo $error;
        echo '</div>';
      }
      ?>
    </div>
  </main>

  <!-- Minimalist Footer -->
  <footer class="minimalist-footer py-10">
    <div class="max-w-5xl mx-auto px-6">
      <div class="flex flex-col items-center">
        <div class="flex space-x-4 mb-4">
          <a href="#" class="social-link">
            <i class="fab fa-github"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-spotify"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
        <p class="text-slate-600 dark:text-slate-400 text-sm">&copy; <?php echo date('Y'); ?> | Created by Yudha Adi Nugraha</p>
      </div>
    </div>
  </footer>

  <script>
    // Dark mode toggle functionality
    const darkModeToggle = document.getElementById('darkModeToggle');
    const htmlElement = document.documentElement;
    
    // Check for saved theme preference or respect OS preference
    const savedTheme = localStorage.getItem('darkMode');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme === 'enabled' || (savedTheme === null && systemPrefersDark)) {
      enableDarkMode();
    } else {
      disableDarkMode();
    }
    
    darkModeToggle.addEventListener('change', () => {
      if (darkModeToggle.checked) {
        enableDarkMode();
      } else {
        disableDarkMode();
      }
    });
    
    function enableDarkMode() {
      htmlElement.classList.add('dark');
      darkModeToggle.checked = true;
      localStorage.setItem('darkMode', 'enabled');
    }
    
    function disableDarkMode() {
      htmlElement.classList.remove('dark');
      darkModeToggle.checked = false;
      localStorage.setItem('darkMode', 'disabled');
    }
    
    // Auto focus search field if there's a search query
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.querySelector('input[name="q"]');
      if (searchInput && searchInput.value) {
        searchInput.focus();
      }
    });
  </script>
</body>
</html>