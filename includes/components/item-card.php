<?php
/**
 * Komponen: item-card
 * Kartu barang temuan (Figma: "card-1" — kartu putih 294×414, foto 254px).
 *
 * Parameter:
 *   nama     string   Nama barang.                                   default ''
 *   lokasi   string   Lokasi ditemukan.                              default ''
 *   tanggal  string   Tanggal ditemukan (sudah diformat).            default ''
 *   img      string   Nama file foto di assets/img/.                 default 'earphone.png'
 *   href     string   Tujuan link "Lihat Detail".                    default '#'
 *
 * Contoh:
 *   component('item-card', ['nama' => 'Earphone', 'lokasi' => 'Lobby Lt 7',
 *                           'tanggal' => '24 September 2026', 'img' => 'earphone.png']);
 */
$nama    = $nama ?? '';
$lokasi  = $lokasi ?? '';
$tanggal = $tanggal ?? '';
$img     = $img ?? 'earphone.png';
$href    = $href ?? '#';
?>
<!-- Ukuran Figma 294×414 di layar ≥1440px; di layar lebih kecil kartu mengecil mengikuti kolom grid -->
<article class="flex w-full max-w-[294px] flex-col items-center justify-center gap-3 rounded-xl bg-white p-3 sm:gap-4 sm:p-5 desk:h-[414px]">
    <img src="<?= baseUrl() ?>/assets/img/<?= e($img) ?>" alt="<?= e($nama) ?>"
         class="aspect-square w-full max-w-[254px] rounded-xl object-cover" />
    <div class="flex w-full flex-col items-end gap-2 px-1 sm:gap-4 sm:px-1">
        <div class="flex w-full flex-col gap-2 text-xs leading-[normal] text-navy sm:text-sm">
            <div class="flex flex-col gap-1">
                <h3 class="font-semibold"><?= e($nama) ?></h3>
                <p class="truncate whitespace-pre">📍  <?= e($lokasi) ?></p>
            </div>
            <p class="whitespace-nowrap"> 📅 <?= e($tanggal) ?></p>
        </div>
        <!-- Figma: tombol "quaternary" lebar 110px berisi teks bergaris bawah -->
        <a href="<?= e($href) ?>" class="flex items-center justify-center rounded-lg py-2 sm:w-[110px] sm:px-8 sm:py-[14px]">
            <span class="flex flex-col items-end text-right text-xs font-semibold sm:text-sm leading-[normal] text-muted">
                <span class="whitespace-nowrap">Lihat Detail</span>
                <span class="block w-full border-t-2 border-muted"></span>
            </span>
        </a>
    </div>
</article>
