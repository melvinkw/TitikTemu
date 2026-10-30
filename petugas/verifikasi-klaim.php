<?php
/**
 * Verifikasi Klaim Barang — validasi klaim pemilik (Figma: "Petugas-Verifikasi Klaim Barang").
 * Halaman statis. ?modal=disetujui → "Klaim Berhasil di Setujui", ?modal=ditolak → "Klaim Berhasil Ditolak".
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Validasi Klaim Pemilik';
$panelTitle = null;
$self       = strtok($_SERVER['REQUEST_URI'], '?');
$listUrl    = baseUrl() . '/petugas/verifikasi-kepemilikan.php';
$modal      = $_GET['modal'] ?? '';

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Verifikasi Kepemilikan', 'Validasi Barang'],
    'title'  => 'Validasi Klaim Pemilik : Laptop Macbook Pro',
    'desc'   => 'ID Verif: CLM-6677 Tanggal Pengajuan : 11 Desember 2025',
]);
?>
<div class="detail-box !items-stretch">
    <?php component('klaim-detail'); ?>
    <div class="flex justify-end gap-4">
        <?php component('aksi-petugas', ['type' => 'tolak', 'href' => $self . '?modal=ditolak']); ?>
        <?php component('aksi-petugas', ['label' => 'Verifikasi', 'href' => $self . '?modal=disetujui']); ?>
    </div>
</div>
<?php
if ($modal === 'disetujui') {
    component('modal-status', ['variant' => 'disetujui', 'href' => $listUrl, 'closeHref' => $self]);
} elseif ($modal === 'ditolak') {
    component('modal-status', ['variant' => 'klaim-ditolak', 'href' => $listUrl, 'closeHref' => $self]);
}
require_once __DIR__ . '/../includes/footer_panel.php';
