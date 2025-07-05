<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About | Personal Web</title>
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
    
    /* Profile Card Styles */
    .profile-card {
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
    
    .profile-card::before {
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
    
    .profile-card:hover::before {
      transform: translateX(0);
    }
    
    .dark .profile-card {
      background-color: #1e293b;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border: 1px solid #334155;
    }
    
    .profile-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
      z-index: 2;
      border-color: #cbd5e1;
    }
    
    .dark .profile-card:hover {
      border-color: #475569;
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
    
    /* Skill Bars */
    .skill-bar {
      height: 8px;
      border-radius: 4px;
      background: #e2e8f0;
      overflow: hidden;
    }
    
    .skill-progress {
      height: 100%;
      border-radius: 4px;
      background: #3b82f6;
      transition: width 1.5s cubic-bezier(0.22, 0.61, 0.36, 1);
    }
    
    .dark .skill-bar {
      background: #334155;
    }
    
    /* Timeline */
    .timeline-item {
      position: relative;
      padding-left: 30px;
      margin-bottom: 30px;
    }
    
    .timeline-item:before {
      content: '';
      position: absolute;
      left: 0;
      top: 5px;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background: #3b82f6;
    }
    
    .timeline-item:after {
      content: '';
      position: absolute;
      left: 7px;
      top: 20px;
      width: 1px;
      height: calc(100% - 15px);
      background: #cbd5e1;
    }
    
    .dark .timeline-item:after {
      background: #334155;
    }
    
    .timeline-item:last-child:after {
      display: none;
    }
    
    /* Social Icons */
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
    
    /* Contact Card */
    .contact-card {
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
    }
    
    .dark .contact-card {
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .section-title {
        font-size: 1.5rem;
      }
      
      .profile-card {
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
          <i class="fas fa-user text-blue-500 text-xl animate-float"></i>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">About <span class="text-blue-500">|</span> Yudha Adi Nugraha</h1>
      </div>
      
      <!-- Minimalist Navigation -->
      <nav class="minimalist-nav mt-4 md:mt-0">
        <ul class="flex flex-wrap justify-center space-x-6 font-medium">
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-newspaper mr-2"></i><a href="index.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Artikel</a></li>
          <li class="px-3 py-1 rounded transition-colors"><i class="fas fa-images mr-2"></i><a href="gallery.php" class="text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white">Gallery</a></li>
          <li class="px-3 py-1 rounded transition-colors active"><i class="fas fa-user mr-2"></i><a href="about.php" class="text-blue-500 font-medium">About</a></li>
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
      <h2 class="section-title">Tentang Saya</h2>
      <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto mt-4">
        Seorang pengembang web pemula yang antusias dan desainer grafis yang bersemangat belajar.
      </p>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Profile Card -->
      <div class="lg:col-span-1">
        <div class="profile-card">
          <div class="text-center">
            <div class="profile-card">
          <img 
            id="profile-image" 
            src="images/IMG-20250705-WA0002.jpg" 
            alt="Profile Photo" 
            class="border-2 border-dashed rounded-full w-48 h-48 mx-auto flex items-center justify-center mb-6"
          
          >
            </div>
            <h3 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Yudha Adi Nugraha</h3>
            <p class="text-blue-500 mt-1">Web Developer & Desain Grafis</p>
            <p class="text-slate-600 dark:text-slate-400 mt-4">
              Saya seorang pengembang web pemula baru belajar 2 semester, dan desainer grafis yang terus belajar.
            </p>
            
            <div class="mt-6 flex justify-center space-x-3">
              <a href="#" class="social-link"><i class="fab fa-github"></i></a>
              <a href="#" class="social-link"><i class="fab fa-spotify"></i></a>
              <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            </div>
            
            <div class="mt-6">
              <a href="#" class="inline-block bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-medium py-2 px-6 rounded-full transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-download mr-2"></i>Download CV
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- About Content -->
      <div class="lg:col-span-2">
        <div class="grid grid-cols-1 gap-8">
          <!-- About Section -->
          <div class="profile-card">
            <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 mb-4">Tentang Saya</h3>
            <div class="space-y-4 text-slate-600 dark:text-slate-400">
              <p>Saya seorang pengembang web pemula yang baru belajar selama 2 semester. Meskipun baru memulai, saya memiliki semangat yang besar untuk belajar dan mengembangkan keterampilan dalam pengembangan web.</p>
              <p>Saya juga memiliki minat dalam desain grafis. Saya menikmati proses menciptakan desain yang menarik dan fungsional, meskipun saya masih dalam tahap belajar.</p>
              <p>Selain itu, saya terus belajar teknologi baru dan mencoba menerapkan pengetahuan saya dalam proyek-proyek pribadi untuk meningkatkan keterampilan saya.</p>
            </div>
          </div>
          
          <!-- Skills Section -->
          <div class="profile-card">
            <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 mb-4">Keterampilan</h3>
            <div class="space-y-5">
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-slate-700 dark:text-slate-300">HTML/CSS</span>
                  <span class="text-blue-500">80%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress w-4/5"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-slate-700 dark:text-slate-300">JavaScript</span>
                  <span class="text-blue-500">70%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress w-7/10"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-slate-700 dark:text-slate-300">PHP & MySQL</span>
                  <span class="text-blue-500">75%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress w-3/4"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium text-slate-700 dark:text-slate-300">Desain Grafis</span>
                  <span class="text-blue-500">65%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress w-13/20"></div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Experience Section -->
          <div class="profile-card">
            <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 mb-4">Pengalaman</h3>
            <div class="space-y-6">
              <div class="timeline-item">
                <h4 class="font-bold text-lg text-slate-800 dark:text-slate-100">Mahasiswa Sistem Informasi</h4>
                <p class="text-blue-500">Universitas Subang • 2024 - Sekarang</p>
                <p class="mt-2 text-slate-600 dark:text-slate-400">Belajar dasar-dasar pemrograman, struktur data, dan pengembangan web.</p>
              </div>
              <div class="timeline-item">
                <h4 class="font-bold text-lg text-slate-800 dark:text-slate-100">Freelance di DIGIMART.ID</h4>
                <p class="text-blue-500">2025 - Sekarang</p>
                <p class="mt-2 text-slate-600 dark:text-slate-400">Membuat Desain yang di pesan oleh pelanggan sesuai request.</p>
              </div>
              <div class="timeline-item">
                <h4 class="font-bold text-lg text-slate-800 dark:text-slate-100">Desainer Grafis Part-time</h4>
                <p class="text-blue-500">2022 - 2023</p>
                <p class="mt-2 text-slate-600 dark:text-slate-400">Membuat desain poster dan materi promosi untuk acara kampus.</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Contact Card -->
        <div class="contact-card mt-8">
          <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="text-white text-center md:text-left mb-6 md:mb-0">
              <h3 class="text-xl font-bold">Tertarik bekerja sama?</h3>
              <p class="mt-2 opacity-90">Silakan hubungi saya untuk kolaborasi atau sekadar menyapa</p>
            </div>
            <a href="mailto:yudha@example.com" class="bg-white text-blue-600 font-semibold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors shadow-md">
              <i class="fas fa-paper-plane mr-2"></i>Hubungi Saya
            </a>
          </div>
        </div>
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
    
    // Animate skill bars
    document.addEventListener('DOMContentLoaded', function() {
      const skillBars = document.querySelectorAll('.skill-progress');
      
      // Set initial width to 0 for animation
      skillBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        
        // Trigger reflow
        void bar.offsetWidth;
        
        // Animate to actual width
        bar.style.width = width;
      });
    });
  </script>
</body>
</html>