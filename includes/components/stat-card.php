<?php
/**
 * Komponen: stat-card
 * Kartu angka ringkasan di Dashboard Petugas/Admin (Figma: "card-2" / "card-1/Card 3" / "card-1/Card 4").
 *
 * Parameter:
 *   label    string  Keterangan.                                  default ''
 *   value    string  Angka.                                       default '0'
 *   variant  string  'navy' | 'putih' | 'kuning'                  default 'putih'
 *
 * Contoh:
 *   component('stat-card', ['label' => 'Total Laporan Aktif', 'value' => '124', 'variant' => 'navy']);
 */
$label   = $label ?? '';
$value   = $value ?? '0';
$variant = $variant ?? 'putih';
$variants = [
    'navy'   => ['box' => 'bg-navy',   'text' => 'text-primary', 'icon' => 'icon-alert-white.svg'],
    'putih'  => ['box' => 'bg-white',  'text' => 'text-navy',    'icon' => 'icon-alert-navy.svg'],
    'kuning' => ['box' => 'bg-accent', 'text' => 'text-navy',    'icon' => 'icon-alert-navy.svg'],
];
$v = $variants[$variant] ?? $variants['putih'];
?>
<div class="flex min-w-[170px] flex-1 flex-col justify-center gap-4 overflow-hidden rounded-[10px] p-4 shadow-[0_0_4px_1.5px_rgba(0,0,0,0.25)] <?= $v['box'] ?>">
    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/30">
        <img src="<?= baseUrl() ?>/assets/img/<?= $v['icon'] ?>" alt="" width="22" height="22" class="h-[22px] w-[22px]" />
    </span>
    <p class="whitespace-nowrap text-sm font-semibold leading-[normal] <?= $v['text'] ?>"><?= e($label) ?></p>
    <p class="whitespace-nowrap font-heading text-[28px] font-extrabold desk:text-[32px] leading-[normal] <?= $v['text'] ?>"><?= e($value) ?></p>
</div>
