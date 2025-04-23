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
$title = 'Dokumentasi';
include 'layout/header.php';
?>

<div class="container mx-auto px-4 py-10">
    <!-- Upload Form -->
    <div class="bg-emerald-700 text-white rounded-2xl shadow-xl p-8 mb-12 animate__animated animate__fadeIn">
        <h1 class="text-3xl font-bold mb-4">Upload Dokumentasi Kegiatan</h1>
        <p class="text-green-100 mb-6">Unggah banyak foto dalam satu kegiatan Majelis Baburrahman.</p>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-5">
            <input type="text" name="nama_kegiatan" placeholder="Contoh: Pengajian Jumat" required
                   class="border-2 border-green-300 rounded-lg w-full p-3 text-black bg-white focus:outline-none focus:ring-2 focus:ring-green-500" />
            <input type="file" name="foto[]" multiple required
                   class="border-2 border-green-300 rounded-lg w-full p-3 text-black bg-white focus:outline-none focus:ring-2 focus:ring-green-500" />
            <button type="submit" name="upload"
                    class="bg-white text-green-800 font-bold px-6 py-3 rounded-xl shadow hover:bg-green-100 hover:text-green-900 transition-all duration-300">
                Upload
            </button>
        </form>
    </div>

    <!-- Galeri Kegiatan -->
    <h2 class="text-2xl font-bold text-green-800 mb-6">📸 Galeri Kegiatan Majelis</h2>
    <?php
    $kegiatan = mysqli_query($conn, "SELECT DISTINCT nama_kegiatan FROM dokumentasi_kegiatan ORDER BY uploaded_at DESC");
    $index = 0;
    while ($k = mysqli_fetch_assoc($kegiatan)) {
        $namaKegiatan = htmlspecialchars($k['nama_kegiatan']);
        echo '<div class="mb-6">';
        echo '<button onclick="openModal(' . $index . ')" class="bg-emerald-100 hover:bg-emerald-200 text-green-800 font-semibold py-3 px-6 rounded-xl shadow w-full text-left">' . $namaKegiatan . '</button>';
        echo '</div>';
        $index++;
    }
    ?>
</div>

<!-- Modal Galeri -->
<?php
$kegiatan = mysqli_query($conn, "SELECT DISTINCT nama_kegiatan FROM dokumentasi_kegiatan ORDER BY uploaded_at DESC");
$index = 0;
while ($k = mysqli_fetch_assoc($kegiatan)) {
    $namaKegiatan = htmlspecialchars($k['nama_kegiatan']);
?>
<div id="modal-<?= $index ?>" class="fixed inset-0 z-50 bg-black bg-opacity-70 hidden items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative">
        <div class="sticky top-0 bg-white p-4 flex justify-between items-center border-b">
            <h3 class="text-xl font-bold text-green-800"><?= $namaKegiatan ?></h3>
            <button onclick="closeModal(<?= $index ?>)" class="text-2xl text-gray-700 hover:text-red-600">&times;</button>
        </div>
        <div class="p-4 grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php
            $fotos = mysqli_query($conn, "SELECT * FROM dokumentasi_kegiatan WHERE nama_kegiatan = '" . mysqli_real_escape_string($conn, $k['nama_kegiatan']) . "' ORDER BY uploaded_at DESC");
            while ($row = mysqli_fetch_assoc($fotos)) {
                echo '<img src="' . $row['foto'] . '" alt="Foto kegiatan" class="rounded-lg cursor-pointer hover:scale-105 transition-transform duration-200" onclick="showLargeImage(this.src)" />';
            }
            ?>
        </div>
    </div>
</div>
<?php $index++; } ?>

<!-- Modal Gambar Besar -->
<div id="image-modal" class="fixed inset-0 z-50 bg-black bg-opacity-90 hidden flex items-center justify-center px-4">
    <div class="relative">
        <img id="large-image" src="" class="max-h-[90vh] rounded-xl shadow-2xl border-4 border-white" />
        <button onclick="closeImage()" class="absolute top-2 right-2 text-white text-3xl font-bold bg-black bg-opacity-50 px-2 rounded">&times;</button>
    </div>
</div>

<script>
    function openModal(index) {
        document.getElementById('modal-' + index).classList.remove('hidden');
        document.getElementById('modal-' + index).classList.add('flex');
    }

    function closeModal(index) {
        document.getElementById('modal-' + index).classList.add('hidden');
    }

    function showLargeImage(src) {
        document.getElementById('large-image').src = src;
        document.getElementById('image-modal').classList.remove('hidden');
        document.getElementById('image-modal').classList.add('flex');
    }

    function closeImage() {
        document.getElementById('image-modal').classList.add('hidden');
    }

    document.getElementById('image-modal').addEventListener('click', function (e) {
        if (e.target === this) closeImage();
    });

    <?php for ($i = 0; $i < $index; $i++) : ?>
    document.getElementById('modal-<?= $i ?>').addEventListener('click', function (e) {
        if (e.target === this) closeModal(<?= $i ?>);
    });
    <?php endfor; ?>
</script>

<?php include 'layout/footer.php'; ?>
