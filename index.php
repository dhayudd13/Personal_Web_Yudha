<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Personal Web | Yudha</title>
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
            'fade-in': 'fadeIn 0.5s ease-out',
            'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite'
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: 0, transform: 'translateY(10px)' },
              '100%': { opacity: 1, transform: 'translateY(0)' }
            }
          }
        }
      }
    }
  </script>
  <style>
    :root {
      --primary-color: #4b5563;
      --primary-hover: #374151;
    }
    
    body {
      background-color: #f8fafc;
      position: relative;
      min-height: 100vh;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .dark body {
      background-color: #0f172a;
    }

    main {
      position: relative;
      z-index: 1;
      padding-bottom: 4rem;
    }

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
    
    /* Minimalist Header */
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
    
    /* Article Card Styles */
    .article-card {
      background-color: white;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      animation: fade-in 0.6s ease-out;
      animation-fill-mode: backwards;
      border: 1px solid #f1f5f9;
      height: 100%;
      padding: 1.5rem;
      position: relative;
      overflow: hidden;
    }
    
    .article-card::before {
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
    
    .article-card:hover::before {
      transform: translateX(0);
    }
    
    .dark .article-card {
      background-color: #1e293b;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border: 1px solid #334155;
    }
    
    .article-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
      z-index: 2;
      border-color: #cbd5e1;
    }
    
    .dark .article-card:hover {
      border-color: #475569;
    }
    
    .article-content {
      position: relative;
      z-index: 1;
    }
    
    .article-title {
      color: #1e293b;
      font-weight: 600;
      font-size: 1.25rem;
      margin-bottom: 0.75rem;
      transition: color 0.3s;
      position: relative;
      display: inline-block;
    }
    
    .article-title::after {
      content: "";
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #3b82f6;
      transition: width 0.3s ease;
    }
    
    .article-card:hover .article-title::after {
      width: 100%;
    }
    
    .dark .article-title {
      color: #e2e8f0;
    }
    
    .article-card:hover .article-title {
      color: #3b82f6;
    }
    
    .article-excerpt {
      color: #64748b;
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 1rem;
    }
    
    .dark .article-excerpt {
      color: #94a3b8;
    }
    
    .article-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: #94a3b8;
      font-size: 0.85rem;
      padding-top: 1rem;
      border-top: 1px dashed #e2e8f0;
    }
    
    .dark .article-meta {
      color: #64748b;
      border-top: 1px dashed #334155;
    }
    
    .read-more {
      color: #3b82f6;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      transition: transform 0.3s;
    }
    
    .read-more i {
      margin-left: 0.3rem;
      transition: transform 0.3s;
    }
    
    .article-card:hover .read-more {
      transform: translateX(5px);
    }
    
    .article-card:hover .read-more i {
      transform: translateX(3px);
    }
    
    /* Profile Card Styles */
    .profile-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      border: 1px solid #f1f5f9;
      padding: 2rem;
      text-align: center;
    }
    
    .dark .profile-card {
      background-color: #1e293b;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border: 1px solid #334155;
    }
    
    .profile-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 1.5rem;
      border: 3px solid white;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .dark .profile-image {
      border-color: #1e293b;
    }
    
    .profile-name {
      font-size: 1.25rem;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 0.25rem;
    }
    
    .dark .profile-name {
      color: #e2e8f0;
    }
    
    .profile-title {
      color: #64748b;
      font-size: 0.9rem;
      margin-bottom: 1.5rem;
    }
    
    .dark .profile-title {
      color: #94a3b8;
    }
    
    .profile-bio {
      color: #64748b;
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }
    
    .dark .profile-bio {
      color: #94a3b8;
    }
    
    .social-icons {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
      margin-bottom: 1.5rem;
    }
    
    .social-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: #f1f5f9;
      color: #64748b;
      transition: all 0.3s ease;
    }
    
    .dark .social-link {
      background: #334155;
      color: #94a3b8;
    }
    
    .social-link:hover {
      transform: translateY(-3px);
      background: #3b82f6;
      color: white;
    }
    
    /* Section Title */
    .section-title {
      position: relative;
      display: inline-block;
      margin-bottom: 2rem;
      font-size: 1.75rem;
      font-weight: 700;
      color: #1e293b;
      letter-spacing: -0.5px;
    }
    
    .dark .section-title {
      color: #e2e8f0;
    }
    
    .section-title::after {
      content: "";
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 50px;
      height: 3px;
      background: #94a3b8;
      border-radius: 2px;
    }
    
    .dark .section-title::after {
      background: #64748b;
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
    
    /* Category Tags */
    .category-tag {
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
    
    .dark .category-tag {
      background: #1e3a8a;
      color: #dbeafe;
    }
    
    .article-card:hover .category-tag {
      background: #3b82f6;
      color: white;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .section-title {
        font-size: 1.5rem;
      }
      
      .article-card {
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
          <i class="fas fa-newspaper text-blue-500 text-xl animate-float"></i>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Artikel <span class="text-blue-500">|</span> Yudha Adi Nugraha</h1>
      </div>
      
      <!-- Minimalist Navigation -->
      <nav class="minimalist-nav mt-4 md:mt-0">
        <ul class="flex flex-wrap justify-center space-x-6 font-medium">
          <li class="px-3 py-1 rounded transition-colors active"><i class="fas fa-newspaper mr-2"></i><a href="index.php" class="text-blue-500 font-medium">Artikel</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-images mr-2"></i><a href="gallery.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Gallery</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-user mr-2"></i><a href="about.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">About</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-music mr-2"></i><a href="musik.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Musik</a></li>
           <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-gamepad mr-2"></i><a href="game.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Game</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-sign-in-alt mr-2"></i><a href="admin/login.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto px-6 py-10">
    <div class="text-center mb-12">
      <h2 class="section-title">Artikel Terbaru</h2>
      <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto mt-4">
        Kumpulan artikel menarik seputar apa saja yang saya suka.
      </p>
    </div>
    
    <!-- Form Pencarian -->
    <form method="GET" action="index.php" class="search-container">
      <i class="fas fa-search search-icon"></i>
      <input 
        type="text" 
        name="q" 
        placeholder="Cari artikel..." 
        value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>"
      >
    </form>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Artikel Utama -->
      <div class="md:col-span-2">
        <div class="grid grid-cols-1 gap-6">
          <?php
          // Tampilkan detail artikel jika ada parameter id_artikel
          if (isset($_GET['id_artikel'])) {
            $id_artikel = $_GET['id_artikel'];
            $sql = "SELECT * FROM tbl_artikel WHERE id_artikel = ?";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id_artikel);
            mysqli_stmt_execute($stmt);
            $query = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($query) > 0) {
              $data = mysqli_fetch_array($query);
              echo "<div class='article-card'>";
              echo "<div class='article-content'>";
              
              // Kategori artikel
              
              echo "<h3 class='article-title'>" . htmlspecialchars($data['nama_artikel']) . "</h3>";
              echo "<div class='article-excerpt'>" . nl2br(htmlspecialchars($data['isi_artikel'])) . "</div>";
              echo "<div class='article-meta'>";
              echo "<span><i class='far fa-calendar mr-1'></i>" . date('F j, Y') . "</span>";
              echo "<a href='index.php' class='read-more'>Kembali <i class='fas fa-arrow-right'></i></a>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
            } else {
              echo '<div class="empty-state">';
              echo '<i class="fas fa-file-alt"></i>';
              echo '<p class="text-slate-600 dark:text-slate-400 text-xl">Artikel tidak ditemukan</p>';
              echo '</div>';
            }
          } else {
            // Cek apakah ada parameter pencarian
            $search_query = isset($_GET['q']) ? trim($_GET['q']) : '';
            
            if (!empty($search_query)) {
              // Tampilkan jumlah hasil pencarian
              $count_sql = "SELECT COUNT(*) AS total FROM tbl_artikel 
                            WHERE nama_artikel LIKE ? OR isi_artikel LIKE ?";
              $stmt = mysqli_prepare($db, $count_sql);
              $search_term = "%$search_query%";
              mysqli_stmt_bind_param($stmt, "ss", $search_term, $search_term);
              mysqli_stmt_execute($stmt);
              $count_result = mysqli_stmt_get_result($stmt);
              $count_row = mysqli_fetch_assoc($count_result);
              $total_results = $count_row['total'];
              
              echo '<div class="col-span-full text-center mb-6">';
              echo "<p class='text-slate-600 dark:text-slate-400'>";
              echo "Ditemukan <span class='font-semibold'>$total_results</span> hasil untuk \"$search_query\"";
              echo '</p>';
              echo '</div>';
            }
            
            // Query untuk artikel
            $sql = "SELECT * FROM tbl_artikel";
            
            // Tambahkan kondisi jika ada pencarian
            if (!empty($search_query)) {
              $sql .= " WHERE nama_artikel LIKE ? OR isi_artikel LIKE ?";
              $sql .= " ORDER BY id_artikel DESC";
              $stmt = mysqli_prepare($db, $sql);
              $search_term = "%$search_query%";
              mysqli_stmt_bind_param($stmt, "ss", $search_term, $search_term);
              mysqli_stmt_execute($stmt);
              $query = mysqli_stmt_get_result($stmt);
            } else {
              $sql .= " ORDER BY id_artikel DESC LIMIT 4";
              $query = mysqli_query($db, $sql);
            }
            
            // Tampilkan hasil
            if (mysqli_num_rows($query) > 0) {
              while ($data = mysqli_fetch_array($query)) {
                // Potong teks untuk preview
                $preview = strlen($data['isi_artikel']) > 150 ? substr($data['isi_artikel'], 0, 150) . '...' : $data['isi_artikel'];
                
                echo "<div class='article-card'>";
                echo "<div class='article-content'>";
                
                // Kategori artikel
                
                echo "<h3 class='article-title'>";
                echo "<a href='index.php?id_artikel=".$data['id_artikel']."'>" . htmlspecialchars($data['nama_artikel']) . "</a>";
                echo "</h3>";
                echo "<div class='article-excerpt'>" . htmlspecialchars($preview) . "</div>";
                echo "<div class='article-meta'>";
                echo "<span><i class='far fa-calendar mr-1'></i>" . date('F j, Y') . "</span>";
                echo "<a href='index.php?id_artikel=".$data['id_artikel']."' class='read-more'>Baca <i class='fas fa-arrow-right'></i></a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              // Tampilkan pesan jika tidak ada hasil
              echo '<div class="col-span-full empty-state">';
              echo '<i class="fas fa-search"></i>';
              if (!empty($search_query)) {
                echo '<p class="text-slate-600 dark:text-slate-400 text-xl">Tidak ditemukan artikel yang sesuai</p>';
                echo '<p class="text-slate-500 dark:text-slate-500 mt-2">Coba dengan kata kunci lain atau lihat semua artikel</p>';
              } else {
                echo '<p class="text-slate-600 dark:text-slate-400 text-xl">Belum ada artikel yang tersedia</p>';
              }
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
      
      <!-- Sidebar -->
      <aside class="space-y-6">
        <!-- Profile Card -->
        <div class="profile-card">
          <img 
            id="profile-image" 
            src="images/IMG-20250705-WA0002.jpg" 
            alt="Profile Photo" 
            class="profile-image"
          >
          <h3 class="profile-name">Yudha Adi Nugraha</h3>
          <p class="profile-title">Web Developer & Desain Grafis</p>
          <p class="profile-bio">
            Saya seorang pengembang web Pemula baru belajar 2 semester, Dan saya seorang desain grafis yang tidak terlalu hebat cuma kebetulan bisa saja.
          </p>
          <div class="social-icons">
            <a href="https://github.com/dhayudd13" class="social-link"><i class="fab fa-github"></i></a>
            <a href="https://open.spotify.com/playlist/7IUgcan70phV40T0UyLjwC?si=8e6757f5312a4f36" class="social-link"><i class="fab fa-spotify"></i></a>
            <a href="https://www.tiktok.com/@yukeisuk3?lang=id-ID" class="social-link"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.instagram.com/saint1vlyd/" class="social-link"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        
        <!-- Artikel Terbaru -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow transition-colors border border-slate-100 dark:border-slate-700">
          <h3 class="text-lg font-semibold mb-4 text-slate-800 dark:text-slate-200">Artikel Terpopuler</h3>
          <ul class="space-y-3">
            <?php
            $sql = "SELECT * FROM tbl_artikel ORDER BY id_artikel DESC LIMIT 5";
            $query = mysqli_query($db, $sql);
            $article_count = 0;
            while ($data = mysqli_fetch_array($query)) {
              $article_count++;
              echo "<li class='flex items-start py-2 border-b border-slate-100 dark:border-slate-700'>";
              echo "<span class='bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-semibold px-2 py-1 rounded mr-3 mt-1'>$article_count</span>";
              echo "<a href='index.php?id_artikel=".$data['id_artikel']."' class='text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors'>" . htmlspecialchars($data['nama_artikel']) . "</a>";
              echo "</li>";
            }
            ?>
          </ul>
          <a href="index.php" class="inline-block mt-4 text-blue-600 dark:text-blue-400 hover:underline">Lihat Semua Artikel →</a>
        </div>
      </aside>
    </div>
  </main>

  <!-- Minimalist Footer -->
  <footer class="minimalist-footer py-10">
    <div class="max-w-6xl mx-auto px-6">
      <div class="flex flex-col items-center">
        <div class="flex space-x-4 mb-4">
         <a href="https://github.com/dhayudd13" class="social-link"><i class="fab fa-github"></i></a>
            <a href="https://open.spotify.com/playlist/7IUgcan70phV40T0UyLjwC?si=8e6757f5312a4f36" class="social-link"><i class="fab fa-spotify"></i></a>
            <a href="https://www.tiktok.com/@yukeisuk3?lang=id-ID" class="social-link"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.instagram.com/saint1vlyd/" class="social-link"><i class="fab fa-instagram"></i></a>
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
    
    // Show toast notification
    function showToast(message, type = 'success') {
      const colors = {
        success: 'bg-green-500',
        error: 'bg-red-500',
        info: 'bg-blue-500'
      };
      
      const color = colors[type] || 'bg-green-500';
      
      // Remove previous toast if exists
      const oldToast = document.getElementById('custom-toast');
      if (oldToast) oldToast.remove();
      
      // Create toast element
      const toast = document.createElement('div');
      toast.id = 'custom-toast';
      toast.className = `fixed bottom-5 right-5 ${color} text-white px-4 py-3 rounded-lg shadow-lg flex items-center transition-all duration-300 transform translate-y-10 opacity-0 z-50`;
      toast.innerHTML = `
        <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-times-circle' : 'fa-info-circle'} mr-3 text-xl"></i>
        <span>${message}</span>
      `;
      
      document.body.appendChild(toast);
      
      // Show toast
      setTimeout(() => {
        toast.classList.remove('translate-y-10', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
      }, 10);
      
      // Hide toast after 3 seconds
      setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-10');
        setTimeout(() => {
          toast.remove();
        }, 300);
      }, 3000);
    }
  </script>
</body>
</html>