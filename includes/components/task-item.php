<?php
/**
 * Komponen: task-item
 * Item tugas / aktivitas di Dashboard (Figma: "card-1" — Default dengan radio, Variant2 tanpa radio).
 *
 * Parameter:
 *   title     string     Judul tugas.                                          default ''
 *   desc      string     Keterangan kecil.                                     default ''
 *   checked   ?bool      true = radio tercentang, false = radio kosong, null = tanpa radio.   default null
 *
 * Contoh:
 *   component('task-item', ['title' => 'Verifikasi Laporan Baru: ...', 'desc' => '15 menit yang lalu: ...', 'checked' => true]);
 */
$title   = $title ?? '';
$desc    = $desc ?? '';
$checked = $checked ?? null;
?>
<div class="flex w-full items-center gap-4 overflow-hidden rounded-[10px] bg-page <?= $checked === null ? 'px-6 py-4' : 'p-4' ?>">
    <?php if ($checked !== null): ?>
        <img src="<?= baseUrl() ?>/assets/img/<?= $checked ? 'radio-checked.svg' : 'radio-empty.svg' ?>" alt="" width="28" height="28" class="h-7 w-7 shrink-0" />
    <?php endif; ?>
    <div class="flex min-w-0 flex-col gap-[10px] text-sm leading-[normal] text-black">
        <p class="truncate font-semibold"><?= e($title) ?></p>
        <p class="truncate"><?= e($desc) ?></p>
    </div>
</div>
