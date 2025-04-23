<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>alert('Login Dulu!!'); location.href='login.php';</script>";
    exit;
}

if ($_SESSION["level"] != 1 && $_SESSION["level"] != 2) {
    echo "<script>alert('Perhatian Anda Tidak Punya Hak Akses!!'); location.href='akun.php';</script>";
    exit;
}

require 'config/databasefoto.php';

if (isset($_POST['upload'])) {
    $nama_kegiatan = htmlspecialchars($_POST['nama_kegiatan']);
    $total = count($_FILES['foto']['name']);

    for ($i = 0; $i < $total; $i++) {
        $tmp_name = $_FILES['foto']['tmp_name'][$i];
        $filename = uniqid() . '_' . $_FILES['foto']['name'][$i];
        $target_path = 'uploads/' . $filename;

        if (move_uploaded_file($tmp_name, $target_path)) {
            mysqli_query($conn, "INSERT INTO dokumentasi_kegiatan (nama_kegiatan, foto) VALUES ('$nama_kegiatan', '$target_path')");
        }
    }

    echo "<script>alert('Foto berhasil diunggah!'); location.href='dokumentasi.php';</script>";
}
?>
