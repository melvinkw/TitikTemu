<?php
/**
 * Komponen: item-summary
 * Ringkasan barang berbingkai abu (Figma: "card-2" — foto 120px, nama, deskripsi, tanggal, lokasi).
 *
 * Parameter:
 *   nama       string  Nama barang.                       default ''
 *   deskripsi  string  Deskripsi singkat.                 default ''
 *   tanggal    string  Tanggal.                           default ''
 *   lokasi     string  Lokasi.                            default ''
 *   img        string  Foto di assets/img/.               default 'earphone.png'
 *
 * Contoh:
 *   component('item-summary', ['nama' => 'Dompet Hitam', 'deskripsi' => '...', 'tanggal' => '24 September 2026',
 *                              'lokasi' => 'Parkiran', 'img' => 'earphone.png']);
 */
$nama      = $nama ?? '';
$deskripsi = $deskripsi ?? '';
$tanggal   = $tanggal ?? '';
$lokasi    = $lokasi ?? '';
$img       = $img ?? 'earphone.png';
?>
<div class="w-full overflow-hidden rounded-xl border-[1.5px] border-[#d9d9d9] bg-primary px-5 py-5 sm:px-[30px] sm:py-[26px]">
    <div class="flex flex-wrap items-center gap-6 px-0 sm:gap-10 sm:px-6">
        <img src="<?= baseUrl() ?>/assets/img/<?= e($img) ?>" alt="<?= e($nama) ?>" class="h-[120px] w-[120px] shrink-0 rounded-xl object-cover" />
        <div class="flex min-w-[200px] flex-1 flex-col gap-5 sm:gap-[27px]">
            <div class="flex flex-col gap-2 text-sm leading-[normal]">
                <p class="font-bold text-navy"><?= e($nama) ?></p>
                <p class="text-muted"><?= e($deskripsi) ?></p>
            </div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm leading-[normal] text-muted sm:gap-0">
                <p class="shrink-0 whitespace-nowrap sm:w-[234px] sm:px-4"> 📅 <?= e($tanggal) ?></p>
                <p class="shrink-0 sm:w-[131px]">📍 <?= e($lokasi) ?></p>
            </div>
        </div>
    </div>
</div>
