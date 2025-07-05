<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location:beranda_admin.php');
}
require_once("../koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Administrator</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#2563eb',
            secondary: '#1d4ed8',
            accent: '#3b82f6',
            dark: '#1e293b',
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'wave': 'wave 8s linear infinite',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-20px)' },
            },
            wave: {
              '0%': { transform: 'translateX(0)' },
              '100%': { transform: 'translateX(-100%)' },
            }
          }
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0ea5e9, #1d4ed8);
      background-size: 200% 200%;
      animation: gradient 15s ease infinite;
      overflow-x: hidden;
    }
    
    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    
    .login-container {
      transition: all 0.4s ease;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .login-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
    }
    
    .wave-bg {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 12em;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z' fill='%23ffffff' opacity='0.1'%3E%3C/path%3E%3C/svg%3E");
      background-size: 50% 100%;
      animation: wave 8s linear infinite;
      z-index: 0;
    }
    
    .input-group {
      position: relative;
    }
    
    .input-group input {
      transition: all 0.3s ease;
    }
    
    .input-group input:focus {
      box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.3);
    }
    
    .btn-login {
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
    }
    
    .btn-login:hover {
      background: linear-gradient(135deg, #1d4ed8, #2563eb);
      transform: translateY(-2px);
      box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.4);
    }
    
    .btn-cancel {
      transition: all 0.3s ease;
    }
    
    .btn-cancel:hover {
      background-color: #e5e7eb;
      transform: translateY(-2px);
    }
    
    .password-toggle {
      cursor: pointer;
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #9ca3af;
    }
    
    .decoration-element {
      position: absolute;
      z-index: -1;
    }
    
    .decoration-element:nth-child(1) {
      top: 10%;
      left: 5%;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.15);
    }
    
    .decoration-element:nth-child(2) {
      top: 20%;
      right: 7%;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
    }
    
    .decoration-element:nth-child(3) {
      bottom: 30%;
      left: 10%;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
    }
    
    .decoration-element:nth-child(4) {
      bottom: 15%;
      right: 12%;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.15);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
  <!-- Decorative elements -->
  <div class="decoration-element"></div>
  <div class="decoration-element"></div>
  <div class="decoration-element"></div>
  <div class="decoration-element"></div>
  
  <!-- Floating graphic -->
  <div class="absolute top-10 right-10 animate-float">
    <div class="bg-white/20 backdrop-blur-sm p-4 rounded-full">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
      </svg>
    </div>
  </div>
  
  <!-- Floating graphic 2 -->
  <div class="absolute bottom-10 left-10 animate-float" style="animation-delay: 1.5s;">
    <div class="bg-white/20 backdrop-blur-sm p-4 rounded-full">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
      </svg>
    </div>
  </div>
  
  
  <!-- Login container -->
  <div class="login-container bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden z-10">
    <div class="relative">
      <!-- Header with gradient background -->
      <div class="bg-gradient-to-r from-primary to-secondary py-8 px-6 text-center">
        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
          </svg>
        </div>
        <h1 class="text-3xl font-bold text-white">Administrator Login</h1>
        <p class="text-blue-100 mt-2">Please sign in to access the dashboard</p>
      </div>
      
      <div class="px-8 py-8 relative">
        <form action="cek_login.php" method="post" class="space-y-6">
          <div class="input-group">
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-user text-gray-400"></i>
              </div>
              <input 
                type="text" 
                name="username" 
                id="username" 
                required
                placeholder="Enter your username"
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
              >
            </div>
          </div>
          
          <div class="input-group">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-lock text-gray-400"></i>
              </div>
              <input 
                type="password" 
                name="password" 
                id="password" 
                required
                placeholder="Enter your password"
                class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
              >
              <span 
                class="password-toggle" 
                onclick="togglePassword()"
                id="togglePassword"
              >
                <i class="far fa-eye"></i>
              </span>
            </div>
          </div>
          
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input 
                id="remember-me" 
                name="remember-me" 
                type="checkbox" 
                class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
              >
              <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                Remember me
              </label>
            </div>
            <div class="text-sm">
              <a href="#" class="font-medium text-primary hover:text-secondary transition">
                Forgot password?
              </a>
            </div>
          </div>
          
          <div class="flex space-x-4">
            <input 
              type="submit" 
              name="login" 
              value="Login"
              class="btn-login flex-1 text-white px-4 py-3 rounded-lg font-semibold shadow-md cursor-pointer"
            >
            <input 
              type="reset" 
              name="cancel" 
              value="Cancel"
              class="btn-cancel flex-1 bg-gray-100 text-gray-700 px-4 py-3 rounded-lg font-semibold cursor-pointer"
            >
          </div>
        </form>
        
        <div class="mt-6 text-center">
          <p class="text-sm text-gray-600">
            &copy; <?php echo date('Y'); ?> - Yudha adi nugraha. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Wave background -->
  <div class="wave-bg"></div>
  
  <script>
    // Toggle password visibility
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('togglePassword');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.innerHTML = '<i class="far fa-eye-slash"></i>';
      } else {
        passwordInput.type = 'password';
        toggleIcon.innerHTML = '<i class="far fa-eye"></i>';
      }
    }
    
    // Add floating animation to inputs on focus
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
      input.addEventListener('focus', () => {
        input.parentElement.parentElement.classList.add('animate-pulse');
      });
      
      input.addEventListener('blur', () => {
        input.parentElement.parentElement.classList.remove('animate-pulse');
      });
    });
  </script>
</body>
</html>