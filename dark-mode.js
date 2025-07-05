// dark-mode.js
document.addEventListener('DOMContentLoaded', function() {
  const darkModeToggle = document.getElementById('darkModeToggle');
  const body = document.body;
  
  // Cek preferensi pengguna dari localStorage
  const savedDarkMode = localStorage.getItem('darkMode');
  
  // Cek preferensi sistem
  const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  
  // Atur status awal toggle
  if (savedDarkMode === 'enabled') {
    body.classList.add('dark-mode');
    if (darkModeToggle) darkModeToggle.checked = true;
  } else if (savedDarkMode === 'disabled') {
    body.classList.remove('dark-mode');
    if (darkModeToggle) darkModeToggle.checked = false;
  } else if (systemPrefersDark) {
    // Jika tidak ada preferensi pengguna, ikuti sistem
    body.classList.add('dark-mode');
    if (darkModeToggle) darkModeToggle.checked = true;
    localStorage.setItem('darkMode', 'enabled');
  }
  
  // Tambahkan event listener untuk toggle
  if (darkModeToggle) {
    darkModeToggle.addEventListener('change', function() {
      if (this.checked) {
        body.classList.add('dark-mode');
        localStorage.setItem('darkMode', 'enabled');
      } else {
        body.classList.remove('dark-mode');
        localStorage.setItem('darkMode', 'disabled');
      }
    });
  }
  
  // Update saat preferensi sistem berubah (opsional)
  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
    const newPrefersDark = e.matches;
    // Hanya jika pengguna belum memilih (preferensi tersimpan)
    if (!localStorage.getItem('darkMode')) {
      if (newPrefersDark) {
        body.classList.add('dark-mode');
        if (darkModeToggle) darkModeToggle.checked = true;
        localStorage.setItem('darkMode', 'enabled');
      } else {
        body.classList.remove('dark-mode');
        if (darkModeToggle) darkModeToggle.checked = false;
        localStorage.setItem('darkMode', 'disabled');
      }
    }
  });
});