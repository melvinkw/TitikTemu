<?php
/**
 * Komponen: barang-temuan-card
 * Kartu "Data Barang Temuan" di halaman detail Petugas (Figma: "card-7" — sempit & lebar).
 *
 * Parameter:
 *   foto     string   Foto barang di assets/img/.                                   default 'charger-laptop.png'
 *   lokasi   string   Lokasi ditemukan.                                             default ''
 *   waktu    string   Tanggal & waktu ditemukan.                                    default ''
 *   catatan  ?string  Catatan petugas (tidak tampil jika null).                     default null
 *   simpan   ?string  Lokasi penyimpanan, tampil di kolom kanan (versi lebar).      default null
 *   lebar    bool     Versi lebar (Figma: card-7 "lebar").                          default false
 *
 * Contoh:
 *   component('barang-temuan-card', ['lokasi' => '...', 'waktu' => '...', 'catatan' => '...']);
 */
$foto    = $foto ?? 'charger-laptop.png';
$lokasi  = $lokasi ?? '';
$waktu   = $waktu ?? '';
$catatan = $catatan ?? null;
$simpan  = $simpan ?? null;
$lebar   = $lebar ?? false;
?>
<div class="flex w-full flex-col gap-[13px] rounded-[10px] bg-white">
    <?php component('card-header-bar', ['title' => 'Data Barang Temuan']); ?>
    <div class="flex flex-wrap items-start gap-14 px-4">
        <div class="flex w-[241px] max-w-full flex-col gap-[13px]">
            <img src="<?= baseUrl() ?>/assets/img/<?= e($foto) ?>" alt="" class="h-[143px] w-full rounded-[10px] object-cover" />
            <div class="flex flex-col gap-[21px]">
                <?php component('info-row', ['label' => 'Lokasi Ditemukan :', 'value' => $lokasi]); ?>
                <?php component('info-row', ['label' => 'Tanggal & Waktu Ditemukan:', 'value' => $waktu]); ?>
                <?php if ($catatan !== null): ?>
                    <?php component('info-row', ['label' => 'Catatan Petugas:', 'value' => $catatan]); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($lebar && $simpan !== null): ?>
            <?php component('info-row', ['label' => 'Lokasi Penyimpanan :', 'value' => $simpan]); ?>
        <?php endif; ?>
    </div>
</div>
