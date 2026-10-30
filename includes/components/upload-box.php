<?php
/**
 * Komponen: upload-box
 * Kotak upload foto (Figma: "Foto Barang (Wajib, Max 3)" di Form Penemuan Barang).
 *
 * Parameter:
 *   label   string  Teks label.                       default 'Foto Barang (Wajib, Max 3)'
 *   name    string  Atribut name input file.          default 'foto[]'
 *   hint    string  Teks kecil di bawah.              default 'Max 3 foto, 5 Mb per foto'
 *   star    bool    Tanda * merah di depan label.     default false
 *   compact bool    Kotak lebih pendek di layar < 1440px (untuk modal).   default false
 *
 * Contoh:
 *   component('upload-box');
 */
$label = $label ?? 'Foto Barang (Wajib, Max 3)';
$name  = $name ?? 'foto[]';
$hint  = $hint ?? 'Max 3 foto, 5 Mb per foto';
$star  = $star ?? false;
$compact = $compact ?? false; // true = kotak lebih pendek di layar < 1440px (dipakai di modal)
?>
<div class="flex flex-col gap-2">
    <span class="flex items-center font-heading text-base font-semibold leading-[1.5] text-navy">
        <?php if ($star): ?><span class="w-[21px] shrink-0 text-center text-status-ditolak">*</span><?php endif; ?>
        <?= e($label) ?>
    </span>
    <label class="flex w-full cursor-pointer flex-col items-center gap-2 rounded-lg border border-line text-center <?= $compact ? 'py-6 desk:py-[54px]' : 'py-[54px]' ?>">
        <img src="<?= baseUrl() ?>/assets/img/icon-upload.svg" alt="" width="28" height="28" class="h-7 w-7" />
        <span class="text-sm leading-[normal] text-navy">Klik untuk upload foto</span>
        <span class="text-xs leading-[normal] text-line"><?= e($hint) ?></span>
        <input type="file" name="<?= e($name) ?>" accept="image/*" multiple class="hidden" />
    </label>
</div>
