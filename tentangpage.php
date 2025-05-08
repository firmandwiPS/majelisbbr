<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Majelis Baburrahman</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <style>
    html {
      scroll-behavior: smooth;
    }
    .animate-infinite {
      animation-iteration-count: infinite;
    }
  </style>
</head>
<body class="font-sans bg-gray-100 text-gray-800">

<!-- HERO SECTION -->
<section class="relative min-h-screen flex items-center justify-center bg-fixed bg-center bg-cover text-white" style="background-image: url('assets/img/foto1.jpg');" id="tentang">
  <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
  <div class="relative z-10 container mx-auto px-6 text-center">
    <h1 class="text-5xl md:text-7xl font-extrabold mb-6 text-yellow-300 drop-shadow-[0_5px_10px_rgba(255,255,255,0.3)] animate-bounce animate-infinite" data-aos="fade-down">
      Majelis Baburrahman
    </h1>
    <p class="text-xl md:text-2xl font-medium text-gray-200 max-w-3xl mx-auto mb-10" data-aos="fade-up" data-aos-delay="200">
      Tempat bertumbuh dalam <span class="text-yellow-400 font-semibold">ilmu, cinta, dan amal sosial</span>. Bersama membangun umat, menebar keberkahan.
    </p>
    <a href="#kegiatan" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-green-900 font-bold px-8 py-4 rounded-full text-lg shadow-lg hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="400">
      Lihat Kegiatan
    </a>
  </div>
</section>


<!-- TENTANG MAJELIS -->
<section class="bg-white min-h-screen py-28">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-14" style="color: #065f46;" data-aos="fade-down">Tentang Majelis</h2>
    <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto text-lg md:text-xl leading-relaxed text-gray-700">
      <div data-aos="fade-right">
        <h3 class="text-3xl font-semibold text-yellow-600 mb-4">Awal Berdiri</h3>
        <p>Majelis ini didirikan oleh <strong style="color: #065f46;">KH. Ahmad Syukri</strong> pada tahun <strong style="color: #065f46;">2015</strong>. Dimulai dari kajian kecil di rumah, kini telah berkembang menjadi komunitas sosial dan spiritual yang aktif.</p>
      </div>
      <div data-aos="fade-left">
        <h3 class="text-3xl font-semibold text-yellow-600 mb-4">Visi & Misi</h3>
        <p class="mb-3"><strong style="color: #065f46;">Visi:</strong> Menjadi pelita yang menyinari umat dengan ilmu, cinta, dan kepedulian sosial.</p>
        <p class="mb-2"><strong style="color: #065f46;">Misi:</strong></p>
        <ul class="list-disc ml-6 space-y-2">
          <li>Menghidupkan ukhuwah dan ibadah melalui kegiatan dakwah dan sosial.</li>
          <li>Menyebarkan dakwah dan edukasi ke seluruh lapisan masyarakat.</li>
          <li>Memberikan bantuan spiritual, pendidikan, dan kesejahteraan umat.</li>
        </ul>
      </div>
    </div>
    <div class="mt-20 max-w-6xl mx-auto text-lg md:text-xl" data-aos="fade-up">
      <h3 class="text-3xl font-semibold text-yellow-600 mb-4">Sejarah dan Pengalaman</h3>
      <p>Kami telah mengadakan banyak kegiatan sosial, dari berbagi takjil Ramadan, santunan yatim, membersihkan masjid, hingga dakwah ke desa. Semua dilakukan dengan semangat memberi manfaat bagi umat.</p>
    </div>
  </div>
</section>


