<?php
session_start();

include 'config/app.php';

$errorAuth = false;
$errorRecaptcha = false;

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $secret_key = "6LfD7ggqAAAAALNBUQexKPIdtNNwegV148xucQME";

    $verifikasi = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);

    $response = json_decode($verifikasi);

    if ($response->success) {
        $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

        if (mysqli_num_rows($result) == 1) {
            $hasil = mysqli_fetch_assoc($result);

            if (password_verify($password, $hasil['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['id_akun'] = $hasil['id_akun'];
                $_SESSION['nama'] = $hasil['nama'];
                $_SESSION['username'] = $hasil['username'];
                $_SESSION['email'] = $hasil['email'];
                $_SESSION['level'] = $hasil['level'];

                header("Location: dokumentasi.php");
                exit;
            } else {
                $errorAuth = true;
                $errorMessage = "Password salah!";
            }
        } else {
            $errorAuth = true;
            $errorMessage = "Username tidak ditemukan!";
        }
    } else {
        $errorRecaptcha = true;
        $errorMessage = "Verifikasi reCAPTCHA gagal!";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | Majelis Baburrahman</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body class="bg-green-900 min-h-screen flex items-center justify-center px-4">
  <div class="bg-white p-8 rounded-2xl shadow-2xl max-w-md w-full text-center space-y-6 border-4 border-yellow-400">
    <img src="assets/img/logobbr.png" alt="Logo Majelis" class="w-30 mx-auto mb-3" />
    <h2 class="text-2xl font-bold text-green-800">Silahkan Login</h2>

    <?php if ($errorAuth || $errorRecaptcha) : ?>
      <div class="bg-red-100 text-red-700 px-4 py-3 rounded-md text-sm">
        <?= $errorMessage; ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-4 text-left">
      <div>
        <label for="username" class="block text-sm font-medium text-green-800 mb-1">Username</label>
        <input type="text" name="username" id="username" class="w-full px-4 py-2 border border-yellow-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan username" required />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-green-800 mb-1">Password</label>
        <div class="relative">
          <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-yellow-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 pr-10" placeholder="Masukkan password" required />
          <button type="button" onclick="togglePassword()" class="absolute right-3 top-3 text-green-700 focus:outline-none">
            <i id="eyeIcon" class="fa-solid fa-eye"></i>
          </button>
        </div>
      </div>

      <div class="flex justify-center">
        <div class="g-recaptcha" data-sitekey="6LfD7ggqAAAAAI6xTRycQzsNyt5f2b2fq0vi5XTN"></div>
      </div>

      <button type="submit" name="login" class="w-full bg-yellow-400 hover:bg-yellow-500 text-green-900 font-bold py-2 rounded-lg transition duration-300">
        Login
      </button>
    </form>

    <a href="index.php" class="inline-block mt-2 text-sm text-green-700 hover:underline hover:text-green-900 transition duration-200">
      ← Kembali ke Beranda
    </a>
  </div>

  <script>
    function togglePassword() {
      const password = document.getElementById("password");
      const icon = document.getElementById("eyeIcon");
      if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        password.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>