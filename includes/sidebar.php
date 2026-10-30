<?php
/**
 * includes/sidebar.php
 * Sidebar halaman Petugas & Admin (Figma: "Navbar-Petugas" dan "Nav-Admin").
 * Dipanggil otomatis oleh includes/header_panel.php.
 * Admin melihat menu tambahan "Peninjauan Admin".
 */
if (!function_exists('baseUrl')) {
    require_once __DIR__ . '/functions.php';
}
$base = baseUrl();
$isAdmin = currentRole() === 'admin';

// 'active' = nama file yang membuat menu ini tampil aktif
$menuUtama = [
    ['label' => 'Dashboard', 'icon' => 'nav-dashboard.svg',
     'url' => $base . ($isAdmin ? '/admin/dashboard.php' : '/petugas/dashboard.php'),
     'active' => ['dashboard.php']],
    ['label' => 'Laporan Kehilangan', 'icon' => 'nav-laporan-kehilangan.svg',
     'url' => $base . '/petugas/laporan-kehilangan.php', 'active' => ['laporan-kehilangan.php']],
    ['label' => 'Laporan Penemuan', 'icon' => 'nav-laporan-penemuan.svg',
     'url' => $base . '/petugas/laporan-penemuan.php', 'active' => ['laporan-penemuan.php']],
    ['label' => 'Terima Barang Temuan', 'icon' => 'nav-terima-barang.svg',
     'url' => $base . '/petugas/terima-barang.php', 'active' => ['terima-barang.php', 'verifikasi-barang.php', 'lihat-barang.php']],
    ['label' => 'Verifikasi Kepemilikan', 'icon' => 'nav-verifikasi.svg',
     'url' => $base . '/petugas/verifikasi-kepemilikan.php', 'active' => ['verifikasi-kepemilikan.php', 'verifikasi-klaim.php', 'lihat-klaim.php']],
];

// Khusus admin (Figma: Nav-Admin — bagian "Peninjauan Admin")
$menuAdmin = [
    // Halaman Kecocokan Barang belum dibuat (menunggu desain final)
    ['label' => 'Kecocokan barang', 'icon' => 'nav-admin.svg', 'url' => '#', 'active' => []],
    ['label' => 'Akun Petugas', 'icon' => 'nav-admin.svg', 'url' => $base . '/admin/akun-petugas.php', 'active' => ['akun-petugas.php']],
    ['label' => 'Akun Admin',   'icon' => 'nav-admin.svg', 'url' => $base . '/admin/akun-admin.php',   'active' => ['akun-admin.php']],
];

$currentFile = basename($_SERVER['SCRIPT_NAME']);

$renderMenu = function (array $menu) use ($base, $currentFile): void {
    $isActive = in_array($currentFile, $menu['active'], true);
    ?>
    <a href="<?= e($menu['url']) ?>"
       class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm leading-[normal] desk:px-4 desk:text-base <?= $isActive ? 'bg-accent text-navy' : 'text-black' ?>">
        <img src="<?= $base ?>/assets/img/<?= e($menu['icon']) ?>" alt="" width="24" height="24" class="h-5 w-5 shrink-0 desk:h-6 desk:w-6" />
        <span class="whitespace-nowrap"><?= e($menu['label']) ?></span>
    </a>
    <?php
};
?>
<aside class="sticky top-0 hidden h-screen w-[240px] shrink-0 flex-col items-center gap-6 self-start overflow-y-auto bg-page px-4 py-6 lg:flex xl:w-[280px] xl:px-6 desk:w-[350px] desk:gap-10 desk:px-8">
    <div class="w-full px-3 desk:px-4">
        <a href="<?= e($menuUtama[0]['url']) ?>" class="font-heading text-2xl font-bold leading-[normal] text-black desk:text-[28px]">TitikTemu</a>
    </div>
    <p class="w-full px-3 font-heading text-xl leading-[normal] text-black desk:px-4 desk:text-2xl">Menu Utama</p>
    <nav class="flex w-full flex-col items-center gap-3 desk:gap-8">
        <?php foreach ($menuUtama as $menu) { $renderMenu($menu); } ?>
    </nav>

    <?php if ($isAdmin): ?>
        <div class="h-px w-full bg-muted/40"></div>
        <p class="w-full px-3 font-heading text-xl leading-[normal] text-black desk:px-4 desk:text-2xl">Peninjauan Admin</p>
        <nav class="flex w-full flex-col items-center gap-3 desk:gap-8">
            <?php foreach ($menuAdmin as $menu) { $renderMenu($menu); } ?>
        </nav>
    <?php endif; ?>
</aside>
