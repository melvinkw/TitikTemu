<?php
/**
 * mahasiswa/barang-temuan.php
 * Daftar barang temuan (Figma: "Barang Temuan"). Tampilan statis — data masih dummy.
 *   ?detail=1  → menampilkan modal detail barang (Figma: "Detail Barang Temuan")
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Barang Temuan';
$base = baseUrl();
$showDetail = isset($_GET['detail']);

// Data dummy — nanti diambil dari database
$items = [
    ['nama' => 'Charger Laptop', 'lokasi' => 'RT02',       'tanggal' => '24 September 2026', 'img' => 'charger-laptop.png'],
    ['nama' => 'Kunci Motor',    'lokasi' => 'Parkiran',   'tanggal' => '24 September 2026', 'img' => 'kunci-motor.png'],
    ['nama' => 'Charger Type C', 'lokasi' => 'LKJ 2',      'tanggal' => '24 September 2026', 'img' => 'charger-typec.png'],
    ['nama' => 'Earphone',       'lokasi' => 'Lobby Lt 7', 'tanggal' => '24 September 2026', 'img' => 'earphone.png'],
    ['nama' => 'Charger Type C', 'lokasi' => 'LKJ 2',      'tanggal' => '24 September 2026', 'img' => 'charger-typec.png'],
    ['nama' => 'Earphone',       'lokasi' => 'Lobby Lt 7', 'tanggal' => '24 September 2026', 'img' => 'earphone.png'],
    ['nama' => 'Kunci Motor',    'lokasi' => 'Parkiran',   'tanggal' => '24 September 2026', 'img' => 'kunci-motor.png'],
    ['nama' => 'Charger Laptop', 'lokasi' => 'RT02',       'tanggal' => '24 September 2026', 'img' => 'charger-laptop.png'],
];

// Data dummy — isi modal detail barang
$detail = [
    'nama'      => 'TWS Huawei',
    'kategori'  => 'elektronik',
    'deskripsi' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for",
    'lokasi'    => 'Parkiran',
    'waktu'     => '24 September 2026, 14.30',
    'status'    => 'Barang di simpan di Pos 1',
    'foto'      => ['earphone.png', 'charger-laptop.png'],
];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="flex flex-col items-center gap-4 px-5 pb-16 pt-[44px] sm:px-10 lg:px-[70px]">
    <?php component('filter-bar', ['resetHref' => $base . '/mahasiswa/barang-temuan.php']); ?>

    <div class="flex w-full flex-col gap-4 lg:px-[10px]">
        <?php component('pagination'); ?>
        <div class="grid w-full grid-cols-2 justify-items-center gap-3 sm:gap-6 lg:grid-cols-4">
            <?php foreach ($items as $item): ?>
                <?php component('item-card', $item + ['href' => $base . '/mahasiswa/barang-temuan.php?detail=1']); ?>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php if ($showDetail): ?>
    <?php component('modal-detail-barang', $detail + [
        'klaimHref' => $base . '/mahasiswa/klaim-barang.php',
        'closeHref' => $base . '/mahasiswa/barang-temuan.php',
    ]); ?>
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
