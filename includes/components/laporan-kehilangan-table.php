<?php
/**
 * Komponen: laporan-kehilangan-table
 * Tabel laporan kehilangan di Beranda mahasiswa (Figma: "list" di section Laporan Kehilangan).
 *
 * Parameter:
 *   rows        array  Daftar baris. Tiap baris:                          default []
 *                      ['barang' => 'STNK Motor', 'kategori' => 'identitas',
 *                       'lokasi' => 'Parkiran Wall climbing', 'tanggal' => '31-10-2024 12:21']
 *                      kategori: elektronik | aksesoris | identitas
 *   pagination array  Parameter untuk komponen pagination.               default []
 *
 * Contoh:
 *   component('laporan-kehilangan-table', ['rows' => $laporanKehilangan]);
 */
$rows       = $rows ?? [];
$pagination = $pagination ?? [];
$headers = ['Nama Barang', 'Kategori Barang', 'Lokasi Kehilangan', 'Tanggal Kehilangan'];
?>
<div class="flex w-full flex-col gap-4 rounded-xl bg-white p-4 shadow-card sm:p-6">
    <!-- Tabel bisa digeser ke samping di layar kecil; nomor halaman tetap di luar area geser -->
    <div class="overflow-x-auto">
    <div class="flex min-w-[1000px] flex-col gap-4">
        <div class="flex h-[50px] items-center gap-8 rounded-[10px] bg-page px-4">
            <?php foreach ($headers as $h): ?>
                <div class="flex h-full flex-1 items-center justify-center">
                    <span class="whitespace-nowrap font-heading text-xl font-semibold leading-[normal] text-black"><?= e($h) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex flex-col gap-8 text-sm leading-[normal] text-black">
            <?php foreach ($rows as $row): ?>
                <div class="flex h-10 items-center gap-8">
                    <div class="flex h-full flex-1 items-center justify-center"><p class="w-[91px]"><?= e($row['barang'] ?? '') ?></p></div>
                    <div class="flex h-full w-[227px] shrink-0 items-center justify-center">
                        <?php component('tag-kategori', ['kategori' => $row['kategori'] ?? 'elektronik']); ?>
                    </div>
                    <div class="flex h-full flex-1 items-center justify-center"><p class="w-[91px]"><?= e($row['lokasi'] ?? '') ?></p></div>
                    <div class="flex h-full w-[222px] shrink-0 items-center justify-center"><p class="whitespace-nowrap"><?= e($row['tanggal'] ?? '') ?></p></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    <?php component('pagination', $pagination + ['tray' => true]); ?>
</div>
