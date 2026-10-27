<?php
/**
 * Verifikasi Barang Temuan — konfirmasi serah terima (Figma: "Petugas-Verifikasi Barang Temuan").
 * Halaman statis. ?modal=diterima → modal "Barang Telah Diterima".
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Konfirmasi Barang Temuan';
$panelTitle = null; // halaman detail tanpa judul di header (sesuai Figma)
$self       = strtok($_SERVER['REQUEST_URI'], '?');
$listUrl    = baseUrl() . '/petugas/terima-barang.php';

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Terima Barang Temuan', 'Konfirmasi'],
    'title'  => 'Log Penerimaan Barang : Serah Terima Laptop Macbook Pro',
    'desc'   => 'ID Verif: FND-9921 Tanggal Pengajuan : 31 Desember 2024',
]);
?>
<div class="detail-box !items-stretch">
    <div class="grid grid-cols-1 gap-12 lg:grid-cols-[287px_minmax(0,1fr)]">
        <div class="flex flex-col gap-11">
            <?php component('penerima-card', ['nama' => 'Ahmad Muhajir', 'nim' => '25410706000']); ?>
            <?php component('barang-temuan-card', [
                'lokasi'  => 'Perpustakaan Graha Polinema - Lantai 3, Ruang Diskusi',
                'waktu'   => '29 Desember 2024 – 16.45 WIB',
                'catatan' => 'Perangkat dalam keadaan terbuka namun terkunci, terdapat sticker di bawah keyboard',
            ]); ?>
        </div>
        <?php component('konfirmasi-barang-card', ['batalHref' => $listUrl, 'terimaHref' => $self . '?modal=diterima']); ?>
    </div>
</div>
<?php
if (($_GET['modal'] ?? '') === 'diterima') {
    component('modal-status', ['variant' => 'diterima', 'href' => $listUrl, 'closeHref' => $self]);
}
require_once __DIR__ . '/../includes/footer_panel.php';
