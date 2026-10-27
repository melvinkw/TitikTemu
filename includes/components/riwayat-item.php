<?php
/**
 * Komponen: riwayat-item
 * Satu laporan di daftar "Laporan Saya" (Figma: "card-3" + "progress-bar" proses/selesai/ditolak).
 *
 * Parameter:
 *   nama      string  Nama barang.                                default ''
 *   tanggal   string  Tanggal dilaporkan.                         default ''
 *   status    string  'diproses' | 'selesai' | 'ditolak'          default 'diproses'
 *   selected  bool    Sedang dipilih (latar abu kebiruan).        default false
 *   href      string  Tujuan saat diklik.                         default '#'
 *
 * Contoh:
 *   component('riwayat-item', ['nama' => 'TWS Huawei', 'tanggal' => '26 September 2026',
 *                              'status' => 'ditolak', 'selected' => true]);
 */
$nama     = $nama ?? '';
$tanggal  = $tanggal ?? '';
$status   = $status ?? 'diproses';
$selected = $selected ?? false;
$href     = $href ?? '#';

// Panjang & warna garis progres sesuai komponen Figma "progress-bar"
$bars = [
    'diproses' => 'w-1/2 bg-status-diproses',
    'selesai'  => 'w-full bg-status-selesai',
    'ditolak'  => 'w-full bg-status-ditolak',
];
?>
<a href="<?= e($href) ?>" class="flex w-full flex-col gap-[6px] rounded-xl px-4 py-2 <?= $selected ? 'bg-[rgba(2,16,61,0.12)]' : '' ?>">
    <div class="flex flex-col gap-2 text-sm leading-[normal]">
        <p class="font-bold text-navy"><?= e($nama) ?></p>
        <p class="text-muted">Dilaporkan: <?= e($tanggal) ?></p>
    </div>
    <div class="flex items-center justify-between gap-3 sm:gap-4">
        <div class="min-w-0 max-w-[260px] flex-1 py-4">
            <div class="h-1.5 max-w-full rounded-full <?= $bars[$status] ?? $bars['diproses'] ?>"></div>
        </div>
        <?php component('tag-status', ['status' => $status]); ?>
    </div>
</a>
