<?php
/**
 * Manajemen Akun Admin (Figma: "Admin-Manajemen Akun Admin"). Khusus Admin.
 * Halaman statis. ?modal=tambah | edit | hapus
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['admin']);

$pageTitle  = 'Akun Admin';
$panelTitle = 'Manajemen Akun';
$self       = strtok($_SERVER['REQUEST_URI'], '?');
$modal      = $_GET['modal'] ?? '';

// Data contoh (dummy) — nanti diganti query.
// Judul kolom ke-2 & ke-3 di Figma masih "?" — dibiarkan sesuai desain.
$kolom = ['Nama dan ID Admin', '?', '?', 'Aksi'];
$baris = array_fill(0, 10, [
    ['type' => 'judul', 'judul' => 'Putra Mahendra', 'sub' => 'ID: #001'],
    ['type' => 'teks',  'teks' => 'Pos 1'],
    ['type' => 'teks',  'teks' => 'Gedung Teknik Sipil'],
    ['type' => 'ikon',  'edit' => $self . '?modal=edit', 'hapus' => $self . '?modal=hapus'],
]);

require_once __DIR__ . '/../includes/header_panel.php';
component('panel-heading', [
    'crumbs'      => ['Manajemen Akun', 'Akun Admin'],
    'title'       => 'Pengaturan Akun Admin',
    'desc'        => 'Kelola informasi profil admin dan ubah kata sandi.',
    'actionLabel' => '+ Daftarkan Admin',
    'actionHref'  => $self . '?modal=tambah',
]);
component('panel-search', ['placeholder' => 'Cari Admin berdasarkan nama, ID, ?, ?']);
component('data-table', ['columns' => $kolom, 'rows' => $baris, 'pagination' => ['total' => 31, 'label' => 'Admin']]);

if ($modal === 'tambah' || $modal === 'edit') {
    component('modal-akun', ['mode' => $modal, 'peran' => 'Admin', 'closeHref' => $self]);
} elseif ($modal === 'hapus') {
    component('modal-status', ['variant' => 'hapus', 'href' => $self, 'closeHref' => $self]);
}
require_once __DIR__ . '/../includes/footer_panel.php';
