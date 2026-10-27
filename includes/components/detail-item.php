<?php
/**
 * Komponen: detail-item
 * Pasangan label (abu) + nilai (tebal) di halaman Review (Figma: blok "Kategori Barang / Elektronik").
 *
 * Parameter:
 *   label  string  Label kecil abu-abu.                                 default ''
 *   value  string  Nilai tebal.                                         default ''
 *   class  string  Lebar/kelas tambahan (mis. 'w-[464px]' atau 'w-full'). default 'w-full'
 *
 * Contoh:
 *   component('detail-item', ['label' => 'Nama Barang', 'value' => 'Charger Laptop', 'class' => 'sm:w-[464px]']);
 */
$label = $label ?? '';
$value = $value ?? '';
$class = $class ?? 'w-full';
?>
<div class="flex flex-col gap-2 px-0 text-sm leading-[normal] sm:px-20 <?= e($class) ?>">
    <p class="text-muted"><?= e($label) ?></p>
    <p class="font-bold text-navy"><?= e($value) ?></p>
</div>
