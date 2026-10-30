<?php
/**
 * Komponen: page-heading
 * Judul + subjudul halaman/form (Figma: "header" — judul League Spartan 20px, subjudul Inter 14px abu).
 *
 * Parameter:
 *   title     string  Judul.                               default ''
 *   subtitle  string  Subjudul.                            default ''
 *   class     string  Kelas tambahan (mis. 'py-6').         default ''
 *
 * Contoh:
 *   component('page-heading', ['title' => 'Review Laporan Anda',
 *                              'subtitle' => 'Periksa kembali detail laporan sebelum di submit.', 'class' => 'py-6']);
 */
$title    = $title ?? '';
$subtitle = $subtitle ?? '';
$class    = $class ?? '';
?>
<div class="flex w-full flex-col gap-2 leading-[normal] <?= e($class) ?>">
    <h1 class="font-heading text-xl font-semibold text-navy"><?= e($title) ?></h1>
    <?php if ($subtitle !== ''): ?>
        <p class="text-sm text-muted"><?= e($subtitle) ?></p>
    <?php endif; ?>
</div>
