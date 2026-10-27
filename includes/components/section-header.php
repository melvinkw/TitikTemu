<?php
/**
 * Komponen: section-header
 * Judul section + tombol "Lihat Semua" (Figma: header section Barang Temuan / Laporan Kehilangan di Beranda).
 *
 * Parameter:
 *   title     string   Judul section.                                    default ''
 *   href      ?string  Tujuan tombol "Lihat Semua". null = tanpa tombol. default null
 *   linkLabel string   Teks tombol.                                      default 'Lihat Semua'
 *   class     string   Kelas Tailwind tambahan.                          default ''
 *
 * Contoh:
 *   component('section-header', ['title' => 'Barang Temuan', 'href' => $base . '/mahasiswa/barang-temuan.php']);
 *   component('section-header', ['title' => 'Laporan Kehilangan']);
 */
$title     = $title ?? '';
$href      = $href ?? null;
$linkLabel = $linkLabel ?? 'Lihat Semua';
$class     = $class ?? '';
?>
<div class="flex items-center justify-between gap-4 <?= e($class) ?>">
    <h2 class="font-heading text-[28px] font-bold leading-[normal] text-navy"><?= e($title) ?></h2>
    <?php if ($href !== null): ?>
        <a href="<?= e($href) ?>"
           class="flex h-[54px] w-[175px] shrink-0 items-center justify-end gap-2 rounded-lg border border-navy px-6 py-[10px] text-sm font-semibold leading-[normal] text-navy">
            <?= e($linkLabel) ?>
            <img src="<?= baseUrl() ?>/assets/img/arrow.svg" alt="" width="24" height="24" class="h-6 w-6 rotate-180" />
        </a>
    <?php endif; ?>
</div>
