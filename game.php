<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Game Center | Yudha</title>
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
    
    /* Game Tabs */
    .game-tabs {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    
    .game-tab {
      background: #f1f5f9;
      color: #64748b;
      padding: 12px 24px;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .dark .game-tab {
      background: #334155;
      color: #94a3b8;
    }
    
    .game-tab:hover {
      background: #e2e8f0;
      color: #1e293b;
    }
    
    .dark .game-tab:hover {
      background: #475569;
      color: #e2e8f0;
    }
    
    .game-tab.active {
      background: #3b82f6;
      color: white;
    }
    
    .game-tab.active:hover {
      background: #2563eb;
    }
    
    /* Game Container */
    .game-container {
      background-color: white;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      border: 1px solid #f1f5f9;
      height: 100%;
      padding: 1.5rem;
      position: relative;
      overflow: hidden;
      animation: fade-in 0.6s ease-out;
      animation-fill-mode: backwards;
    }
    
    .dark .game-container {
      background-color: #1e293b;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border: 1px solid #334155;
    }
    
    .game-canvas {
      background: #0f172a;
      border-radius: 8px;
      display: block;
      margin: 0 auto;
      border: 2px solid #3b82f6;
      box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
    }
    
    .dark .game-canvas {
      background: #1e293b;
      border-color: #60a5fa;
      box-shadow: 0 0 15px rgba(96, 165, 250, 0.3);
    }
    
    .game-controls {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 1.5rem;
    }
    
    .game-btn {
      background: #3b82f6;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .game-btn:hover {
      background: #2563eb;
      transform: translateY(-2px);
    }
    
    .game-btn:active {
      transform: translateY(1px);
    }
    
    .game-btn.secondary {
      background: #94a3b8;
    }
    
    .game-btn.secondary:hover {
      background: #64748b;
    }
    
    .game-stats {
      display: flex;
      justify-content: space-between;
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      background: #f1f5f9;
      border-radius: 8px;
      font-weight: 600;
      color: #1e293b;
    }
    
    .dark .game-stats {
      background: #334155;
      color: #e2e8f0;
    }
    
    .game-instructions {
      background: #f1f5f9;
      border-radius: 8px;
      padding: 1rem;
      margin-top: 1.5rem;
      border-left: 4px solid #3b82f6;
      color: #1e293b;
    }
    
    .dark .game-instructions {
      background: #334155;
      border-left-color: #60a5fa;
      color: #e2e8f0;
    }
    
    .game-instructions ul {
      list-style-type: disc;
      padding-left: 1.5rem;
      margin-top: 0.5rem;
    }
    
    .game-instructions li {
      margin-bottom: 0.25rem;
    }
    
    .game-leaderboard {
      background: #f1f5f9;
      border-radius: 8px;
      padding: 1rem;
      margin-top: 1.5rem;
      color: #1e293b;
    }
    
    .dark .game-leaderboard {
      background: #334155;
      color: #e2e8f0;
    }
    
    .leaderboard-title {
      font-weight: 600;
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .leaderboard-item {
      display: flex;
      justify-content: space-between;
      padding: 0.5rem 0;
      border-bottom: 1px dashed #cbd5e1;
    }
    
    .dark .leaderboard-item {
      border-bottom: 1px dashed #475569;
    }
    
    .leaderboard-item:last-child {
      border-bottom: none;
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
    
    /* Responsive */
    @media (max-width: 768px) {
      .section-title {
        font-size: 1.5rem;
      }
      
      .game-canvas {
        width: 100%;
        height: auto;
      }
    }
    
    @media (max-width: 480px) {
      .section-title {
        font-size: 1.4rem;
      }
      
      .game-controls {
        flex-direction: column;
        gap: 0.5rem;
      }
    }
    
    /* Animasi untuk game */
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
    
    .animate-float {
      animation: float 3s ease-in-out infinite;
    }
    
    /* Game content tabs */
    .game-content {
      display: none;
    }
    
    .game-content.active {
      display: block;
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
          <i class="fas fa-gamepad text-blue-500 text-xl animate-float"></i>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Game Center <span class="text-blue-500">|</span> Yudha Adi Nugraha</h1>
      </div>
      
      <!-- Minimalist Navigation -->
      <nav class="minimalist-nav mt-4 md:mt-0">
        <ul class="flex flex-wrap justify-center space-x-6 font-medium">
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-newspaper mr-2"></i><a href="index.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Artikel</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-images mr-2"></i><a href="gallery.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Gallery</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-user mr-2"></i><a href="about.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">About</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-music mr-2"></i><a href="musik.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Musik</a></li>
          <li class="px-3 py-1 rounded transition-colors active"><i class="fas fa-gamepad mr-2"></i><a href="game.php" class="text-blue-500 font-medium">Game</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-sign-in-alt mr-2"></i><a href="admin/login.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto px-6 py-10">
    <div class="text-center mb-12">
      <h2 class="section-title">Game Center</h2>
      <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto mt-4">
        Pilih game untuk dimainkan. Nikmati berbagai game seru yang tersedia.
      </p>
    </div>
    
    <!-- Game Tabs -->
    <div class="game-tabs">
      <button id="spaceTab" class="game-tab active">
        <i class="fas fa-space-shuttle mr-2"></i> Space Invaders
      </button>
      <button id="flappyTab" class="game-tab">
        <i class="fas fa-dove mr-2"></i> Flappy Bird
      </button>
    </div>
    
    <!-- Space Invaders Game -->
    <div id="spaceContent" class="game-content active">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
          <div class="game-container">
            <canvas id="gameCanvas" class="game-canvas" width="600" height="400"></canvas>
            
            <div class="game-stats">
              <div>Skor: <span id="score">0</span></div>
              <div>Nyawa: <span id="lives">3</span></div>
              <div>Level: <span id="level">1</span></div>
            </div>
            
            <div class="game-controls">
              <button id="startBtn" class="game-btn">
                <i class="fas fa-play"></i> Mulai
              </button>
              <button id="pauseBtn" class="game-btn secondary">
                <i class="fas fa-pause"></i> Jeda
              </button>
              <button id="resetBtn" class="game-btn secondary">
                <i class="fas fa-redo"></i> Ulangi
              </button>
            </div>
            
            <div class="game-instructions">
              <h3 class="font-semibold flex items-center">
                <i class="fas fa-info-circle mr-2"></i> Cara Bermain
              </h3>
              <ul>
                <li>Gunakan tombol <strong>kiri</strong> dan <strong>kanan</strong> untuk bergerak</li>
                <li>Tekan <strong>spasi</strong> untuk menembak musuh</li>
                <li>Hindari serangan alien dan tembak semua musuh untuk naik level</li>
                <li>Kumpulkan power-up untuk kemampuan khusus</li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Sidebar -->
        <aside class="space-y-6">
          <!-- Profile Card -->
          <div class="profile-card">
            <img 
              id="profile-image" 
              src="images/wallhaven-9dvz7k.jpg" 
              alt="Profile Photo" 
              class="profile-image"
            >
            <h3 class="profile-name">Yudha Adi Nugraha</h3>
            <p class="profile-title">Web Developer & Desain Grafis</p>
            <p class="profile-bio">
              Saya seorang pengembang web Pemula baru belajar 2 semester, Dan saya seorang desain grafis yang tidak terlalu hebat cuma kebetulan bisa saja.
            </p>
          <!-- Leaderboard -->
          <div class="game-leaderboard">
            <h3 class="leaderboard-title">
              <i class="fas fa-trophy"></i> Peringkat Tertinggi
            </h3>
            <div class="leaderboard-item">
              <span>Yudha</span>
              <span>12,450</span>
            </div>
            <div class="leaderboard-item">
              <span>Budi</span>
              <span>10,200</span>
            </div>
            <div class="leaderboard-item">
              <span>Ani</span>
              <span>9,800</span>
            </div>
            <div class="leaderboard-item">
              <span>Rudi</span>
              <span>8,750</span>
            </div>
            <div class="leaderboard-item">
              <span>Sinta</span>
              <span>7,900</span>
            </div>
          </div>
        </aside>
      </div>
    </div>
    
    <!-- Flappy Bird Game -->
    <div id="flappyContent" class="game-content">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
          <div class="game-container">
            <canvas id="flappyCanvas" class="game-canvas" width="600" height="400"></canvas>
            
            <div class="game-stats">
              <div>Skor: <span id="flappyScore">0</span></div>
              <div>Rekor: <span id="flappyHighScore">0</span></div>
            </div>
            
            <div class="game-controls">
              <button id="flappyStartBtn" class="game-btn">
                <i class="fas fa-play"></i> Mulai
              </button>
              <button id="flappyResetBtn" class="game-btn secondary">
                <i class="fas fa-redo"></i> Ulangi
              </button>
            </div>
            
            <div class="game-instructions">
              <h3 class="font-semibold flex items-center">
                <i class="fas fa-info-circle mr-2"></i> Cara Bermain
              </h3>
              <ul>
                <li>Tekan <strong>spasi</strong> atau <strong>klik</strong> untuk melompat</li>
                <li>Terbang melewati pipa untuk mendapatkan skor</li>
                <li>Hindari pipa dan tanah</li>
                <li>Dapatkan skor setinggi mungkin!</li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Sidebar -->
        <aside class="space-y-6">
          <!-- Profile Card -->
          <div class="profile-card">
            <img 
              id="profile-image" 
              src="images/wallhaven-9dvz7k.jpg" 
              alt="Profile Photo" 
              class="profile-image"
            >
            <h3 class="profile-name">Yudha Adi Nugraha</h3>
            <p class="profile-title">Web Developer & Desain Grafis</p>
            <p class="profile-bio">
              Saya seorang pengembang web Pemula baru belajar 2 semester, Dan saya seorang desain grafis yang tidak terlalu hebat cuma kebetulan bisa saja.
            </p>
          <!-- Leaderboard -->
          <div class="game-leaderboard">
            <h3 class="leaderboard-title">
              <i class="fas fa-trophy"></i> Peringkat Tertinggi
            </h3>
            <div class="leaderboard-item">
              <span>Yudha</span>
              <span>28</span>
            </div>
            <div class="leaderboard-item">
              <span>Budi</span>
              <span>24</span>
            </div>
            <div class="leaderboard-item">
              <span>Ani</span>
              <span>21</span>
            </div>
            <div class="leaderboard-item">
              <span>Rudi</span>
              <span>18</span>
            </div>
            <div class="leaderboard-item">
              <span>Sinta</span>
              <span>15</span>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </main>

  <!-- Minimalist Footer -->
  <footer class="minimalist-footer py-10">
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
    
    // Game Tabs Functionality
    const spaceTab = document.getElementById('spaceTab');
    const flappyTab = document.getElementById('flappyTab');
    const spaceContent = document.getElementById('spaceContent');
    const flappyContent = document.getElementById('flappyContent');
    
    spaceTab.addEventListener('click', () => {
      spaceTab.classList.add('active');
      flappyTab.classList.remove('active');
      spaceContent.classList.add('active');
      flappyContent.classList.remove('active');
    });
    
    flappyTab.addEventListener('click', () => {
      flappyTab.classList.add('active');
      spaceTab.classList.remove('active');
      flappyContent.classList.add('active');
      spaceContent.classList.remove('active');
    });
    
    // =====================
    // SPACE INVADERS GAME
    // =====================
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    const scoreElement = document.getElementById('score');
    const livesElement = document.getElementById('lives');
    const levelElement = document.getElementById('level');
    const startBtn = document.getElementById('startBtn');
    const pauseBtn = document.getElementById('pauseBtn');
    const resetBtn = document.getElementById('resetBtn');
    
    // Game variables
    let score = 0;
    let lives = 3;
    let level = 1;
    let gameRunning = false;
    let gamePaused = false;
    let animationId;
    
    // Player
    const player = {
      x: canvas.width / 2 - 25,
      y: canvas.height - 40,
      width: 50,
      height: 30,
      speed: 7,
      color: '#3b82f6',
      draw: function() {
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.moveTo(this.x, this.y);
        ctx.lineTo(this.x + this.width, this.y);
        ctx.lineTo(this.x + this.width / 2, this.y + this.height);
        ctx.closePath();
        ctx.fill();
      },
      moveLeft: function() {
        if (this.x > 0) {
          this.x -= this.speed;
        }
      },
      moveRight: function() {
        if (this.x + this.width < canvas.width) {
          this.x += this.speed;
        }
      }
    };
    
    // Bullets
    const bullets = [];
    let bulletSpeed = 8;
    
    // Enemies
    const enemies = [];
    const enemyRows = 3;
    const enemyCols = 8;
    const enemySpacing = 70;
    let enemyDirection = 1;
    let enemySpeed = 1;
    
    // Power-ups
    const powerUps = [];
    
    // Initialize enemies
    function initEnemies() {
      enemies.length = 0;
      for (let r = 0; r < enemyRows; r++) {
        for (let c = 0; c < enemyCols; c++) {
          enemies.push({
            x: c * enemySpacing + 50,
            y: r * enemySpacing + 50,
            width: 40,
            height: 30,
            alive: true,
            draw: function() {
              if (!this.alive) return;
              ctx.fillStyle = '#ef4444';
              ctx.beginPath();
              ctx.arc(this.x + this.width/2, this.y + this.height/2, this.width/2, 0, Math.PI * 2);
              ctx.fill();
            }
          });
        }
      }
    }
    
    // Draw stars in background
    function drawStars() {
      const isDarkMode = document.documentElement.classList.contains('dark');
      ctx.fillStyle = isDarkMode ? '#e2e8f0' : '#64748b';
      
      for (let i = 0; i < 50; i++) {
        const x = Math.random() * canvas.width;
        const y = Math.random() * canvas.height;
        const radius = Math.random() * 2;
        ctx.beginPath();
        ctx.arc(x, y, radius, 0, Math.PI * 2);
        ctx.fill();
      }
    }
    
    // Game loop
    function gameLoop() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      
      // Draw background
      drawStars();
      
      // Draw player
      player.draw();
      
      // Draw and move bullets
      for (let i = bullets.length - 1; i >= 0; i--) {
        const bullet = bullets[i];
        bullet.y -= bullet.speed;
        
        // Remove bullets that are off screen
        if (bullet.y < 0) {
          bullets.splice(i, 1);
          continue;
        }
        
        // Draw bullet
        ctx.fillStyle = '#fbbf24';
        ctx.beginPath();
        ctx.arc(bullet.x, bullet.y, bullet.radius, 0, Math.PI * 2);
        ctx.fill();
        
        // Check for collisions with enemies
        for (let j = 0; j < enemies.length; j++) {
          const enemy = enemies[j];
          if (enemy.alive && 
              bullet.x > enemy.x && 
              bullet.x < enemy.x + enemy.width && 
              bullet.y > enemy.y && 
              bullet.y < enemy.y + enemy.height) {
            enemy.alive = false;
            bullets.splice(i, 1);
            score += 100;
            scoreElement.textContent = score;
            
            // Chance to spawn power-up
            if (Math.random() > 0.7) {
              powerUps.push({
                x: enemy.x,
                y: enemy.y,
                width: 20,
                height: 20,
                type: Math.random() > 0.5 ? 'life' : 'weapon',
                draw: function() {
                  ctx.fillStyle = this.type === 'life' ? '#10b981' : '#f59e0b';
                  ctx.beginPath();
                  ctx.arc(this.x, this.y, this.width/2, 0, Math.PI * 2);
                  ctx.fill();
                }
              });
            }
            break;
          }
        }
      }
      
      // Draw and move enemies
      let allDead = true;
      let moveDown = false;
      
      for (let i = 0; i < enemies.length; i++) {
        const enemy = enemies[i];
        if (!enemy.alive) continue;
        
        allDead = false;
        enemy.x += enemySpeed * enemyDirection;
        
        // Check if enemies hit the edge
        if ((enemyDirection === 1 && enemy.x + enemy.width > canvas.width) ||
            (enemyDirection === -1 && enemy.x < 0)) {
          moveDown = true;
        }
        
        // Draw enemy
        enemy.draw();
        
        // Check if enemy reached the bottom
        if (enemy.y + enemy.height > player.y) {
          gameOver();
          return;
        }
      }
      
      // Move enemies down and change direction
      if (moveDown) {
        enemyDirection *= -1;
        for (const enemy of enemies) {
          if (enemy.alive) {
            enemy.y += 20;
          }
        }
      }
      
      // Draw and move power-ups
      for (let i = powerUps.length - 1; i >= 0; i--) {
        const powerUp = powerUps[i];
        powerUp.y += 2;
        
        // Remove power-ups that are off screen
        if (powerUp.y > canvas.height) {
          powerUps.splice(i, 1);
          continue;
        }
        
        // Draw power-up
        powerUp.draw();
        
        // Check for collision with player
        if (powerUp.x > player.x && 
            powerUp.x < player.x + player.width && 
            powerUp.y > player.y && 
            powerUp.y < player.y + player.height) {
          if (powerUp.type === 'life') {
            lives++;
            livesElement.textContent = lives;
          } else {
            // Weapon upgrade - faster shooting
            bulletSpeed = 12;
            setTimeout(() => {
              bulletSpeed = 8;
            }, 10000);
          }
          powerUps.splice(i, 1);
        }
      }
      
      // Level up if all enemies are dead
      if (allDead) {
        level++;
        levelElement.textContent = level;
        enemySpeed += 0.5;
        initEnemies();
      }
      
      animationId = requestAnimationFrame(gameLoop);
    }
    
    // Start game
    function startGame() {
      if (!gameRunning) {
        gameRunning = true;
        gamePaused = false;
        score = 0;
        lives = 3;
        level = 1;
        enemySpeed = 1;
        bulletSpeed = 8;
        bullets.length = 0;
        powerUps.length = 0;
        scoreElement.textContent = score;
        livesElement.textContent = lives;
        levelElement.textContent = level;
        initEnemies();
        gameLoop();
        startBtn.innerHTML = '<i class="fas fa-play"></i> Mulai';
      } else if (gamePaused) {
        gamePaused = false;
        gameLoop();
        startBtn.innerHTML = '<i class="fas fa-play"></i> Mulai';
      }
    }
    
    // Pause game
    function pauseGame() {
      if (gameRunning && !gamePaused) {
        gamePaused = true;
        cancelAnimationFrame(animationId);
        startBtn.innerHTML = '<i class="fas fa-play"></i> Lanjutkan';
      }
    }
    
    // Reset game
    function resetGame() {
      cancelAnimationFrame(animationId);
      gameRunning = false;
      gamePaused = false;
      startGame();
    }
    
    // Game over
    function gameOver() {
      cancelAnimationFrame(animationId);
      gameRunning = false;
      
      // Use dark mode aware colors
      const isDarkMode = document.documentElement.classList.contains('dark');
      const bgColor = isDarkMode ? 'rgba(15, 23, 42, 0.8)' : 'rgba(0, 0, 0, 0.7)';
      const textColor = isDarkMode ? '#e2e8f0' : '#ffffff';
      
      ctx.fillStyle = bgColor;
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      
      ctx.fillStyle = textColor;
      ctx.font = '36px Arial';
      ctx.textAlign = 'center';
      ctx.fillText('GAME OVER', canvas.width / 2, canvas.height / 2 - 30);
      
      ctx.font = '24px Arial';
      ctx.fillText(`Skor Akhir: ${score}`, canvas.width / 2, canvas.height / 2 + 20);
      
      startBtn.innerHTML = '<i class="fas fa-play"></i> Main Lagi';
    }
    
    // Event listeners for buttons
    startBtn.addEventListener('click', startGame);
    pauseBtn.addEventListener('click', pauseGame);
    resetBtn.addEventListener('click', resetGame);
    
    // Keyboard controls
    document.addEventListener('keydown', (e) => {
      if (!gameRunning || gamePaused) return;
      
      switch(e.key) {
        case 'ArrowLeft':
          player.moveLeft();
          break;
        case 'ArrowRight':
          player.moveRight();
          break;
        case ' ':
          // Shoot bullet
          bullets.push({
            x: player.x + player.width / 2,
            y: player.y,
            radius: 4,
            speed: bulletSpeed
          });
          break;
      }
    });
    
    // Initialize game
    initEnemies();
    
    // =================
    // FLAPPY BIRD GAME
    // =================
    const flappyCanvas = document.getElementById('flappyCanvas');
    const flappyCtx = flappyCanvas.getContext('2d');
    const flappyScoreElement = document.getElementById('flappyScore');
    const flappyHighScoreElement = document.getElementById('flappyHighScore');
    const flappyStartBtn = document.getElementById('flappyStartBtn');
    const flappyResetBtn = document.getElementById('flappyResetBtn');
    
    // Game variables
    let flappyScore = 0;
    let flappyHighScore = localStorage.getItem('flappyHighScore') || 0;
    let flappyGameRunning = false;
    let flappyAnimationId;
    
    // Bird properties
    const bird = {
      x: 50,
      y: 150,
      radius: 15,
      velocity: 0,
      gravity: 0.5,
      jump: -10,
      color: '#fbbf24',
      draw: function() {
        flappyCtx.fillStyle = this.color;
        flappyCtx.beginPath();
        flappyCtx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        flappyCtx.fill();
        
        // Draw wing
        flappyCtx.fillStyle = '#f59e0b';
        flappyCtx.beginPath();
        flappyCtx.ellipse(this.x - 8, this.y, 8, 5, 0, 0, Math.PI * 2);
        flappyCtx.fill();
        
        // Draw eye
        flappyCtx.fillStyle = 'black';
        flappyCtx.beginPath();
        flappyCtx.arc(this.x + 5, this.y - 3, 3, 0, Math.PI * 2);
        flappyCtx.fill();
      },
      update: function() {
        this.velocity += this.gravity;
        this.y += this.velocity;
        
        // Floor collision
        if (this.y + this.radius > flappyCanvas.height - 80) {
          this.y = flappyCanvas.height - 80 - this.radius;
          gameOverFlappy();
        }
        
        // Ceiling collision
        if (this.y - this.radius < 0) {
          this.y = this.radius;
          this.velocity = 0;
        }
      },
      flap: function() {
        this.velocity = this.jump;
      }
    };
    
    // Pipes
    const pipes = [];
    const pipeWidth = 50;
    const pipeGap = 150;
    let pipeFrameCount = 0;
    const pipeInterval = 100;
    
    // Clouds
    const clouds = [];
    
    // Initialize clouds
    for (let i = 0; i < 5; i++) {
      clouds.push({
        x: Math.random() * flappyCanvas.width,
        y: Math.random() * 100,
        width: 60 + Math.random() * 40,
        speed: 0.5 + Math.random() * 0.5
      });
    }
    
    // Draw background
    function drawFlappyBackground() {
      const isDarkMode = document.documentElement.classList.contains('dark');
      
      // Sky
      flappyCtx.fillStyle = isDarkMode ? '#0f172a' : '#7dd3fc';
      flappyCtx.fillRect(0, 0, flappyCanvas.width, flappyCanvas.height);
      
      // Draw clouds
      flappyCtx.fillStyle = isDarkMode ? '#334155' : '#f0f9ff';
      for (const cloud of clouds) {
        flappyCtx.beginPath();
        flappyCtx.arc(cloud.x, cloud.y, cloud.width/4, 0, Math.PI * 2);
        flappyCtx.arc(cloud.x + cloud.width/4, cloud.y - cloud.width/8, cloud.width/4, 0, Math.PI * 2);
        flappyCtx.arc(cloud.x + cloud.width/2, cloud.y, cloud.width/4, 0, Math.PI * 2);
        flappyCtx.fill();
      }
      
      // Ground
      flappyCtx.fillStyle = isDarkMode ? '#14532d' : '#65a30d';
      flappyCtx.fillRect(0, flappyCanvas.height - 80, flappyCanvas.width, 80);
      
      // Grass
      flappyCtx.fillStyle = isDarkMode ? '#166534' : '#4d7c0f';
      for (let i = 0; i < flappyCanvas.width; i += 10) {
        flappyCtx.fillRect(i, flappyCanvas.height - 80, 5, -10 - Math.random() * 10);
      }
    }
    
    // Create new pipe
    function createPipe() {
      const minHeight = 50;
      const maxHeight = flappyCanvas.height - pipeGap - minHeight - 80;
      const height = minHeight + Math.random() * maxHeight;
      
      pipes.push({
        x: flappyCanvas.width,
        height: height,
        passed: false
      });
    }
    
    // Draw pipes
    function drawPipes() {
      const isDarkMode = document.documentElement.classList.contains('dark');
      
      for (let i = 0; i < pipes.length; i++) {
        const pipe = pipes[i];
        
        // Draw top pipe
        flappyCtx.fillStyle = isDarkMode ? '#15803d' : '#22c55e';
        flappyCtx.fillRect(pipe.x, 0, pipeWidth, pipe.height);
        
        // Draw pipe cap
        flappyCtx.fillStyle = isDarkMode ? '#166534' : '#16a34a';
        flappyCtx.fillRect(pipe.x - 5, pipe.height - 20, pipeWidth + 10, 20);
        
        // Draw bottom pipe
        flappyCtx.fillStyle = isDarkMode ? '#15803d' : '#22c55e';
        flappyCtx.fillRect(pipe.x, pipe.height + pipeGap, pipeWidth, flappyCanvas.height - pipe.height - pipeGap - 80);
        
        // Draw pipe cap
        flappyCtx.fillStyle = isDarkMode ? '#166534' : '#16a34a';
        flappyCtx.fillRect(pipe.x - 5, pipe.height + pipeGap, pipeWidth + 10, 20);
        
        // Move pipe
        pipe.x -= 2;
        
        // Check if pipe is off screen
        if (pipe.x + pipeWidth < 0) {
          pipes.splice(i, 1);
          i--;
          continue;
        }
        
        // Check if bird passed the pipe
        if (!pipe.passed && pipe.x + pipeWidth < bird.x) {
          pipe.passed = true;
          flappyScore++;
          flappyScoreElement.textContent = flappyScore;
          
          if (flappyScore > flappyHighScore) {
            flappyHighScore = flappyScore;
            flappyHighScoreElement.textContent = flappyHighScore;
            localStorage.setItem('flappyHighScore', flappyHighScore);
          }
        }
        
        // Check collision
        if (
          bird.x + bird.radius > pipe.x && 
          bird.x - bird.radius < pipe.x + pipeWidth && 
          (bird.y - bird.radius < pipe.height || bird.y + bird.radius > pipe.height + pipeGap)
        ) {
          gameOverFlappy();
        }
      }
    }
    
    // Flappy bird game loop
    function flappyGameLoop() {
      flappyCtx.clearRect(0, 0, flappyCanvas.width, flappyCanvas.height);
      
      // Draw background
      drawFlappyBackground();
      
      // Update clouds
      for (const cloud of clouds) {
        cloud.x -= cloud.speed;
        if (cloud.x < -100) {
          cloud.x = flappyCanvas.width + 50;
          cloud.y = Math.random() * 100;
        }
      }
      
      // Draw pipes
      drawPipes();
      
      // Draw bird
      bird.update();
      bird.draw();
      
      // Create new pipe
      pipeFrameCount++;
      if (pipeFrameCount % pipeInterval === 0) {
        createPipe();
      }
      
      flappyAnimationId = requestAnimationFrame(flappyGameLoop);
    }
    
    // Start flappy bird game
    function startFlappyGame() {
      if (!flappyGameRunning) {
        flappyGameRunning = true;
        flappyScore = 0;
        flappyScoreElement.textContent = flappyScore;
        flappyHighScoreElement.textContent = flappyHighScore;
        pipes.length = 0;
        bird.y = 150;
        bird.velocity = 0;
        pipeFrameCount = 0;
        flappyGameLoop();
        flappyStartBtn.innerHTML = '<i class="fas fa-play"></i> Mulai';
      }
    }
    
    // Reset flappy bird game
    function resetFlappyGame() {
      cancelAnimationFrame(flappyAnimationId);
      flappyGameRunning = false;
      startFlappyGame();
    }
    
    // Flappy bird game over
    function gameOverFlappy() {
      cancelAnimationFrame(flappyAnimationId);
      flappyGameRunning = false;
      
      // Use dark mode aware colors
      const isDarkMode = document.documentElement.classList.contains('dark');
      const bgColor = isDarkMode ? 'rgba(15, 23, 42, 0.8)' : 'rgba(0, 0, 0, 0.7)';
      const textColor = isDarkMode ? '#e2e8f0' : '#ffffff';
      
      flappyCtx.fillStyle = bgColor;
      flappyCtx.fillRect(0, 0, flappyCanvas.width, flappyCanvas.height);
      
      flappyCtx.fillStyle = textColor;
      flappyCtx.font = '36px Arial';
      flappyCtx.textAlign = 'center';
      flappyCtx.fillText('GAME OVER', flappyCanvas.width / 2, flappyCanvas.height / 2 - 30);
      
      flappyCtx.font = '24px Arial';
      flappyCtx.fillText(`Skor: ${flappyScore}`, flappyCanvas.width / 2, flappyCanvas.height / 2 + 20);
      
      flappyStartBtn.innerHTML = '<i class="fas fa-play"></i> Main Lagi';
    }
    
    // Event listeners for flappy bird
    flappyStartBtn.addEventListener('click', startFlappyGame);
    flappyResetBtn.addEventListener('click', resetFlappyGame);
    
    // Keyboard controls for flappy bird
    document.addEventListener('keydown', (e) => {
      if (e.key === ' ' && flappyGameRunning) {
        bird.flap();
      }
    });
    
    flappyCanvas.addEventListener('click', () => {
      if (flappyGameRunning) {
        bird.flap();
      }
    });
    
    // Initialize high score display
    flappyHighScoreElement.textContent = flappyHighScore;
  </script>
</body>
</html>
