<?php
/**
 * Komponen: pesan-petugas
 * Kotak merah muda berisi alasan penolakan (Figma: "Pesan Dari Petugas" / "Alasan Penolakan").
 *
 * Parameter:
 *   title  string  Judul kotak.                 default 'Pesan Dari Petugas'
 *   items  array   Daftar alasan (string).      default []
 *
 * Contoh:
 *   component('pesan-petugas', ['title' => 'Alasan Penolakan', 'items' => ['Foto kurang jelas']]);
 */
$title = $title ?? 'Pesan Dari Petugas';
$items = $items ?? [];
?>
<div class="w-full rounded-xl bg-status-ditolak-bg px-6 py-4 text-sm leading-[normal] sm:px-[59px]">
    <p class="mb-2 font-semibold text-status-ditolak"><?= e($title) ?></p>
    <ul class="list-disc pl-[21px] text-muted">
        <?php foreach ($items as $item): ?>
            <li><?= e($item) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
