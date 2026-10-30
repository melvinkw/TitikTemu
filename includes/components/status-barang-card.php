<?php
/**
 * Komponen: status-barang-card
 * Kartu kecil status barang di halaman detail Petugas.
 * Tambahan di luar Figma (disetujui Mafaza) untuk mengisi ruang kosong di bawah kartu Penerima.
 * Gaya mengikuti kartu Figma "card-6" (bilah judul biru muda + isi).
 *
 * Parameter:
 *   status  string  Status untuk komponen status-petugas.     default 'disimpan'
 *   simpan  string  Lokasi penyimpanan.                         default ''
 *
 * Contoh:
 *   component('status-barang-card', ['status' => 'disimpan', 'simpan' => 'Pos Gedung Sipil']);
 */
$status = $status ?? 'disimpan';
$simpan = $simpan ?? '';
?>
<div class="flex w-full flex-col gap-3 rounded-[10px] bg-white">
    <?php component('card-header-bar', ['title' => 'Status Barang']); ?>
    <div class="flex flex-col items-start gap-4 px-4">
        <?php component('status-petugas', ['status' => $status]); ?>
        <?php component('info-row', ['label' => 'Lokasi Penyimpanan :', 'value' => $simpan]); ?>
    </div>
</div>
