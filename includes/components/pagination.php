<?php
/**
 * Komponen: pagination
 * Baris "Menampilkan X dari Y Laporan" + nomor halaman (Figma: "page numbering").
 *
 * Parameter:
 *   shown   int     Jumlah yang ditampilkan.                              default 10
 *   total   int     Total data.                                           default 37
 *   pages   int     Jumlah nomor halaman.                                 default 3
 *   active  int     Halaman aktif.                                        default 1
 *   tray    bool    Nomor halaman diberi latar biru muda (versi tabel).   default false
 *   label   string  Kata setelah total.                                   default 'Laporan'
 *   spread  bool    Teks di kiri & nomor di kanan, tinggi 81px (versi tabel petugas).  default false
 *
 * Contoh:
 *   component('pagination', ['tray' => true]);
 */
$shown  = $shown ?? 10;
$total  = $total ?? 37;
$pages  = $pages ?? 3;
$active = $active ?? 1;
$tray   = $tray ?? false;
$label  = $label ?? 'Laporan';
$spread = $spread ?? false;
?>
<!-- Di HP teks & nomor halaman bertumpuk ke bawah supaya tidak terpotong -->
<div class="flex w-full flex-col items-center gap-2 overflow-hidden border-t border-page py-3 sm:flex-row sm:gap-0 sm:py-0 <?= $spread ? 'sm:h-[81px] sm:justify-between' : 'sm:h-[49px] sm:justify-end' ?>">
    <p class="flex items-center gap-1 whitespace-nowrap px-2 text-xs sm:px-6 leading-[normal] text-black">
        Menampilkan <b class="font-semibold"><?= (int) $shown ?></b> dari <b class="font-semibold"><?= (int) $total ?></b> <?= e($label) ?>
    </p>
    <div class="flex h-full items-center justify-center gap-4 px-2 py-2 sm:px-8">
        <span class="font-heading text-xl font-semibold leading-[normal] text-navy">&lt;</span>
        <div class="flex items-center gap-4 rounded-[15px] px-2 py-1 <?= $tray ? 'bg-page' : '' ?>">
            <?php for ($i = 1; $i <= $pages; $i++): ?>
                <span class="flex w-6 items-center justify-center rounded-lg py-[5px] text-center text-xs leading-[normal] text-black <?= $i === $active ? 'bg-white' : '' ?>"><?= $i ?></span>
            <?php endfor; ?>
        </div>
        <span class="font-heading text-xl font-semibold leading-[normal] text-navy">&gt;</span>
    </div>
</div>
