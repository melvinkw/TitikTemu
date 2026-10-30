<?php
/**
 * Komponen: status-petugas
 * Label status barang di tabel Petugas/Admin (Figma: "Status-Barang-Petugas").
 *
 * Parameter:
 *   status  string  'selesai' | 'menunggu-penerimaan' | 'menunggu-penyerahan' | 'disimpan' | 'ditolak'
 *                                                                       default 'selesai'
 *
 * Contoh:
 *   component('status-petugas', ['status' => 'disimpan']);
 */
$status = $status ?? 'selesai';
$styles = [
    'selesai'             => ['class' => 'bg-status-selesai-bg text-status-selesai',   'label' => 'Laporan Selesai'],
    'menunggu-penerimaan' => ['class' => 'bg-status-diproses-bg text-status-diproses', 'label' => 'Menunggu Penerimaan'],
    'menunggu-penyerahan' => ['class' => 'bg-status-pending-bg text-status-pending',   'label' => 'Menunggu Penyerahan'],
    'disimpan'            => ['class' => 'bg-status-expired-bg text-status-expired',   'label' => 'Barang Disimpan'],
    'ditolak'             => ['class' => 'bg-[#fee5e0] text-status-ditolak',          'label' => 'Ditolak'],
];
$s = $styles[$status] ?? $styles['selesai'];
?>
<span class="inline-flex items-center justify-center whitespace-nowrap rounded-[25px] p-[10px] text-xs font-semibold leading-[normal] <?= $s['class'] ?>"><?= e($s['label']) ?></span>
