<?php
/**
 * mahasiswa/lapor-temuan.php
 * Form laporan penemuan barang (Figma: "Lapor Temuan"). Tampilan statis — belum mengirim data.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Form Penemuan Barang';
$base = baseUrl();

// Pilihan dropdown (diambil dari versi repo sebelumnya — Figma tidak menentukan isinya)
$kategori = [
    'elektronik'      => 'Elektronik',
    'aksesoris'       => 'Aksesoris',
    'kartu-identitas' => 'Kartu Identitas',
    'buku'            => 'Buku',
    'lainnya'         => 'Lainnya',
];
$posPenyerahan = [
    'pos-satpam-utama' => 'Pos Satpam Gerbang Utama',
    'pos-gedung-satu'  => 'Pos Satpam Gedung Utama',
    'pos-jti'          => 'Pos Jurusan Teknologi Informasi',
];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="flex flex-col items-center px-5 pb-[63px] pt-[44px] sm:px-10 lg:px-20">
    <form class="panel" onsubmit="return false">
        <?php component('page-heading', [
            'title'    => 'Form Penemuan Barang',
            'subtitle' => 'Isi form dibawah ini dengan detail lengkap untuk mempermudah pencarian',
        ]); ?>

        <div class="flex flex-col gap-4">
            <?php component('field', ['label' => 'Kategori Barang', 'name' => 'kategori', 'type' => 'select',
                                      'placeholder' => 'Pilih Kategori', 'options' => $kategori]); ?>
            <?php component('field', ['label' => 'Nama Barang', 'name' => 'nama_barang',
                                      'placeholder' => 'Contoh: Earbuds, Tumbler, Charger Laptop']); ?>
            <?php component('field', ['label' => 'Kondisi dan Detail Barang', 'name' => 'detail', 'type' => 'textarea',
                                      'placeholder' => 'Tuliskan detail/ciri-ciri umum barang',
                                      'helper' => '* Semakin detail informasi yang diberikan, semakin mudah barang ditemukan.']); ?>
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <?php component('field', ['label' => 'Email', 'name' => 'email', 'type' => 'email']); ?>
                <?php component('field', ['label' => 'Lokasi Ditemukan', 'name' => 'lokasi',
                                          'placeholder' => 'Contoh: Kantin Gedung A, Parkiran motor B']); ?>
                <?php component('field', ['label' => 'Tanggal & Waktu', 'name' => 'waktu', 'type' => 'datetime']); ?>
            </div>
            <?php component('upload-box'); ?>
            <div class="flex flex-col gap-2">
                <?php component('field', ['label' => 'Pilih Pos Penyerahan', 'name' => 'pos', 'type' => 'select',
                                          'placeholder' => 'Pilih Lokasi Pos Penyerahan', 'options' => $posPenyerahan]); ?>
                <?php component('info-box', ['text' => 'Sesuai dengan kebijakan kampus, barang temuan wajib diserahkan ke pos terdekat, setelah laporan ini dibuat wajib untuk verifikasi fisik dan penyerahan ke pos terkait demi menghindari penyalahgunaan']); ?>
            </div>
        </div>

        <?php component('form-actions', [
            'backHref'   => $base . '/mahasiswa/dashboard.php',
            'submitHref' => $base . '/mahasiswa/review-temuan.php',
        ]); ?>
    </form>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
