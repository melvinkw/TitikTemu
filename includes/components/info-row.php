<?php
/**
 * Komponen: info-row
 * Label kecil + nilai di kartu detail Petugas (Figma: "baris 1/2/3" — label 10px abu, nilai 12px).
 *
 * Parameter:
 *   label  string  Label.                         default ''
 *   value  string  Nilai.                         default ''
 *   class  string  Kelas tambahan pembungkus.     default ''
 *
 * Contoh:
 *   component('info-row', ['label' => 'Lokasi Ditemukan :', 'value' => 'Perpustakaan Graha Polinema']);
 */
$label = $label ?? '';
$value = $value ?? '';
$class = $class ?? '';
?>
<div class="flex flex-col justify-center gap-[7px] leading-[normal] <?= e($class) ?>">
    <p class="text-[10px] text-[#475569]"><?= e($label) ?></p>
    <p class="text-xs font-medium text-[#0f172a]"><?= e($value) ?></p>
</div>
