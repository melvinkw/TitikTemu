<?php
/**
 * mahasiswa/review-temuan.php
 * Review laporan penemuan sebelum dikirim (Figma: "Review Laporan Form Penemuan Barang").
 * Tampilan statis — data masih dummy.
 *   ?modal=sukses  → menampilkan modal "Laporan Berhasil Terkirim"
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Review Laporan Penemuan';
$base = baseUrl();
$showModal = ($_GET['modal'] ?? '') === 'sukses';

// Data dummy — nanti diisi dari data form yang dikirim
$laporan = [
    'kategori'  => 'Elektronik',
    'nama'      => 'Charger Laptop',
    'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    'lokasi'    => 'Parkiran',
    'tanggal'   => '24 September 2026',
    'waktu'     => '2.30 PM',
    'foto'      => [], // kosong = kotak abu-abu seperti di Figma
];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="flex flex-col px-5 py-10 sm:px-10 lg:px-20">
    <?php component('page-heading', [
        'title'    => 'Review Laporan Anda',
        'subtitle' => 'Periksa kembali detail laporan sebelum di submit.',
        'class'    => 'py-6',
    ]); ?>

    <div class="panel">
        <div class="flex flex-wrap items-center gap-x-36 gap-y-6">
            <?php component('detail-item', ['label' => 'Kategori Barang', 'value' => $laporan['kategori'], 'class' => 'w-full sm:w-[464px]']); ?>
            <?php component('detail-item', ['label' => 'Nama Barang', 'value' => $laporan['nama'], 'class' => 'w-full sm:w-[464px]']); ?>
        </div>
        <?php component('detail-item', ['label' => 'Deskripsi Barang', 'value' => $laporan['deskripsi']]); ?>
        <div class="flex flex-wrap items-center gap-y-6">
            <?php component('detail-item', ['label' => 'Lokasi Ditemukan', 'value' => $laporan['lokasi'], 'class' => 'w-full sm:w-[380px]']); ?>
            <?php component('detail-item', ['label' => 'Tanggal', 'value' => $laporan['tanggal'], 'class' => 'w-full sm:w-[380px]']); ?>
            <?php component('detail-item', ['label' => 'Waktu', 'value' => $laporan['waktu'], 'class' => 'w-full sm:w-[380px]']); ?>
        </div>
        <?php component('photo-grid', ['photos' => $laporan['foto']]); ?>
        <?php component('info-box', ['text' => 'Data yang anda kirimkan akan diverifikasi oleh petugas kampus. Mohon data yang diisi sudah sesuai dengan keadaan aslinya.', 'class' => 'px-10']); ?>
        <?php component('form-actions', [
            'backLabel'   => 'Kembali',
            'backHref'    => $base . '/mahasiswa/lapor-temuan.php',
            'submitHref'  => $base . '/mahasiswa/review-temuan.php?modal=sukses',
            'submitClass' => 'w-32',
        ]); ?>
    </div>
</main>

<?php if ($showModal): ?>
    <?php component('modal-sukses', ['variant' => 'temuan', 'href' => $base . '/mahasiswa/dashboard.php']); ?>
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
