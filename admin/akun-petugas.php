<?php
/**
 * Manajemen Akun Petugas (Figma: "Admin-Manajemen Akun Petugas"). Khusus Admin.
 * Halaman statis. ?modal=tambah | edit | hapus
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['admin']);

$pageTitle  = 'Akun Petugas';
$panelTitle = 'Manajemen Akun';
$self       = strtok($_SERVER['REQUEST_URI'], '?');
$modal      = $_GET['modal'] ?? '';

// Data contoh (dummy) — nanti diganti query
$kolom = ['Nama dan Email Petugas', 'Pos Utama', 'Pos Penempatan', 'Aksi'];
$baris = array_fill(0, 10, [
    ['type' => 'judul', 'judul' => 'Putra Mahendra', 'sub' => 'Email: Anonymous123@gmail.com'],
    ['type' => 'teks',  'teks' => 'Pos 1'],
    ['type' => 'teks',  'teks' => 'Gedung Teknik Sipil'],
    ['type' => 'ikon',  'edit' => $self . '?modal=edit', 'hapus' => $self . '?modal=hapus'],
]);

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs'      => ['Manajemen Akun', 'Akun Petugas'],
    'title'       => 'Pengaturan Akun Petugas',
    'desc'        => 'Kelola informasi profil petugas dan ubah kata sandi.',
    'actionLabel' => '+ Daftarkan Petugas',
    'actionHref'  => $self . '?modal=tambah',
]);
component('panel-search', ['placeholder' => 'Cari Petugas berdasarkan nama, ID, pos utama, pos penempatan']);
component('data-table', ['columns' => $kolom, 'rows' => $baris, 'pagination' => ['total' => 31, 'label' => 'Petugas']]);

if ($modal === 'tambah' || $modal === 'edit') {
    component('modal-akun', ['mode' => $modal, 'peran' => 'Petugas', 'closeHref' => $self]);
} elseif ($modal === 'hapus') {
    component('modal-status', ['variant' => 'hapus', 'href' => $self, 'closeHref' => $self]);
}
require_once __DIR__ . '/../includes/footer_panel.php';
