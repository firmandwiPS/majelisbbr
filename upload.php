<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>alert('Login Dulu!!');location.href='login.php';</script>";
    exit;
}

require 'koneksi.php'; // file koneksi ke database

if (isset($_POST['upload'])) {
    $nama_kegiatan = htmlspecialchars($_POST['nama_kegiatan']);
    $jumlah = count($_FILES['foto']['name']);
    
    for ($i = 0; $i < $jumlah; $i++) {
        $namaFile = $_FILES['foto']['name'][$i];
        $tmp = $_FILES['foto']['tmp_name'][$i];
        $path = 'uploads/' . time() . '_' . $namaFile;

        if (move_uploaded_file($tmp, $path)) {
            mysqli_query($conn, "INSERT INTO dokumentasi_kegiatan (nama_kegiatan, foto) VALUES ('$nama_kegiatan', '$path')");
        }
    }

    echo "<script>alert('Foto berhasil diupload');location.href='index.php';</script>";
}
?>
