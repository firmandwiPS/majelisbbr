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

<div class="content-wrapper  px-4 py-10">
<!-- Upload Form -->
<div class=" bg-gradient-to-br from-emerald-600 to-green-700 text-white rounded-2xl shadow-2xl p-8 mb-12 animate__animated animate__fadeIn">
    <div class="flex items-center gap-3 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white bg-emerald-900 p-2 rounded-full shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2-2h6l2 2h4v11H3V7z" />
        </svg>
        <h1 class="text-3xl font-extrabold">Upload Dokumentasi Kegiatan</h1>
    </div>
    <p class="text-green-100 mb-6 text-sm sm:text-base">Unggah banyak foto dalam satu kegiatan Majelis Baburrahman. File akan otomatis dikategorikan.</p>

    <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-5">
        <div>
            <label class="block text-sm font-semibold mb-1 text-white" for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" required
                   class="border border-green-300 bg-white text-gray-800 rounded-lg w-full px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm" />
        </div>

        <div>
            <label for="foto" class="block text-sm font-semibold mb-2 text-white">Upload Foto Kegiatan</label>
            <div class="relative flex flex-col sm:flex-row items-center gap-4 bg-white rounded-xl border-2 border-dashed border-green-400 px-4 py-6 cursor-pointer hover:border-green-600 hover:bg-green-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 16v-1a4 4 0 014-4h2m4 0h2a4 4 0 014 4v1m-6-6V4m0 0L8 8m4-4l4 4" />
                </svg>
                <div class="text-left">
                    <p class="text-green-800 font-medium text-sm sm:text-base">Pilih Foto Kegiatan</p>
                    <p class="text-xs text-gray-600">Bisa memilih lebih dari satu foto sekaligus</p>
                </div>
                <input type="file" name="foto[]" id="foto" multiple required
               class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10"
               onchange="handleFileSelect(event)" />
            </div>
        </div>

        <div id="preview" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-4"></div>

        <div>
            <button type="submit" name="upload"
                    class="bg-white text-green-800 font-bold px-6 py-3 rounded-xl shadow hover:bg-green-100 hover:text-green-900 transition-all duration-300 w-full sm:w-auto">
                Upload
            </button>
        </div>
    </form>
</div>

<!-- Galeri -->
<h2 class="text-2xl font-bold text-green-800 mb-6">📸 Galeri Kegiatan Majelis</h2>
<?php

