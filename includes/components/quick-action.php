<?php
/**
 * Komponen: quick-action
 * Kartu tombol cepat "Tambah Laporan ..." di Dashboard (Figma: "card-1/Card 4" & "card-1/Card 5" kanan atas).
 *
 * Parameter:
 *   label    string  Teks kartu.                    default ''
 *   href     string  Tujuan saat diklik.            default '#'
 *   variant  string  'navy' | 'terang'              default 'navy'
 *
 * Contoh:
 *   component('quick-action', ['label' => 'Tambah Laporan Kehilangan', 'href' => '?modal=tambah-kehilangan']);
 */
$label   = $label ?? '';
$href    = $href ?? '#';
$variant = $variant ?? 'navy';
$navy    = $variant === 'navy';
?>
<a href="<?= e($href) ?>"
   class="flex min-w-0 flex-1 flex-col items-center justify-center gap-4 overflow-hidden rounded-[10px] px-3 py-6 desk:px-4 desk:py-8 shadow-[0_0_4px_1.5px_rgba(0,0,0,0.25)] <?= $navy ? 'bg-navy' : 'bg-primary' ?>">
    <span class="flex h-10 w-10 items-center justify-center rounded-xl border-2 <?= $navy ? 'border-primary' : 'border-navy' ?>">
        <img src="<?= baseUrl() ?>/assets/img/<?= $navy ? 'icon-plus-white.svg' : 'icon-plus-navy.svg' ?>" alt="" width="20" height="20" class="h-5 w-5" />
    </span>
    <span class="w-full max-w-[113px] text-center text-sm font-semibold leading-[normal] <?= $navy ? 'text-primary' : 'text-navy' ?>"><?= e($label) ?></span>
</a>
