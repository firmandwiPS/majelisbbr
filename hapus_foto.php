<?php
require 'config/databasefoto.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['foto'])) {
    $fotoName = basename($_POST['foto']); // Ambil nama file saja
    $fotoPath = 'uploads/' . $fotoName;   // Path lengkap file

    // Cek apakah foto ada di database
    $query = "SELECT * FROM dokumentasi_kegiatan WHERE foto LIKE '%$fotoName%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Hapus file dari folder uploads
        if (file_exists($fotoPath)) {
            unlink($fotoPath); // Hapus file dari server
        }

        // Hapus data dari database
        $delete = mysqli_query($conn, "DELETE FROM dokumentasi_kegiatan WHERE foto LIKE '%$fotoName%'");

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