$kegiatan = mysqli_query($conn, "
    SELECT nama_kegiatan, MAX(uploaded_at) as last_uploaded 
    FROM dokumentasi_kegiatan 
    GROUP BY nama_kegiatan 
    ORDER BY last_uploaded DESC
");

$index = 0;
while ($k = mysqli_fetch_assoc($kegiatan)) {
    $namaKegiatan = htmlspecialchars($k['nama_kegiatan']);
    echo '<div class="mb-4 flex items-center gap-3">';
    echo '<button onclick="openModal(' . $index . ')" class="flex-1 bg-emerald-100 hover:bg-emerald-200 text-green-800 font-semibold py-3 px-6 rounded-xl shadow text-left">' . $namaKegiatan . '</button>';
    echo '<form method="POST" action="hapus_folder.php" onsubmit="return confirm(\'Yakin ingin menghapus semua foto kegiatan ini?\')">';
    echo '<input type="hidden" name="nama_kegiatan" value="' . $namaKegiatan . '">';
    echo '<button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-lg shadow">Hapus</button>';
    echo '</form>';
    echo '<button onclick="openRenameModal(\'' . $namaKegiatan . '\')" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold px-4 py-2 rounded-lg shadow">Ubah</button>';
    echo '</div>';
    $index++;
}
?>
</div>



<!-- Modal Ubah Nama -->
<div id="rename-modal" class="fixed inset-0 z-50 bg-black bg-opacity-60 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-xl font-bold text-green-800 mb-4">Ubah Nama Kegiatan</h2>
        <form method="POST" action="ubah_nama_kegiatan.php" class="space-y-4">
            <input type="hidden" name="nama_lama" id="rename-nama-lama">
            <div>
                <label class="text-sm font-medium text-gray-700 mb-1 block">Nama Baru</label>
                <input type="text" name="nama_baru" id="rename-nama-baru" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-green-500">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeRenameModal()" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold hover:bg-green-700 rounded-lg">Ubah</button>
            </div>
        </form>
    </div>
</div>


<?php


$kegiatan = mysqli_query($conn, "
    SELECT nama_kegiatan, MAX(uploaded_at) as last_uploaded 
    FROM dokumentasi_kegiatan 
    GROUP BY nama_kegiatan 
    ORDER BY last_uploaded DESC
");

$index = 0;
while ($k = mysqli_fetch_assoc($kegiatan)) {
    $namaKegiatan = htmlspecialchars($k['nama_kegiatan']);
?>
<div id="modal-<?= $index ?>" class="content-wrapper fixed inset-0 z-50 bg-black bg-opacity-70 hidden flex items-center justify-center p-2 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative animate-fadeIn">
        <div class="sticky top-0 bg-white px-4 py-3 flex justify-between items-center border-b border-gray-200 z-10">
            <h3 class="text-lg md:text-xl font-bold text-green-800"><?= $namaKegiatan ?></h3>
            <button onclick="closeModal(<?= $index ?>)" class="text-2xl text-gray-600 hover:text-red-500 transition">&times;</button>
        </div>


        

        <div class="p-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
            <?php
            $fotos = mysqli_query($conn, "SELECT * FROM dokumentasi_kegiatan WHERE nama_kegiatan = '" . mysqli_real_escape_string($conn, $k['nama_kegiatan']) . "' ORDER BY uploaded_at DESC");
            while ($row = mysqli_fetch_assoc($fotos)) {
                echo '<img id="foto' . $row['id'] . '" src="' . $row['foto'] . '" alt="Foto kegiatan"
                      class="rounded-lg w-full h-32 object-cover cursor-pointer hover:scale-105 transition duration-200 shadow-sm"
                      onclick="showLargeImage(this.src, \'foto' . $row['id'] . '\')" />';
            }
            ?>
        </div>

        <div class="px-4 pt-3 border-t mt-4 flex justify-end">
            <button onclick="toggleForm(<?= $index ?>)"
                    class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-xl transition shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Foto
            </button>
        </div>

        <div id="form-upload-<?= $index ?>" class="p-4 hidden transition duration-300">
            <form action="upload_lanjutan.php" method="post" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="nama_kegiatan" value="<?= $namaKegiatan ?>">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Foto (boleh banyak):</label>
                    <input type="file" name="foto[]" multiple required class="block w-full border border-gray-300 rounded-lg shadow-sm">
                </div>
                <button type="submit" name="upload"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                    Upload Foto
                </button>
            </form>
        </div>
    </div>
</div>
<?php $index++; } ?>

<!-- Modal Gambar Besar -->
<div id="image-modal" class=" content-wrapper fixed inset-0 z-50 bg-black bg-opacity-90 hidden flex items-center justify-center px-4">
    <div class="relative">
        <input type="hidden" id="large-image-path" />
        <img id="large-image" src="" class="max-h-[90vh] rounded-xl shadow-2xl border-4 border-white" data-element-id="">
        <button onclick="closeImage()" class="absolute top-2 right-2 text-white text-3xl font-bold bg-black bg-opacity-50 px-2 rounded">&times;</button>
        <button onclick="deleteImage()" class="absolute bottom-2 right-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold px-4 py-2 rounded-lg shadow">Hapus Foto Ini</button>
    </div>
</div>

<script>
    let selectedFiles = [];

    function handleFileSelect(event) {
        const files = Array.from(event.target.files);
        selectedFiles = [...selectedFiles, ...files];
        updatePreview();
    }

    function updatePreview() {
        const preview = document.getElementById('preview');
        preview.innerHTML = '';
        selectedFiles.forEach((file, index) => {
            if (!file.type.match('image')) return;
            const reader = new FileReader();
            reader.onload = function (e) {
                const div = document.createElement('div');
                div.className = 'relative group';
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-40 object-cover rounded-xl shadow-lg';
                const btn = document.createElement('button');
                btn.innerHTML = '&times;';
                btn.onclick = () => { selectedFiles.splice(index, 1); updatePreview(); };
                btn.className = 'absolute top-1 right-1 bg-red-600 text-white rounded-full px-2 shadow';
                div.appendChild(img);
                div.appendChild(btn);
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }

    function openModal(index) {
        document.getElementById('modal-' + index).classList.remove('hidden');
        document.getElementById('modal-' + index).classList.add('flex');
    }

    function closeModal(index) {
        document.getElementById('modal-' + index).classList.add('hidden');
    }

    function showLargeImage(src, elementId) {
        document.getElementById('large-image').src = src;
        document.getElementById('large-image-path').value = src;
        document.getElementById('large-image').setAttribute('data-element-id', elementId);
        document.getElementById('image-modal').classList.remove('hidden');
        document.getElementById('image-modal').classList.add('flex');
    }

    function closeImage() {
        document.getElementById('image-modal').classList.add('hidden');
    }

    function deleteImage() {
        const imageUrl = document.getElementById('large-image-path').value;
        if (!imageUrl) return;
        if (confirm('Yakin ingin menghapus foto ini?')) {
            fetch('hapus_foto.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'foto=' + encodeURIComponent(imageUrl)
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                closeImage();
                const elementId = document.getElementById('large-image').getAttribute('data-element-id');
                const imgElement = document.getElementById(elementId);
                if (imgElement) imgElement.remove();
            })
            .catch(error => {
                alert('Gagal menghapus gambar: ' + error);
            });
        }
    }

    function toggleForm(index) {
        const form = document.getElementById('form-upload-' + index);
        form.classList.toggle('hidden');
    }




    function openRenameModal(namaKegiatan) {
    document.getElementById('rename-nama-lama').value = namaKegiatan;
    document.getElementById('rename-nama-baru').value = namaKegiatan;
    document.getElementById('rename-modal').classList.remove('hidden');
    document.getElementById('rename-modal').classList.add('flex');
}

function closeRenameModal() {
    document.getElementById('rename-modal').classList.add('hidden');
}

</script>

<?php include 'layout/footer.php'; ?>
