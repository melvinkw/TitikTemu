<?php
/**
 * mahasiswa/lapor-hilang.php
 * Form laporan kehilangan (Figma: "Lapor Kehilangan"). Tampilan statis — belum mengirim data.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Lapor Kehilangan';
$base = baseUrl();

// Pilihan dropdown (diambil dari versi repo sebelumnya — Figma tidak menentukan isinya)
$kategori = [
    'elektronik'      => 'Elektronik',
    'aksesoris'       => 'Aksesoris',
    'kartu-identitas' => 'Kartu Identitas',
    'buku'            => 'Buku',
    'lainnya'         => 'Lainnya',
];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="flex flex-col items-center px-5 pb-[63px] pt-[39px] sm:px-10 lg:px-20">
    <form class="panel" onsubmit="return false">
        <?php component('page-heading', [
            'title'    => 'Form Kehilangan Barang',
            'subtitle' => 'Isi form dibawah ini dengan detail lengkap untuk mempermudah pencarian',
        ]); ?>

        <div class="flex flex-col gap-4">
            <?php component('field', ['label' => 'Kategori Barang', 'name' => 'kategori', 'type' => 'select',
                                      'placeholder' => 'Pilih Kategori', 'options' => $kategori]); ?>
            <?php component('field', ['label' => 'Nama Barang', 'name' => 'nama_barang',
                                      'placeholder' => 'Contoh: Earbuds, Tumbler, Charger Laptop']); ?>
            <?php component('field', ['label' => 'Deskripsi Barang', 'name' => 'deskripsi', 'type' => 'textarea',
                                      'placeholder' => 'Tuliskan detail/ciri-ciri umum barang',
                                      'helper' => '* Semakin detail informasi yang diberikan, semakin mudah barang ditemukan.']); ?>
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <?php component('field', ['label' => 'Email', 'name' => 'email', 'type' => 'email']); ?>
                <?php component('field', ['label' => 'Lokasi Terakhir Dilihat', 'name' => 'lokasi',
                                          'placeholder' => 'Contoh: Kantin Gedung A, Parkiran motor B']); ?>
                <?php component('field', ['label' => 'Tanggal & Waktu', 'name' => 'waktu', 'type' => 'datetime']); ?>
            </div>
        </div>

        <?php component('form-actions', [
            'backHref'   => $base . '/mahasiswa/dashboard.php',
            'submitHref' => $base . '/mahasiswa/review-hilang.php',
        ]); ?>
    </form>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
