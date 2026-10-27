<?php
/**
 * Lihat Laporan Barang Temuan — detail barang yang sudah disimpan (Figma: "Petugas-Lihat Laporan Barang Temuan").
 * Halaman statis.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Detail Barang Temuan';
$panelTitle = null;
$listUrl    = baseUrl() . '/petugas/terima-barang.php';

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Terima Barang Temuan', 'Detail'],
    'title'  => 'Log Penerimaan Barang : Serah Terima Laptop Macbook Pro',
    'desc'   => 'ID Verif: FND-9921 Tanggal Pengajuan : 31 Desember 2024',
]);
?>
<div class="detail-box !items-stretch">
    <div class="grid grid-cols-1 gap-12 lg:grid-cols-[285px_minmax(0,1fr)]">
        <div class="flex flex-col gap-8">
            <?php component('penerima-card', ['nama' => 'Ahmad Muhajir', 'nim' => '25410706000']); ?>
            <?php component('status-barang-card', ['status' => 'disimpan', 'simpan' => 'Pos Gedung Sipil']); ?>
        </div>
        <?php component('barang-temuan-card', [
            'lokasi'  => 'Perpustakaan Graha Polinema - Lantai 3, Ruang Diskusi',
            'waktu'   => '29 Desember 2024 – 16.45 WIB',
            'catatan' => 'Perangkat dalam keadaan terbuka namun terkunci, terdapat sticker di bawah keyboard',
            'simpan'  => 'Pos Gedung Sipil',
            'lebar'   => true,
        ]); ?>
    </div>
    <div class="flex justify-end">
        <?php component('aksi-petugas', ['type' => 'abu', 'href' => $listUrl, 'class' => 'w-[127px]']); ?>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer_panel.php';
