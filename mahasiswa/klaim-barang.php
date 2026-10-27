<?php
/**
 * mahasiswa/klaim-barang.php
 * Pengajuan kepemilikan barang (Figma: "Pengajuan Kepemilikan Barang").
 * Tampilan statis persis Figma (termasuk judul "Review Laporan Anda") — isi form dibahas saat metode diputuskan.
 *   ?modal=sukses  → menampilkan modal "Pengajuan Klaim Terkirim"
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Pengajuan Kepemilikan Barang';
$base = baseUrl();
$showModal = ($_GET['modal'] ?? '') === 'sukses';

// Data dummy — barang yang diklaim
$barang = [
    'nama'      => 'Dompet Hitam',
    'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
    'tanggal'   => '24 September 2026',
    'lokasi'    => 'Parkiran',
    'img'       => 'earphone.png',
];
// Data dummy — bukti kepemilikan yang diajukan
$klaim = [
    'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    'foto'      => [],
];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="flex flex-col gap-4 px-5 pb-[63px] pt-6 sm:px-10 lg:px-20">
    <?php component('page-heading', [
        'title'    => 'Review Laporan Anda',
        'subtitle' => 'Periksa kembali detail laporan sebelum di submit.',
        'class'    => 'py-6',
    ]); ?>

    <?php component('item-summary', $barang); ?>

    <div class="panel">
        <?php component('detail-item', ['label' => 'Deskripsi Barang', 'value' => $klaim['deskripsi']]); ?>
        <?php component('photo-grid', ['photos' => $klaim['foto']]); ?>
        <?php component('info-box', ['text' => 'Data yang anda kirimkan akan diverifikasi oleh petugas kampus. Mohon data yang diisi sudah sesuai dengan keadaan aslinya.', 'class' => 'px-10']); ?>
        <?php component('form-actions', [
            'backLabel'   => 'Kembali',
            'backHref'    => $base . '/mahasiswa/barang-temuan.php?detail=1',
            'submitHref'  => $base . '/mahasiswa/klaim-barang.php?modal=sukses',
            'submitClass' => 'w-32',
        ]); ?>
    </div>
</main>

<?php if ($showModal): ?>
    <?php component('modal-sukses', ['variant' => 'klaim', 'href' => $base . '/mahasiswa/dashboard.php']); ?>
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
