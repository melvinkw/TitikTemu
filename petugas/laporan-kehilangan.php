<?php
/**
 * Laporan Kehilangan — daftar laporan kehilangan (Figma: "Petugas-Laporan Kehilangan").
 * Halaman statis. ?modal=hapus → konfirmasi hapus laporan.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Laporan Kehilangan';
$panelTitle = 'Laporan Kehilangan';
$self       = strtok($_SERVER['REQUEST_URI'], '?');

// Data contoh (dummy) — nanti diganti query
$kolom = ['Nama Barang & ID', 'Nama Pelapor', 'Lokasi Kehilangan', 'Tanggal Dilaporkan', 'Status', 'Aksi'];
$status = ['selesai', 'menunggu-penerimaan', 'menunggu-penyerahan', 'disimpan', 'ditolak', 'selesai', 'menunggu-penerimaan', 'disimpan', 'menunggu-penyerahan', 'selesai'];
$baris = [];
foreach ($status as $i => $st) {
    $baris[] = [
        ['type' => 'judul',   'judul' => 'MacBook Pro Silver', 'sub' => 'FND-9921'],
        ['type' => 'teks',    'teks' => 'Putra Mahendra'],
        ['type' => 'teks',    'teks' => 'Gedung Teknik Sipil'],
        ['type' => 'tanggal', 'teks' => '31-10-2024 12:21'],
        ['type' => 'status',  'status' => $st],
        // Figma belum menentukan halaman tujuan tombol ini
        ['type' => 'aksi',    'aksi' => $i % 2 ? 'lihat' : 'verifikasi', 'href' => '#'],
    ];
}

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Laporan Kehilangan'],
    'title'  => 'Laporan Kehilangan',
    'desc'   => 'Kelola dan verifikasi semua laporan barang hilang yang masuk dari pengguna',
]);
component('panel-search');
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
