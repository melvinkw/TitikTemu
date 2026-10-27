<?php
/**
 * Komponen: panel-heading
 * Breadcrumb + judul + keterangan di halaman Petugas/Admin (Figma: "Penunjuk Page", "Judul", "Keterangan").
 *
 * Parameter:
 *   crumbs       array    Breadcrumb setelah "Menu Utama". Item terakhir berwarna navy.   default []
 *   title        string   Judul halaman.                                                default ''
 *   desc         string   Keterangan kecil.                                             default ''
 *   actionLabel  ?string  Tombol di kanan (mis. "+ Daftarkan Petugas").                 default null
 *   actionHref   string   Tujuan tombol kanan.                                          default '#'
 *
 * Contoh:
 *   component('panel-heading', ['crumbs' => ['Laporan Kehilangan'], 'title' => 'Laporan Kehilangan',
 *                               'desc' => 'Kelola dan verifikasi semua laporan barang hilang yang masuk dari pengguna']);
 */
$crumbs      = $crumbs ?? [];
$title       = $title ?? '';
$desc        = $desc ?? '';
$actionLabel = $actionLabel ?? null;
$actionHref  = $actionHref ?? '#';
?>
<div class="flex w-full flex-wrap items-start justify-between gap-4">
    <div class="flex min-w-0 flex-col gap-4">
        <p class="flex flex-wrap items-center gap-2 text-sm font-semibold leading-[normal] text-black">
            <span>Menu Utama</span>
            <?php foreach ($crumbs as $i => $crumb): ?>
                <span>&gt;</span>
                <span class="text-navy"><?= e($crumb) ?></span>
            <?php endforeach; ?>
        </p>
        <h2 class="font-heading text-2xl font-bold leading-[normal] text-black desk:text-[28px]"><?= e($title) ?></h2>
        <p class="text-xs leading-[normal] text-black"><?= e($desc) ?></p>
    </div>
    <?php if ($actionLabel !== null): ?>
        <?php component('button', ['label' => $actionLabel, 'href' => $actionHref, 'class' => 'mt-[33px] min-w-[191px]']); ?>
    <?php endif; ?>
</div>
