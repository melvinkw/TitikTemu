<?php
/**
 * Komponen: klaim-bukti-card
 * Kartu bukti klaim kepemilikan (Figma: "card-9" — foto bukti, ciri-ciri, deskripsi pengajuan).
 * Judul kartu di Figma tertulis "Data Barang Temuan" — dibiarkan sesuai desain.
 *
 * Parameter:
 *   foto       array   3 foto bukti di assets/img/.            default ['charger-laptop.png', 'charger-laptop.png', 'charger-laptop.png']
 *   ciri       array   Daftar ciri-ciri khusus.                 default []
 *   deskripsi  string  Deskripsi pengajuan.                     default ''
 *
 * Contoh:
 *   component('klaim-bukti-card', ['ciri' => ['Macbook Pro warna silver'], 'deskripsi' => '...']);
 */
$foto      = $foto ?? ['charger-laptop.png', 'charger-laptop.png', 'charger-laptop.png'];
$ciri      = $ciri ?? [];
$deskripsi = $deskripsi ?? '';
$base      = baseUrl();
?>
<div class="flex w-full max-w-[592px] flex-col gap-4 rounded-[10px] bg-white">
    <?php component('card-header-bar', ['title' => 'Data Barang Temuan']); ?>
    <div class="flex flex-col gap-2 px-6">
        <p class="text-[10px] font-medium leading-[normal] text-[#475569]">Foto Bukti yang diajukan</p>
        <div class="flex flex-wrap items-center gap-[10px]">
            <div class="flex w-[206px] flex-col items-center gap-0 px-[3px]">
                <div class="flex w-full justify-center gap-2">
                    <img src="<?= $base ?>/assets/img/<?= e($foto[0] ?? '') ?>" alt="" class="aspect-video w-[94.5px] rounded-[10px] object-cover" />
                    <img src="<?= $base ?>/assets/img/<?= e($foto[1] ?? '') ?>" alt="" class="aspect-video w-[94.5px] rounded-[10px] object-cover" />
                </div>
                <img src="<?= $base ?>/assets/img/<?= e($foto[2] ?? '') ?>" alt="" class="mt-3 h-[106px] w-[189px] rounded-[10px] object-cover" />
            </div>
            <div class="flex w-[326px] max-w-full flex-col gap-[23px]">
                <div class="flex flex-col gap-1">
                    <p class="text-[10px] font-medium leading-[normal] text-[#475569]">Ciri-ciri Khusus Barang</p>
                    <ul class="list-disc pl-[18px] text-xs font-semibold leading-[normal] text-[#37404e]">
                        <?php foreach ($ciri as $c): ?><li><?= e($c) ?></li><?php endforeach; ?>
                    </ul>
                </div>
                <div class="flex flex-col gap-[7px] text-[10px] font-medium leading-[normal]">
                    <p class="text-[#475569]">Deskripsi Pengajuan</p>
                    <p class="text-xs text-[#0f172a]"><?= e($deskripsi) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
