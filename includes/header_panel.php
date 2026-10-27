<?php
/**
 * includes/header_panel.php
 * Layout atas halaman Petugas & Admin: sidebar kiri + kartu konten putih (Figma: frame "Content" > "Card").
 * Sebelum require file ini, set:
 *   $pageTitle   judul tab browser                                    (opsional)
 *   $panelTitle  judul besar di header kartu; null = tanpa judul      (opsional)
 * Tutup dengan includes/footer_panel.php.
 *   ?menu=profil  → dropdown profil tampil terbuka
 */
if (!function_exists('baseUrl')) {
    require_once __DIR__ . '/functions.php';
}
$base = baseUrl();
$panelTitle = $panelTitle ?? null;
$profilOpen = ($_GET['menu'] ?? '') === 'profil';
// URL halaman ini tanpa parameter menu (untuk menutup dropdown)
$selfUrl = strtok($_SERVER['REQUEST_URI'], '?');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= e($pageTitle ?? 'TitikTemu') ?> — TitikTemu</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=League+Spartan:wght@400;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind hasil build -->
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css" />
</head>

<body class="bg-page font-sans text-navy antialiased">
<!-- Lebar penuh: kartu konten putih selalu menempel ke tepi kanan layar, juga di layar > 1440px -->
<div class="flex min-h-screen">
    <?php require __DIR__ . '/sidebar.php'; ?>

    <div class="flex min-w-0 flex-1 flex-col bg-page">
        <div class="flex flex-1 flex-col overflow-hidden bg-white shadow-[0_0_2px_2px_rgba(0,0,0,0.25)] lg:rounded-l-[50px]">
            <!-- Header kartu -->
            <header class="flex items-center gap-[10px] border-b-2 border-page px-5 py-4 sm:px-8 xl:px-12 desk:px-20 desk:py-6">
                <div class="flex flex-1 items-center gap-3">
                    <!-- Menu HP & tablet (sidebar disembunyikan di bawah lebar 1024px). Tanpa JS: memakai <details>. -->
                    <details class="relative lg:hidden">
                        <summary class="flex cursor-pointer list-none items-center rounded-lg p-1 text-navy [&::-webkit-details-marker]:hidden" aria-label="Buka menu">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </summary>
                        <div class="absolute left-0 top-11 z-40 flex w-[260px] flex-col gap-2 rounded-xl bg-page p-4 shadow-card">
                            <p class="px-3 font-heading text-lg leading-[normal] text-black">Menu Utama</p>
                            <?php foreach ($menuUtama as $menu) { $renderMenu($menu); } ?>
                            <?php if ($isAdmin): ?>
                                <div class="my-1 h-px w-full bg-muted/40"></div>
                                <p class="px-3 font-heading text-lg leading-[normal] text-black">Peninjauan Admin</p>
                                <?php foreach ($menuAdmin as $menu) { $renderMenu($menu); } ?>
                            <?php endif; ?>
                        </div>
                    </details>
                    <?php if ($panelTitle !== null): ?>
                        <h1 class="truncate font-heading text-xl sm:text-2xl font-bold leading-[normal] text-black desk:text-[28px]"><?= e($panelTitle) ?></h1>
                    <?php endif; ?>
                </div>
                <div class="relative flex flex-1 justify-end">
                    <?php component('profile-menu', ['open' => $profilOpen, 'toggleHref' => $selfUrl . ($profilOpen ? '' : '?menu=profil')]); ?>
                </div>
            </header>

            <!-- Isi halaman -->
            <main class="flex flex-1 flex-col gap-6 px-5 pb-12 pt-6 sm:px-8 xl:px-12 desk:px-20">
