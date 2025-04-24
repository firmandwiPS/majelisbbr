<?php
require 'config/databasefoto.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['foto'])) {
    $fotoPath = $_POST['foto'];
    $fotoPath = mysqli_real_escape_string($conn, $fotoPath);

    // Ambil nama file
    $filename = basename($fotoPath);

    // Cek apakah foto ada di database
    $query = "SELECT * FROM dokumentasi_kegiatan WHERE foto LIKE '%$filename%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Hapus file dari folder
        if (file_exists($fotoPath)) {
            unlink($fotoPath); // Hapus file dari server
        }

        // Hapus data dari database
        $delete = mysqli_query($conn, "DELETE FROM dokumentasi_kegiatan WHERE foto LIKE '%$filename%'");

        if ($delete) {
            echo "Foto berhasil dihapus.";
        } else {
            echo "Gagal menghapus foto dari database.";
        }
    } else {
        echo "Foto tidak ditemukan di database.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
