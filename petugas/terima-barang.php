<?php
/**
 * Terima Barang Temuan — log penerimaan barang (Figma: "Petugas-Terima Barang Temuan").
 * Halaman statis. Tombol Verifikasi → verifikasi-barang.php, Lihat Laporan → lihat-barang.php.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Terima Barang Temuan';
$panelTitle = 'Terima Barang Temuan';
$base       = baseUrl();

// Data contoh (dummy) — nanti diganti query
$kolom  = ['Nama Barang & ID', 'Pengklaim Disetujui', 'Tanggal Diserahkan', 'Status Barang', 'Aksi'];
$status = ['menunggu-penerimaan', 'disimpan', 'menunggu-penerimaan', 'disimpan', 'menunggu-penerimaan', 'disimpan', 'menunggu-penerimaan', 'disimpan', 'menunggu-penerimaan', 'disimpan'];
$baris  = [];
foreach ($status as $st) {
    $verif = $st === 'menunggu-penerimaan';
    $baris[] = [
        ['type' => 'judul',   'judul' => 'MacBook Pro Silver', 'sub' => 'FND-9921'],
        ['type' => 'teks',    'teks' => 'Putra Mahendra'],
        ['type' => 'tanggal', 'teks' => '31-10-2024 12:21'],
        ['type' => 'status',  'status' => $st],
        ['type' => 'aksi',    'aksi' => $verif ? 'verifikasi' : 'lihat',
                              'href' => $base . '/petugas/' . ($verif ? 'verifikasi-barang.php' : 'lihat-barang.php')],
    ];
}

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Terima Barang Temuan'],
    'title'  => 'Log Penerimaan Barang',
    'desc'   => 'Catat detail fisik barang yang diserahkan oleh penemu dan tetapkan lokasi penyimpanan yang tersedia.',
]);
component('panel-search');
component('data-table', ['columns' => $kolom, 'rows' => $baris]);
require_once __DIR__ . '/../includes/footer_panel.php';
