<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Majelis Sosial</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <style>
    html {
      scroll-behavior: smooth;
    }
    .animate-infinite {
      animation-iteration-count: infinite;
    }
    html, body {
    overflow-x: hidden; /* Mencegah scroll horizontal */
  }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

 
<?php include 'navbar.php' ?>



<?php include 'heroawal.php' ?>

<?php include 'tentangmajelis.php' ?>

<?php include 'strukturmajelis.php' ?>

<?php include 'lokasimajelis.php' ?>

<?php include 'cuplikanmajelis.php' ?>

  <!-- Footer -->
  <footer class="bg-green-700 text-white text-center p-6 mt-10">
    <p>&copy; 2025 Majelis Sosial. Semua hak dilindungi.</p>
  </footer>

  <script>

     AOS.init({ once: false });
  </script>
</body>
</html>