<!-- STRUKTUR ORGANISASI -->
<section class="py-24 text-white" >
  <div class="container mx-auto px-6">
    <h3 class="text-4xl md:text-5xl font-bold text-center text-yellow-400 mb-20" data-aos="fade-up">
      Struktur Organisasi
    </h3>

    <!-- Ketua -->
    <div class="flex justify-center mb-16" data-aos="fade-down">
      <div class="flex flex-col items-center text-center transition-transform duration-300 hover:scale-105">
        <div class="relative w-60 h-60 rounded-full overflow-hidden shadow-2xl">
          <img src="assets/img/ketua.png" alt="Ketua Majelis" class="w-full h-full object-cover">
        </div>
        <div class="mt-6">
          <h4 class="text-2xl font-bold text-yellow-400 mb-2">Ustadz Haji, M Raihan Ramadhan</h4>
          <p class="text-lg text-white">Ketua Majelis</p>
        </div>
      </div>
    </div>

    <!-- Wakil Ketua -->
    <div class="flex justify-center mb-16" data-aos="fade-left">
      <div class="flex flex-col items-center text-center transition-transform duration-300 hover:scale-105">
        <div class="relative w-60 h-60 rounded-full overflow-hidden shadow-2xl">
          <img src="assets/img/wakil.jpg" alt="Wakil Ketua" class="w-full h-full object-cover">
        </div>
        <div class="mt-6">
          <h4 class="text-xl font-semibold text-yellow-400">Hj. Siti Maemunah</h4>
          <p class="text-white">Wakil Ketua</p>
        </div>
      </div>
    </div>

    <!-- Anggota Lain -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10 text-center" data-aos="fade-up">
      
      <!-- Sekretaris -->
      <div class="flex flex-col items-center transition-transform duration-300 hover:scale-105">
        <div class="relative w-60 h-60 rounded-full overflow-hidden shadow-2xl">
          <img src="assets/img/sekretaris.jpg" alt="Sekretaris" class="w-full h-full object-cover">
        </div>
        <div class="mt-6">
          <h4 class="text-xl font-semibold text-yellow-400">Nur Aini</h4>
          <p class="text-white">Sekretaris</p>
        </div>
      </div>

      <!-- Bendahara -->
      <div class="flex flex-col items-center transition-transform duration-300 hover:scale-105">
        <div class="relative w-60 h-60 rounded-full overflow-hidden shadow-2xl">
          <img src="assets/img/bendahara.jpg" alt="Bendahara" class="w-full h-full object-cover">
        </div>
        <div class="mt-6">
          <h4 class="text-xl font-semibold text-yellow-400">Rina Fauziah</h4>
          <p class="text-white">Bendahara</p>
        </div>
      </div>

      <!-- Sie Humas -->
      <div class="flex flex-col items-center transition-transform duration-300 hover:scale-105">
        <div class="relative w-60 h-60 rounded-full overflow-hidden shadow-2xl">
          <img src="assets/img/humas.jpg" alt="Humas" class="w-full h-full object-cover">
        </div>
        <div class="mt-6">
          <h4 class="text-xl font-semibold text-yellow-400">Lina Wahyuni</h4>
          <p class="text-white">Sie Humas</p>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- LOKASI -->
<section class="relative bg-fixed bg-center bg-cover py-28" style="background-image: url('assets/img/foto2.jpg');">
  <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm"></div>
  <div class="relative z-10 text-center text-white px-6">
    <h3 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-6" data-aos="fade-down">Lokasi Kami</h3>
    <p class="max-w-xl mx-auto text-lg md:text-xl leading-relaxed text-gray-200" data-aos="fade-up">
      Berlokasi di <strong class="text-yellow-400">Jl. Pelita No.10, Harapan Baru, Kota Bandung</strong>, pusat aktivitas dakwah dan sosial kami.
    </p>
    <div class="mt-10 flex justify-center" data-aos="zoom-in" data-aos-delay="200">
      <iframe class="w-full max-w-xl h-72 rounded-xl shadow-2xl border-4 border-yellow-400"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.439648866826!2d106.8288151!3d-6.17017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5ce68b5e01d%3A0xcafaf042d5840c6c!2sMasjid%20Istiqlal!5e0!3m2!1sen!2sid!4v1682803847856!5m2!1sen!2sid" 
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</section>

<!-- GALERI FOTO -->
<section class="bg-green-700 py-20 text-white" id="kegiatan">
  <div class="container mx-auto px-6">
    <h3 class="text-4xl md:text-5xl font-bold text-center mb-12" data-aos="fade-up">Cuplikan Aktivitas Kami</h3>
    <div class="grid md:grid-cols-3 gap-8">
      <img src="assets/img/kegiatan1.jpg" alt="Pengajian Rutin" class="rounded-xl shadow-lg hover:scale-105 transition duration-300" data-aos="zoom-in">
      <img src="assets/img/kegiatan2.jpg" alt="Santunan Yatim" class="rounded-xl shadow-lg hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="100">
      <img src="assets/img/kegiatan3.jpg" alt="Tour Rohani" class="rounded-xl shadow-lg hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="200">
    </div>
  </div>
</section>

<!-- SCRIPT AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: false }); // animasi akan terus aktif saat scroll
</script>

</body>
</html>
