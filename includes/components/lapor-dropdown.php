<?php
/**
 * Komponen: lapor-dropdown
 * Menu pilihan jenis laporan di bawah tombol "+ Buat Laporan" (Figma: "lapor-dropdown").
 *
 * Parameter:
 *   active  ?string  Item yang disorot: 'kehilangan' | 'temuan' | 'klaim' | null     default null
 *   class   string   Kelas posisi tambahan.                                          default ''
 *
 * Contoh:
 *   component('lapor-dropdown', ['class' => 'absolute left-0 top-full mt-2']);
 */
$active = $active ?? null;
$class  = $class ?? '';
$base   = baseUrl();
$items = [
    'kehilangan' => ['label' => 'Lapor Kehilangan', 'href' => $base . '/mahasiswa/lapor-hilang.php'],
    'temuan'     => ['label' => 'Lapor Temuan',     'href' => $base . '/mahasiswa/lapor-temuan.php'],
    'klaim'      => ['label' => 'Lapor Klaim',      'href' => $base . '/mahasiswa/barang-temuan.php'],
];
?>
<div class="z-30 flex w-[152px] flex-col gap-2 rounded-xl border-[0.5px] border-muted bg-white px-1 py-2 <?= e($class) ?>">
    <?php foreach ($items as $key => $item): ?>
        <a href="<?= e($item['href']) ?>"
           class="flex h-[39px] items-center justify-center whitespace-nowrap rounded-full p-[10px] text-sm font-semibold leading-[normal] text-navy hover:bg-page <?= $active === $key ? 'bg-page' : '' ?>">
            <?= e($item['label']) ?>
        </a>
    <?php endforeach; ?>
</div>
