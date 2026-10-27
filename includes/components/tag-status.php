<?php
/**
 * Komponen: tag-status
 * Label status laporan (Figma: "Tags" — Ditolak, Selesai, Pending, Diproses, Expired).
 *
 * Parameter:
 *   status  string   'ditolak' | 'selesai' | 'pending' | 'diproses' | 'expired'   default 'pending'
 *   label   ?string  Teks label. Kosongkan untuk memakai nama status.            default null
 *
 * Contoh:
 *   component('tag-status', ['status' => 'diproses']);
 */
$status = $status ?? 'pending';
$label  = $label ?? null;

// icon = file di assets/img, iconSize = ukuran render ikon (px), iconBox = ukuran kotak ikon di Figma
$styles = [
    'ditolak'  => ['bg' => 'bg-status-ditolak-bg w-[102px]',  'text' => 'text-status-ditolak',  'icon' => 'tag-ditolak.svg',  'label' => 'Ditolak'],
    'selesai'  => ['bg' => 'bg-status-selesai-bg w-[102px]',  'text' => 'text-status-selesai',  'icon' => 'tag-selesai.svg',  'label' => 'Selesai'],
    'pending'  => ['bg' => 'bg-status-pending-bg w-[104px]',  'text' => 'text-status-pending',  'icon' => 'tag-pending.svg',  'label' => 'Pending'],
    'diproses' => ['bg' => 'bg-status-diproses-bg',           'text' => 'text-status-diproses', 'icon' => 'tag-diproses.svg', 'label' => 'Diproses'],
    'expired'  => ['bg' => 'bg-status-expired-bg w-[104px]',  'text' => 'text-status-expired',  'icon' => 'tag-expired.svg',  'label' => 'Expired'],
];
$s = $styles[$status] ?? $styles['pending'];

// Ikon lama di repo (selesai, diproses) sudah termasuk tebal garis (21.5px);
// ikon Solar baru memakai viewBox 24 sehingga dirender 24px agar lingkarannya 20px seperti di Figma.
$iconImg = in_array($status, ['selesai', 'diproses'], true)
    ? 'h-[21.5px] w-[21.5px] -inset-[0.75px]'
    : 'h-6 w-6 -inset-[2px]';
?>
<span class="inline-flex h-10 items-center justify-center gap-[10px] rounded-full p-[10px] <?= $s['bg'] ?>">
    <span class="relative block h-5 w-5 shrink-0">
        <img src="<?= baseUrl() ?>/assets/img/<?= $s['icon'] ?>" alt="" class="absolute max-w-none <?= $iconImg ?>" />
    </span>
    <span class="whitespace-nowrap text-center text-xs font-semibold leading-[normal] <?= $s['text'] ?>"><?= e($label ?? $s['label']) ?></span>
</span>
