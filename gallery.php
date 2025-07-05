<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | Personal Web</title>
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
            'float': 'float 3s ease-in-out infinite',
            'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite'
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: 0, transform: 'translateY(10px)' },
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
    }
    
    .dark .minimalist-header {
      background: #1e293b;
      border-bottom: 1px solid #334155;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
    }
    
    /* Gallery Item Minimalist */
    .gallery-item {
      background-color: white;
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      position: relative;
      animation: fade-in 0.6s ease-out;
      animation-fill-mode: backwards;
      border: 1px solid #f1f5f9;
    }
    
    .gallery-item:nth-child(1) { animation-delay: 0.1s; }
    .gallery-item:nth-child(2) { animation-delay: 0.2s; }
    .gallery-item:nth-child(3) { animation-delay: 0.3s; }
    .gallery-item:nth-child(4) { animation-delay: 0.4s; }
    .gallery-item:nth-child(5) { animation-delay: 0.5s; }
    .gallery-item:nth-child(6) { animation-delay: 0.6s; }
    
    .dark .gallery-item {
      background-color: #1e293b;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border: 1px solid #334155;
    }
    
    .gallery-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
      z-index: 2;
      border-color: #cbd5e1;
    }
    
    .dark .gallery-item:hover {
      border-color: #475569;
    }
    
    .gallery-image-container {
      position: relative;
      overflow: hidden;
      height: 240px;
    }
    
    .gallery-image {
      height: 100%;
      width: 100%;
      object-fit: cover;
      transition: all 0.5s ease;
    }
    
    .gallery-item:hover .gallery-image {
      transform: scale(1.05);
    }
    
    .gallery-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
      padding: 3rem 1rem 1rem;
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.3s ease;
    }
    
    .gallery-item:hover .gallery-overlay {
      opacity: 1;
      transform: translateY(0);
    }
    
    .gallery-title {
      color: white;
      font-weight: 600;
      text-align: center;
      font-size: 1.1rem;
      text-shadow: 0 1px 3px rgba(0,0,0,0.5);
    }
    
    .dark .gallery-title {
      color: var(--primary-200);
    }
    
    .gallery-content {
      padding: 1.25rem;
      text-align: center;
      position: relative;
    }
    
    .gallery-text {
      color: #64748b;
      font-size: 0.85rem;
      margin-top: 0.5rem;
      display: none;
    }
    
    .dark .gallery-text {
      color: #94a3b8;
    }
    
    .gallery-item:hover .gallery-text {
      display: block;
      animation: fade-in 0.4s ease;
    }
    
    .section-title {
      position: relative;
      display: inline-block;
      margin-bottom: 2.5rem;
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
    
    /* Download Button Styles */
    .download-btn {
      position: absolute;
      top: 15px;
      right: 15px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 2;
      opacity: 0;
      transform: translateY(-5px);
      transition: all 0.3s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .dark .download-btn {
      background: rgba(30, 41, 59, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .gallery-item:hover .download-btn {
      opacity: 1;
      transform: translateY(0);
    }
    
    .download-btn:hover {
      background: white;
      transform: scale(1.1) !important;
    }
    
    .dark .download-btn:hover {
      background: #334155;
    }
    
    .download-btn i {
      color: #475569;
      font-size: 14px;
      transition: transform 0.3s ease;
    }
    
    .dark .download-btn i {
      color: #cbd5e1;
    }
    
    .download-btn:hover i {
      transform: scale(1.15);
      color: #3b82f6;
    }
    
    .download-btn.downloading i {
      animation: pulse-slow 1.5s infinite;
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
    }
    
    .dark .minimalist-nav ul li.active a {
      color: #60a5fa;
    }
    
    /* Gallery Grid */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1.5rem;
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
    
    /* Empty State */
    .empty-state {
      background: rgba(241, 245, 249, 0.6);
      border-radius: 16px;
      padding: 3rem;
      text-align: center;
      border: 1px dashed #cbd5e1;
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
    
    /* Responsive */
    @media (max-width: 768px) {
      .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      }
      
      .gallery-image-container {
        height: 200px;
      }
      
      .section-title {
        font-size: 1.5rem;
      }
    }
    
    @media (max-width: 480px) {
      .gallery-grid {
        grid-template-columns: 1fr;
      }
      
      .gallery-image-container {
        height: 220px;
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
  <header class="minimalist-header py-6">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row md:items-center md:justify-between">
      <div class="flex items-center justify-center md:justify-start">
        <div class="bg-slate-100 dark:bg-slate-700 p-3 rounded-lg mr-4">
          <i class="fas fa-images text-blue-500 text-xl animate-float"></i>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Gallery <span class="text-blue-500">|</span> Yudha Adi Nugraha</h1>
      </div>
      
      <!-- Minimalist Navigation -->
      <nav class="minimalist-nav mt-4 md:mt-0">
        <ul class="flex flex-wrap justify-center space-x-6 font-medium">
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-newspaper mr-2"></i><a href="index.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Artikel</a></li>
          <li class="px-3 py-1 rounded transition-colors active"><i class="fas fa-images mr-2"></i><a href="gallery.php" class="text-blue-500 font-medium">Gallery</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-user mr-2"></i><a href="about.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">About</a></li>
           <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-music mr-2"></i><a href="musik.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Musik</a></li>
             <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-gamepad mr-2"></i><a href="game.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Game</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-sign-in-alt mr-2"></i><a href="admin/login.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Gallery Grid -->
  <main class="max-w-6xl mx-auto px-6 py-10">
    <div class="text-center mb-12">
      <h2 class="section-title">My Gallery</h2>
      <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto mt-4">
        A collection of my favorite moments captured through the lens. Each photo tells a unique story.
      </p>
    </div>
    
    <div class="gallery-grid">
      <?php
      $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
      $query = mysqli_query($db, $sql);
      
      if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_array($query)) {
          $filePath = 'images/' . $data['foto'];
          $fileName = htmlspecialchars($data['judul']) . '.' . pathinfo($data['foto'], PATHINFO_EXTENSION);
          
          echo "<div class='gallery-item'>";
          echo "<div class='gallery-image-container'>";
          // Tombol download
          echo "<div class='download-btn' title='Download Gambar' data-filepath='$filePath' data-filename='$fileName'>";
          echo "<i class='fas fa-download'></i>";
          echo "</div>";
          
          echo "<img src='$filePath' class='gallery-image' alt='{$data['judul']}'>";
          echo "<div class='gallery-overlay'>";
          echo "<div class='gallery-title'>" . htmlspecialchars($data['judul']) . "</div>";
          echo "</div>";
          echo "</div>";
          echo "<div class='gallery-content'>";
          echo "<div class='font-medium text-slate-800 dark:text-slate-100'>" . htmlspecialchars($data['judul']) . "</div>";
          echo "<div class='gallery-text'>" . date('F j, Y') . "</div>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo '<div class="empty-state col-span-full">';
        echo '<i class="fas fa-image"></i>';
        echo '<p class="text-slate-600 dark:text-slate-400 text-xl">No photos in the gallery yet</p>';
        echo '</div>';
      }
      ?>
    </div>
  </main>

  <!-- Minimalist Footer -->
  <footer class="minimalist-footer py-10 mt-16">
    <div class="max-w-6xl mx-auto px-6">
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
    
    // Gallery item interaction
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    galleryItems.forEach(item => {
      item.addEventListener('click', () => {
        // Show a simple alert for demonstration
        const title = item.querySelector('.font-medium').textContent;
        showToast(`Opening: ${title}`, 'info');
      });
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
    
    // Download functionality
    document.querySelectorAll('.download-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent triggering gallery item click
        
        const filePath = this.getAttribute('data-filepath');
        const fileName = this.getAttribute('data-filename');
        
        // Add downloading animation
        const icon = this.querySelector('i');
        this.classList.add('downloading');
        
        // Simulate download process with a delay
        setTimeout(() => {
          // Create a temporary link to trigger download
          const link = document.createElement('a');
          link.href = filePath;
          link.download = fileName;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          
          // Remove downloading animation
          this.classList.remove('downloading');
          
          // Show success message
          showToast(`Downloaded: ${fileName}`, 'success');
        }, 800);
      });
    });
  </script>
</body>
</html>