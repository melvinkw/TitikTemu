<?php
/**
 * Lihat Laporan Klaim — detail klaim yang sudah diproses (Figma: "Petugas-Lihat Laporan Klaim").
 * Halaman statis.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Detail Klaim Pemilik';
$panelTitle = null;
$listUrl    = baseUrl() . '/petugas/verifikasi-kepemilikan.php';

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Verifikasi Kepemilikan', 'Detail'],
    'title'  => 'Validasi Klaim Pemilik : Laptop Macbook Pro',
    'desc'   => 'ID Verif: CLM-6677 Tanggal Pengajuan : 11 Desember 2025',
]);
?>
<div class="detail-box !items-stretch">
    <?php component('klaim-detail'); ?>
    <div class="flex justify-end">
        <?php component('aksi-petugas', ['type' => 'abu', 'href' => $listUrl, 'class' => 'w-[127px]']); ?>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer_panel.php';
