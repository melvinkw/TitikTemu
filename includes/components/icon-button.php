<?php
/**
 * Komponen: icon-button
 * Tombol ikon kotak kecil di kolom Aksi (Figma: tombol edit navy & hapus merah muda).
 *
 * Parameter:
 *   type   string  'edit' | 'hapus'                 default 'edit'
 *   href   string  Tujuan tombol.                   default '#'
 *
 * Contoh:
 *   component('icon-button', ['type' => 'hapus', 'href' => '?modal=hapus']);
 */
$type = $type ?? 'edit';
$href = $href ?? '#';
$types = [
    'edit'  => ['class' => 'bg-navy',      'icon' => 'icon-edit-white.svg', 'label' => 'Edit'],
    'hapus' => ['class' => 'bg-[#fee5e0]', 'icon' => 'icon-trash.svg',      'label' => 'Hapus'],
];
$t = $types[$type] ?? $types['edit'];
?>
<a href="<?= e($href) ?>" aria-label="<?= $t['label'] ?>"
   class="inline-flex h-[38px] w-[38px] shrink-0 items-center justify-center rounded-[10px] <?= $t['class'] ?>">
    <img src="<?= baseUrl() ?>/assets/img/<?= $t['icon'] ?>" alt="" width="18" height="18" class="h-[18px] w-[18px]" />
</a>
