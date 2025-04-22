<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Majelis Sosial</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <!-- Header -->
  <header class="bg-green-700 text-white p-5 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Majelis Sosial</h1>
      <nav class="flex gap-6 items-center text-sm">
        <ul class="flex gap-4">
          <li><a href="#tentang" class="hover:underline">Tentang</a></li>
          <li><a href="#kegiatan" class="hover:underline">Kegiatan</a></li>
          <li><a href="#galeri" class="hover:underline">Galeri</a></li>
        </ul>
        <a href="#" class="bg-white text-green-700 px-4 py-2 rounded-full font-semibold hover:bg-green-100 transition">Login</a>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="bg-green-100 py-20 text-center" id="tentang">
    <div class="container mx-auto px-6" data-sr>
      <h2 class="text-4xl font-bold mb-4">Selamat Datang di Majelis Sosial</h2>
      <p class="text-lg max-w-xl mx-auto">Majelis ini telah berdiri sejak tahun <span class="font-semibold">2015</span> dan aktif dalam kegiatan sosial dan spiritual.</p>
      <p class="text-md mt-4 max-w-2xl mx-auto">Kami percaya bahwa dengan menebar kebaikan, memberi kepada yang membutuhkan, dan menyatu dengan alam, kita bisa menjadi insan yang lebih dekat kepada Allah SWT dan bermanfaat untuk sesama.</p>
    </div>
  </section>

  <!-- Misi dan Visi -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-6 text-center" data-sr>
      <h3 class="text-3xl font-semibold mb-6">Visi & Misi Kami</h3>
      <p class="max-w-3xl mx-auto text-lg">Menjadi wadah yang membawa keberkahan dan perubahan positif melalui kegiatan sosial dan keagamaan, serta mempererat tali persaudaraan antar umat.</p>
    </div>
  </section>

  <!-- Kegiatan Sosial -->
  <section class="py-16 bg-green-50" id="kegiatan">
    <div class="container mx-auto px-6" data-sr>
      <h3 class="text-3xl font-semibold text-center mb-10">Kegiatan Sosial</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-sr>
          <h4 class="text-xl font-bold mb-2">Berbagi Takjil</h4>
          <p>Membagikan takjil gratis setiap bulan Ramadhan kepada masyarakat sekitar.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-sr>
          <h4 class="text-xl font-bold mb-2">Bantuan Sosial</h4>
          <p>Menyalurkan bantuan kepada yatim piatu dan yang membutuhkan, termasuk sembako dan keperluan sekolah.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-sr>
          <h4 class="text-xl font-bold mb-2">Tour Alam</h4>
          <p>Menjelajah alam sebagai bentuk syukur atas ciptaan Allah SWT dan mempererat ukhuwah.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Galeri Kegiatan -->
  <section class="py-16 bg-white" id="galeri">
    <div class="container mx-auto px-6" data-sr>
      <h3 class="text-3xl font-semibold text-center mb-10">Galeri Kegiatan</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <img src="https://source.unsplash.com/400x300/?ramadhan,community" class="rounded-lg shadow-lg hover:scale-105 transform transition" alt="Takjil" />
        <img src="https://source.unsplash.com/400x300/?help,charity" class="rounded-lg shadow-lg hover:scale-105 transform transition" alt="Bantuan" />
        <img src="https://source.unsplash.com/400x300/?nature,tour" class="rounded-lg shadow-lg hover:scale-105 transform transition" alt="Tour Alam" />
        <img src="https://source.unsplash.com/400x300/?islam,people" class="rounded-lg shadow-lg hover:scale-105 transform transition" alt="Majelis" />
      </div>
    </div>
  </section>

  <!-- Ajakan Bergabung -->
  <section class="py-16 bg-green-100 text-center" data-sr>
    <div class="container mx-auto px-6">
      <h3 class="text-3xl font-bold mb-4">Bergabunglah Bersama Kami</h3>
      <p class="mb-6 max-w-xl mx-auto">Ayo jadi bagian dari keluarga besar Majelis Sosial dan bersama kita tebarkan kebaikan untuk umat dan lingkungan.</p>
      <a href="#" class="bg-green-700 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-green-800 transition">Daftar Sekarang</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-700 text-white text-center p-6 mt-10">
    <p>&copy; 2025 Majelis Sosial. Semua hak dilindungi.</p>
  </footer>

  <script>
    ScrollReveal().reveal('[data-sr]', {
      delay: 200,
      distance: '20px',
      duration: 1000,
      origin: 'bottom',
      reset: true
    });
  </script>
</body>
</html>
