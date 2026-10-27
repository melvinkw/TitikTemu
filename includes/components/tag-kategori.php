<?php
/**
 * Komponen: tag-kategori
 * Label kategori barang (Figma: "tags kategori" — Elektronik, Aksesoris, Identitas).
 *
 * Parameter:
 *   kategori  string   'elektronik' | 'aksesoris' | 'identitas'     default 'elektronik'
 *   label     ?string  Teks label. Kosongkan untuk nama bawaan.     default null
 *
 * Contoh:
 *   component('tag-kategori', ['kategori' => 'aksesoris']);
 */
$kategori = $kategori ?? 'elektronik';
$label    = $label ?? null;

$styles = [
    'elektronik' => ['class' => 'bg-kategori-elektronik-bg text-kategori-elektronik', 'label' => 'Elektronik'],
    'aksesoris'  => ['class' => 'bg-kategori-aksesoris-bg text-kategori-aksesoris',   'label' => 'Aksesoris'],
    'identitas'  => ['class' => 'bg-kategori-identitas-bg text-kategori-identitas',   'label' => 'Identitas'],
];
$s = $styles[$kategori] ?? $styles['elektronik'];
?>
<span class="inline-flex h-[39.5px] w-[104px] items-center justify-center rounded-full p-[10px] text-center text-xs font-semibold leading-[normal] whitespace-nowrap <?= $s['class'] ?>">
    <?= e($label ?? $s['label']) ?>
</span>
