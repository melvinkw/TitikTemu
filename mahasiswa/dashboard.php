<?php
/**
 * mahasiswa/dashboard.php
 * Halaman utama untuk role mahasiswa (Figma: "Home-user").
 * Tampilan statis — data masih dummy.
 *   ?menu=lapor  → menampilkan menu "+ Buat Laporan" dalam keadaan terbuka
 */
require_once __DIR__ . '/../includes/functions.php';

// 🔐 Proteksi: hanya mahasiswa yang login boleh akses
requireLogin(['mahasiswa']);

$pageTitle = 'Beranda';
$base = baseUrl();
$menuLapor = ($_GET['menu'] ?? '') === 'lapor';

// Data dummy — nanti diambil dari database (4 barang temuan terbaru)
$barangTemuan = [
    ['nama' => 'Charger Laptop', 'lokasi' => 'RT02',       'tanggal' => '24 September 2026', 'img' => 'charger-laptop.png'],
    ['nama' => 'Kunci Motor',    'lokasi' => 'Parkiran',   'tanggal' => '24 September 2026', 'img' => 'kunci-motor.png'],
    ['nama' => 'Charger Type C', 'lokasi' => 'LKJ 2',      'tanggal' => '24 September 2026', 'img' => 'charger-typec.png'],
    ['nama' => 'Earphone',       'lokasi' => 'Lobby Lt 7', 'tanggal' => '24 September 2026', 'img' => 'earphone.png'],
];

// Data dummy — nanti diambil dari database (laporan kehilangan terbaru)
$laporanKehilangan = [
    ['barang' => 'Macbook Pro Silver', 'kategori' => 'elektronik', 'lokasi' => 'Parkiran Wall climbing', 'tanggal' => '31-10-2024 12:21'],
    ['barang' => 'STNK Motor',         'kategori' => 'identitas',  'lokasi' => 'Parkiran Wall climbing', 'tanggal' => '31-10-2024 12:21'],
    ['barang' => 'Smartwatch',         'kategori' => 'aksesoris',  'lokasi' => 'Parkiran Wall climbing', 'tanggal' => '31-10-2024 12:21'],
];

// Konten statis section "Cara Melapor" (teks dari Figma, salah tulis sudah diperbaiki)
$langkahKehilangan = [
    ['title' => '01 — Laporkan', 'desc' => 'Isi detail barang yang hilang.'],
    ['title' => '02 — Pantau',   'desc' => 'Cek perkembangan laporanmu.'],
    ['title' => '03 — Temukan',  'desc' => 'Hubungi pihak terkait jika barang ditemukan'],
];
$langkahMenemukan = [
    ['title' => '01 — Laporkan',   'desc' => 'Isi detail barang yang ditemukan.'],
    ['title' => '02 — Serahkan',   'desc' => 'Bawa barang ke titik penyerahan.', 'indent' => 'pl-[55px]'],
    ['title' => '03 — Verifikasi', 'desc' => 'Petugas memeriksa dan memproses barang.', 'indent' => 'pl-[47px]'],
];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="mt-[14px] flex flex-col gap-16 px-5 py-8 sm:px-10 lg:px-20">

    <!-- ============ HERO ============ -->
    <section class="relative flex min-h-[420px] items-center rounded-xl p-6 sm:p-10 lg:h-[468px]">
        <div class="pointer-events-none absolute inset-0 overflow-hidden rounded-xl">
            <img src="<?= $base ?>/assets/img/hero.png" alt="" aria-hidden="true"
                 class="absolute left-0 top-[-22.65%] h-[145.3%] w-full max-w-none object-cover" />
            <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/60 to-transparent lg:hidden"></div>
        </div>

        <div class="relative flex h-full flex-1 flex-col gap-8 px-4 py-12">
            <div class="flex max-w-[479px] flex-col gap-2">
                <h1 class="font-heading text-[36px] font-extrabold leading-none text-navy sm:text-[48px] sm:leading-[48px]">
                    Barang Hilang?<br />
                    Temukan di <span class="text-accent">TitikTemu.</span>
                </h1>
                <p class="max-w-[446px] text-base leading-[normal] text-body">
                    Platform lost &amp; found untuk membantu warga Polinema melaporkan, mencari, dan menemukan kembali barang yang hilang.
                </p>
            </div>
            <div class="relative w-fit">
                <?php component('button', [
                    'label' => '+ Buat Laporan',
                    'href'  => $base . '/mahasiswa/dashboard.php' . ($menuLapor ? '' : '?menu=lapor'),
                    'class' => 'text-primary',
                ]); ?>
                <?php if ($menuLapor): ?>
                    <?php component('lapor-dropdown', ['class' => 'absolute left-0 top-full mt-2']); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ============ BARANG TEMUAN ============ -->
    <section class="flex flex-col gap-8">
        <?php component('section-header', ['title' => 'Barang Temuan', 'href' => $base . '/mahasiswa/barang-temuan.php']); ?>
        <div class="grid w-full grid-cols-2 justify-items-center gap-3 sm:gap-6 lg:grid-cols-4">
            <?php foreach ($barangTemuan as $item): ?>
                <?php component('item-card', $item + ['href' => $base . '/mahasiswa/barang-temuan.php?detail=1']); ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ============ LAPORAN KEHILANGAN ============ -->
    <section class="flex flex-col gap-8">
        <?php component('section-header', ['title' => 'Laporan Kehilangan', 'class' => 'h-[72px]']); ?>
        <?php component('laporan-kehilangan-table', ['rows' => $laporanKehilangan]); ?>
    </section>

    <!-- ============ CARA MELAPOR ============ -->
    <section class="flex flex-col items-center gap-8">
        <h2 class="w-full text-center font-heading text-[28px] font-bold leading-[normal] text-navy">Bagaimana Cara Melapor di TitikTemu?</h2>
        <div class="flex w-full flex-wrap items-center justify-center gap-x-20 gap-y-8">
            <?php component('cara-melapor-card', [
                'title' => 'Kehilangan Barang',
                'icon'  => 'icon-search.svg',
                'steps' => $langkahKehilangan,
            ]); ?>
            <?php component('cara-melapor-card', [
                'title'     => 'Menemukan Barang',
                'icon'      => 'icon-box.svg',
                'circle'    => 'h-[54.5px] w-[54.5px]',
                'iconClass' => 'h-[24.1px] w-[22.5px]',
                'padTop'    => 'pt-[63px]',
                'steps'     => $langkahMenemukan,
            ]); ?>
        </div>
    </section>

</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
