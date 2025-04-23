<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Login Dulu!!');
            document.location.href='login.php';
        </script>";
    exit;
}

if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2) {
    echo "<script>
            alert('Perhatian Anda Tidak Punya Hak Akses!!');
            document.location.href='akun.php';
        </script>";
    exit;
}

$title = 'Dokumentasi';
include 'layout/header.php';


?>



       




  <?php include 'layout/footer.php' ?>