<?php
/**
 * Komponen: photo-grid
 * Deretan foto 160×160 di halaman Review (Figma: "Foto Barang").
 * Kotak tanpa foto tampil abu-abu (#d9d9d9) seperti di desain.
 *
 * Parameter:
 *   label   string  Label di atas foto.                                 default 'Foto Barang'
 *   photos  array   Nama file di assets/img/. Kosong = kotak abu-abu.   default []
 *   count   int     Jumlah kotak jika photos kosong.                     default 3
 *
 * Contoh:
 *   component('photo-grid');
 *   component('photo-grid', ['photos' => ['earphone.png']]);
 */
$label  = $label ?? 'Foto Barang';
$photos = $photos ?? [];
$count  = $count ?? 3;
$slots  = $photos ?: array_fill(0, $count, null);
?>
<div class="flex w-full flex-col gap-2 px-0 sm:px-20">
    <p class="text-sm leading-[normal] text-muted"><?= e($label) ?></p>
    <div class="grid grid-cols-3 gap-3 sm:flex sm:flex-wrap sm:items-center sm:gap-4">
        <?php foreach ($slots as $photo): ?>
            <?php if ($photo): ?>
                <img src="<?= baseUrl() ?>/assets/img/<?= e($photo) ?>" alt="" class="aspect-square w-full rounded-xl object-cover sm:h-40 sm:w-40" />
            <?php else: ?>
                <div class="aspect-square w-full rounded-xl bg-[#d9d9d9] sm:h-40 sm:w-40"></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
