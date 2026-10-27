<?php
/**
 * Verifikasi Kepemilikan — daftar klaim pemilik (Figma: "Petugas-Verifikasi Kepemilikan").
 * Halaman statis. Tombol Verifikasi → verifikasi-klaim.php, Lihat Laporan → lihat-klaim.php.
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$pageTitle  = 'Verifikasi Kepemilikan';
$panelTitle = 'Verifikasi Kepemilikan';
$base       = baseUrl();

// Data contoh (dummy) — nanti diganti query
$kolom  = ['Nama dan Email Petugas', 'Nama Pengklaim', 'Tanggal Diserahkan', 'Status', 'Aksi'];
$status = ['menunggu-penyerahan', 'selesai', 'ditolak', 'menunggu-penyerahan', 'selesai', 'menunggu-penyerahan', 'ditolak', 'selesai', 'menunggu-penyerahan', 'selesai'];
$baris  = [];
foreach ($status as $st) {
    $verif = $st === 'menunggu-penyerahan';
    $baris[] = [
        ['type' => 'judul',   'judul' => 'MacBook Pro Silver', 'sub' => 'FND-9921'],
        ['type' => 'teks',    'teks' => 'Putra Mahendra'],
        ['type' => 'tanggal', 'teks' => '31-10-2024 12:21'],
        ['type' => 'status',  'status' => $st],
        ['type' => 'aksi',    'aksi' => $verif ? 'verifikasi' : 'lihat',
                              'href' => $base . '/petugas/' . ($verif ? 'verifikasi-klaim.php' : 'lihat-klaim.php')],
    ];
}

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs' => ['Verifikasi Kepemilikan'],
    'title'  => 'Validasi Klaim Pemilik',
    'desc'   => 'Tinjau bukti kepemilikan dan berikan catatan persetujuan atau penolakan berdasarkan data yang diajukan pengguna.',
]);
component('panel-search');
component('data-table', ['columns' => $kolom, 'rows' => $baris, 'pagination' => ['label' => 'Petugas']]);
require_once __DIR__ . '/../includes/footer_panel.php';
