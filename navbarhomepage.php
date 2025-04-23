<!-- Header Responsive Hijau -->
<header class="bg-green-800 text-white shadow-md sticky top-0 z-50">
  <div class="container mx-auto flex items-center justify-between px-4 py-4">
    <!-- Logo dan Nama -->
    <div class="flex items-center gap-3">
      <img src="assets/img/logo.png" alt="Logo Majelis" class="w-10 h-10 rounded-full shadow-md">
      <h1 class="text-xl font-bold">Majelis Baburrahman</h1>
    </div>

    <!-- Tombol Hamburger -->
    <button id="menuToggle" class="sm:hidden focus:outline-none transform transition-all duration-300 ease-in-out">
      <svg id="hamburgerIcon" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
      <svg id="closeIcon" class="w-7 h-7 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M6 18L18 6M6 6l12 12"></path>
      </svg>
    </button>

    <!-- Navigasi Desktop -->
    <nav class="hidden sm:flex gap-6 items-center text-sm">
      <a href="index.php" class="hover:underline transition-all duration-300 ease-in-out transform hover:scale-105">Tentang</a>
      <a href="kegiatanpage.php" class="hover:underline transition-all duration-300 ease-in-out transform hover:scale-105">Kegiatan</a>
      <a href="galeripage.php" class="hover:underline transition-all duration-300 ease-in-out transform hover:scale-105">Galeri</a>
      <a href="login.php"
        class="bg-white text-green-700 px-4 py-2 rounded-full font-semibold hover:bg-green-100 transition-all duration-300 ease-in-out transform hover:scale-105">Login</a>
    </nav>
  </div>

  <!-- Navigasi Mobile Dropdown -->
  <div id="mobileMenu"
    class="sm:hidden hidden flex flex-col gap-4 px-6 py-4 bg-green-800 text-white transition-all duration-300 transform translate-y-[-100%]">
    <a href="index.php" class="hover:underline transition-all duration-300 ease-in-out transform hover:scale-105">Tentang</a>
    <a href="kegiatanpage.php" class="hover:underline transition-all duration-300 ease-in-out transform hover:scale-105">Kegiatan</a>
    <a href="galeripage.php" class="hover:underline transition-all duration-300 ease-in-out transform hover:scale-105">Galeri</a>
    <a href="login.php"
      class="bg-white text-green-700 px-4 py-2 rounded-full font-semibold hover:bg-green-100 transition-all duration-300 ease-in-out transform hover:scale-105 w-fit">Login</a>
  </div>
</header>

<!-- Script Toggle Menu -->
<script>
  const toggleBtn = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");
  const hamburgerIcon = document.getElementById("hamburgerIcon");
  const closeIcon = document.getElementById("closeIcon");

  toggleBtn.addEventListener("click", () => {
    // Toggle visibility of mobile menu
    mobileMenu.classList.toggle("hidden");

    // Toggle hamburger and close icons
    hamburgerIcon.classList.toggle("hidden");
    closeIcon.classList.toggle("hidden");

    // Add slide-in animation when mobile menu is shown
    mobileMenu.classList.toggle("slideIn");
  });
</script>

<style>
  /* Slide-in animation for mobile menu */
  #mobileMenu {
    transition: transform 0.5s ease-out;
    transform: translateY(-100%);
  }

  #mobileMenu.slideIn {
    transform: translateY(0);
  }

  /* Smooth transition for hamburger to close icon */
  #hamburgerIcon, #closeIcon {
    transition: opacity 0.3s ease-in-out;
  }

  /* Hover scale effect on menu items and login button */
  .hover\:scale-105:hover {
    transform: scale(1.05);
  }

  /* Optional: Bounce effect on hamburger icon when clicked */
  #hamburgerIcon {
    transition: transform 0.3s ease-out;
  }

  /* Bounce effect on hamburger icon when clicked */
  .bounce {
    animation: bounce 0.5s ease-in-out;
  }

  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-10px);
    }
    60% {
      transform: translateY(-5px);
    }
  }
</style>
