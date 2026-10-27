<?php
/**
 * Komponen: cara-melapor-card
 * Kartu langkah di section "Bagaimana Cara Melapor di TitikTemu?" (Beranda).
 *
 * Parameter:
 *   title      string  Judul kartu.                                            default ''
 *   icon       string  Nama file ikon putih di assets/img/.                    default 'icon-search.svg'
 *   circle     string  Kelas ukuran lingkaran ikon.                            default 'h-[50px] w-[50px]'
 *   iconClass  string  Kelas ukuran ikon.                                      default 'h-[19.4px] w-[18.2px]'
 *   steps      array   Daftar langkah: [['title' => '01 — Laporkan', 'desc' => '...', 'indent' => 'pl-[45px]'], ...]
 *                                                                              default []
 *   padTop     string  Jarak isi dari atas kartu.                              default 'pt-[67px]'
 *
 * Contoh:
 *   component('cara-melapor-card', ['title' => 'Kehilangan Barang', 'steps' => $langkahHilang]);
 */
$title     = $title ?? '';
$icon      = $icon ?? 'icon-search.svg';
$circle    = $circle ?? 'h-[50px] w-[50px]';
$iconClass = $iconClass ?? 'h-[19.4px] w-[18.2px]';
$steps     = $steps ?? [];
$padTop    = $padTop ?? 'pt-[67px]';
?>
<div class="flex h-[479px] w-full max-w-[434px] items-start justify-center rounded-xl bg-primary <?= e($padTop) ?>">
    <div class="flex w-[242px] flex-col items-center gap-10">
        <div class="flex flex-col items-center gap-6">
            <span class="flex items-center justify-center rounded-full bg-navy <?= e($circle) ?>">
                <img src="<?= baseUrl() ?>/assets/img/<?= e($icon) ?>" alt="" class="<?= e($iconClass) ?>" />
            </span>
            <h3 class="text-center font-heading text-xl font-semibold leading-[normal] text-navy"><?= e($title) ?></h3>
        </div>
        <ol class="flex w-full flex-col gap-6 text-navy">
            <?php foreach ($steps as $step): ?>
                <li>
                    <p class="text-base font-semibold leading-[normal]"><?= e($step['title'] ?? '') ?></p>
                    <p class="mt-2 text-sm leading-[normal] <?= e($step['indent'] ?? 'pl-[45px]') ?>"><span class="block w-[197px]"><?= e($step['desc'] ?? '') ?></span></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>
