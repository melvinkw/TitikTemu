<?php
/**
 * includes/navbar.php
 * Navbar adaptif berdasarkan role user.
 * Role mahasiswa mengikuti komponen Figma "Nav" (Beranda / Barang Temuan / Riwayat Laporan).
 */
if (!function_exists('baseUrl')) {
    require_once __DIR__ . '/functions.php';
}
$base = baseUrl();
$role = currentRole();

// Menu default (kalau user belum login)
// 'active' = daftar file yang membuat menu ini tampil aktif
$menus = [
    ['label' => 'Login', 'url' => $base . '/index.php', 'active' => ['index.php']],
];

// Menu berbeda untuk setiap role
if ($role === 'mahasiswa') {
    // Halaman form & review laporan tidak menyorot menu apa pun (Figma: Nav "Default")
    $menus = [
        ['label' => 'Beranda',         'url' => $base . '/mahasiswa/dashboard.php',
         'active' => ['dashboard.php']],
        ['label' => 'Barang Temuan',   'url' => $base . '/mahasiswa/barang-temuan.php',
         'active' => ['barang-temuan.php', 'klaim-barang.php']],
        // Halaman daftar riwayat belum ada desainnya — sementara ke halaman detail riwayat
        ['label' => 'Riwayat Laporan', 'url' => $base . '/mahasiswa/detail-aktivitas.php',
         'active' => ['aktivitas.php', 'detail-aktivitas.php']],
    ];
} elseif ($role === 'petugas') {
    $menus = [
        ['label' => 'Beranda',    'url' => $base . '/petugas/dashboard.php', 'active' => ['dashboard.php']],
        ['label' => 'Verifikasi', 'url' => $base . '/petugas/verifikasi.php', 'active' => ['verifikasi.php']],
        ['label' => 'Riwayat',    'url' => $base . '/petugas/riwayat.php', 'active' => ['riwayat.php']],
    ];
} elseif ($role === 'admin') {
    $menus = [
        ['label' => 'Beranda',     'url' => $base . '/admin/dashboard.php', 'active' => ['dashboard.php']],
        ['label' => 'Kelola User', 'url' => $base . '/admin/kelola-user.php', 'active' => ['kelola-user.php']],
        ['label' => 'Laporan',     'url' => $base . '/admin/laporan.php', 'active' => ['laporan.php']],
    ];
}

// Deteksi halaman aktif dari nama file yang sedang dibuka
$currentFile = basename($_SERVER['SCRIPT_NAME']);
?>

<header class="sticky top-0 z-50 bg-page">
    <nav class="flex items-center justify-between px-4 py-[23px] sm:px-8 lg:px-[79px]">
        <a href="<?= $base ?>/<?= $role ? $role . '/dashboard.php' : 'index.php' ?>"
           class="w-[117px] font-heading text-[28px] font-bold leading-[normal] text-navy">TitikTemu</a>

        <!-- Menu desktop -->
        <div class="hidden max-h-[45px] max-w-[698px] flex-1 items-start gap-10 lg:flex xl:gap-20">
            <?php foreach ($menus as $i => $menu):
                $isActive = in_array($currentFile, $menu['active'], true);
                // Di Figma, menu pertama (Beranda) memakai padding horizontal 32px, sisanya 24px
                $padX = $i === 0 ? 'px-8' : 'px-6';
            ?>
                <a href="<?= e($menu['url']) ?>"
                   class="flex shrink-0 items-center justify-center whitespace-nowrap rounded-full <?= $padX ?> py-[14px] text-sm font-semibold leading-[normal] text-navy <?= $isActive ? 'bg-accent' : '' ?>">
                    <?= e($menu['label']) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Tombol menu mobile -->
        <button id="menuBtn" type="button" aria-label="Buka menu" aria-expanded="false"
                class="rounded-lg p-2 lg:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <!-- Menu mobile -->
    <div id="mobileMenu" class="hidden flex-col gap-2 px-4 pb-4 lg:hidden">
        <?php foreach ($menus as $menu): ?>
            <a href="<?= e($menu['url']) ?>"
               class="rounded-full px-6 py-3 text-center text-sm font-semibold
                      <?= in_array($currentFile, $menu['active'], true) ? 'bg-accent' : '' ?>">
                <?= e($menu['label']) ?>
            </a>
        <?php endforeach; ?>
        <?php if (isLoggedIn()): ?>
            <a href="<?= $base ?>/proses/logout.php"
               class="rounded-full px-6 py-3 text-center text-sm font-semibold text-red-600">
                Logout
            </a>
        <?php endif; ?>
    </div>
</header>
