<?php
/**
 * Laporan Penemuan — daftar barang temuan (Figma: "Petugas-Lapor Penemuan").
 * Halaman statis. ?modal=hapus → konfirmasi hapus laporan.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Laporan Penemuan';
$panelTitle = 'Laporan Penemuan';
$self       = strtok($_SERVER['REQUEST_URI'], '?');

// Data contoh (dummy) — nanti diganti query
$kolom  = ['Nama Barang & ID', 'Nama Pelapor', 'Pos Keamanan', 'Tanggal Dilaporkan', 'Status', 'Aksi'];
$status = ['selesai', 'menunggu-penerimaan', 'menunggu-penyerahan', 'disimpan', 'ditolak', 'selesai', 'menunggu-penerimaan', 'disimpan', 'menunggu-penyerahan', 'selesai'];
$baris  = [];
foreach ($status as $st) {
    $baris[] = [
        ['type' => 'judul',   'judul' => 'MacBook Pro Silver', 'sub' => 'FND-9921'],
        ['type' => 'teks',    'teks' => 'Putra Mahendra'],
        ['type' => 'teks',    'teks' => 'Pos 1'],
        ['type' => 'tanggal', 'teks' => '31-10-2024 12:21'],
        ['type' => 'status',  'status' => $st],
        ['type' => 'ikon',    'hapus' => $self . '?modal=hapus'],
    ];
}

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Laporan Penemuan'],
    'title'  => 'Manajemen Laporan Penemuan',
    'desc'   => 'Kelola barang yang ditemukan di lingkungan kampus dan pantau status kecocokannya dengan laporan kehilangan.',
]);
// Placeholder sesuai Figma (tertulis "Petugas", belum diganti)
component('panel-search', ['placeholder' => 'Cari Petugas berdasarkan nama, ID, pos utama, pos penempatan']);
component('data-table', ['columns' => $kolom, 'rows' => $baris]);

if (($_GET['modal'] ?? '') === 'hapus') {
    component('modal-status', [
        'variant'   => 'hapus',
        'title'     => 'Hapus Laporan?',
        'body'      => 'Anda akan menghapus [Nama Laporan] secara permanen. Tindakan ini tidak dapat dibatalkan. Apakah Anda yakin',
        'href'      => $self,
        'closeHref' => $self,
    ]);
}
require_once __DIR__ . '/../includes/footer_panel.php';
