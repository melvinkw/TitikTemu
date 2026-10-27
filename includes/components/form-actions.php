<?php
/**
 * Komponen: form-actions
 * Baris tombol kanan-bawah form/review (Figma: "CTA" — tombol kiri quaternary + tombol primary).
 *
 * Parameter:
 *   backLabel    string   Teks tombol kiri.              default 'Batal'
 *   backHref     string   Tujuan tombol kiri.            default '#'
 *   submitLabel  string   Teks tombol kanan.             default 'Submit'
 *   submitHref   string   Tujuan tombol kanan.           default '#'
 *   submitClass  string   Kelas tambahan tombol kanan.   default ''
 *
 * Contoh:
 *   component('form-actions', ['backHref' => $base . '/mahasiswa/dashboard.php',
 *                              'submitHref' => $base . '/mahasiswa/review-hilang.php']);
 */
$backLabel   = $backLabel ?? 'Batal';
$backHref    = $backHref ?? '#';
$submitLabel = $submitLabel ?? 'Submit';
$submitHref  = $submitHref ?? '#';
$submitClass = $submitClass ?? '';
?>
<div class="flex w-full items-center justify-end gap-4">
    <?php component('button', ['label' => $backLabel, 'variant' => 'quaternary', 'href' => $backHref]); ?>
    <?php component('button', ['label' => $submitLabel, 'href' => $submitHref, 'class' => $submitClass]); ?>
</div>
