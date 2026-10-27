<?php
/**
 * Komponen: aksi-petugas
 * Tombol aksi kecil di panel Petugas/Admin (Figma: "Aksi-Petugas").
 *
 * Parameter:
 *   type   string   'verifikasi' (navy + ikon edit) | 'lihat' (abu) | 'tolak' (merah muda) | 'abu' (abu, label bebas)
 *                                                                          default 'verifikasi'
 *   label  ?string  Teks tombol. Kosong = teks bawaan tipe.               default null
 *   href   string   Tujuan tombol.                                        default '#'
 *   class  string   Kelas tambahan (mis. lebar 'w-[110px]').              default ''
 *
 * Contoh:
 *   component('aksi-petugas', ['href' => $base . '/petugas/verifikasi-barang.php']);
 *   component('aksi-petugas', ['type' => 'lihat', 'class' => 'w-[110px]']);
 *   component('aksi-petugas', ['type' => 'abu', 'label' => 'Kembali', 'class' => 'w-[127px]']);
 */
$type  = $type ?? 'verifikasi';
$label = $label ?? null;
$href  = $href ?? '#';
$class = $class ?? '';
$types = [
    'verifikasi' => ['class' => 'gap-2 bg-navy text-white',              'label' => 'Verifikasi', 'icon' => true],
    'lihat'      => ['class' => 'bg-status-expired-bg text-status-expired', 'label' => 'Lihat Laporan', 'icon' => false],
    'tolak'      => ['class' => 'bg-[#fee5e0] text-status-ditolak',      'label' => 'Tolak Klaim', 'icon' => false],
    'abu'        => ['class' => 'bg-status-expired-bg text-status-expired', 'label' => 'Kembali', 'icon' => false],
];
$t = $types[$type] ?? $types['verifikasi'];
?>
<a href="<?= e($href) ?>"
   class="inline-flex shrink-0 items-center justify-center whitespace-nowrap rounded-[15px] p-[10px] text-sm font-semibold leading-[normal] <?= $t['class'] ?> <?= e($class) ?>">
    <?php if ($t['icon']): ?>
        <img src="<?= baseUrl() ?>/assets/img/icon-edit-white.svg" alt="" width="18" height="18" class="h-[18px] w-[18px]" />
    <?php endif; ?>
    <?= e($label ?? $t['label']) ?>
</a>
