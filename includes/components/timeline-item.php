<?php
/**
 * Komponen: timeline-item
 * Satu langkah di "Timeline Progress Laporan" (Figma: "desc-timeline").
 *
 * Parameter:
 *   title       string   Judul langkah.                                              default ''
 *   subtitle    string   Tanggal/waktu atau keterangan kecil.                        default ''
 *   state       string   'selesai' (centang hijau) | 'ditolak' (silang merah) | 'menunggu' (abu)  default 'selesai'
 *   pesan       array    Isi "Pesan Dari Petugas" (khusus state ditolak).            default []
 *   detailHref  ?string  Tujuan tombol "Lihat Detail" (khusus state ditolak).        default null
 *
 * Contoh:
 *   component('timeline-item', ['title' => 'Klaim Diajukan', 'subtitle' => '26 September 2026    .    09.45 AM']);
 */
$title      = $title ?? '';
$subtitle   = $subtitle ?? '';
$state      = $state ?? 'selesai';
$pesan      = $pesan ?? [];
$detailHref = $detailHref ?? null;

$icons = [
    'selesai'  => 'timeline-selesai.svg',
    'ditolak'  => 'timeline-ditolak.svg',
    'menunggu' => 'timeline-menunggu.svg',
];
?>
<div class="relative flex w-full items-start gap-6">
    <img src="<?= baseUrl() ?>/assets/img/<?= $icons[$state] ?? $icons['selesai'] ?>" alt="" width="35" height="35"
         class="relative z-10 h-[35px] w-[35px] shrink-0 rounded-full bg-white" />
    <div class="flex min-w-0 flex-1 flex-col items-end gap-[10px]">
        <div class="flex w-full flex-col gap-2 text-sm leading-[normal]">
            <p class="font-bold text-navy"><?= e($title) ?></p>
            <p class="whitespace-pre-wrap text-muted"><?= e($subtitle) ?></p>
        </div>
        <?php if ($state === 'ditolak'): ?>
            <?php component('pesan-petugas', ['items' => $pesan]); ?>
            <?php if ($detailHref !== null): ?>
                <?php component('button', ['label' => 'Lihat Detail', 'variant' => 'quaternary', 'href' => $detailHref]); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
