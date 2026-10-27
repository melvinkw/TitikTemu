<?php
/**
 * Komponen: modal-status
 * Modal hasil aksi Petugas/Admin (Figma: "Modal" — 7 varian).
 *
 * Parameter:
 *   variant    string  'diterima' | 'disetujui' | 'diserahkan' | 'klaim-ditolak' | 'barang-ditolak' | 'error' | 'hapus'
 *                                                                                default 'diterima'
 *   title      ?string Ganti judul bawaan (mis. 'Hapus Laporan?').                default null
 *   body       ?string Ganti teks bawaan.                                         default null
 *   href       string  Tujuan tombol "Kembali ke Beranda" / "Hapus".              default '#'
 *   closeHref  string  Tujuan tombol "Batal" & klik latar.                        default '#'
 *
 * Contoh:
 *   component('modal-status', ['variant' => 'hapus', 'title' => 'Hapus Laporan?', 'closeHref' => $self]);
 */
$variant   = $variant ?? 'diterima';
$title     = $title ?? null;
$body      = $body ?? null;
$href      = $href ?? '#';
$closeHref = $closeHref ?? '#';

$serahTerima = 'Proses serah terima barang telah berhasil dicatat dalam sistem. Status barang telah diperbarui dan tersimpan pada riwayat laporan.';
$variants = [
    'diterima'       => ['icon' => 'modal-sukses.svg',       'merah' => false, 'title' => 'Barang Telah Diterima',
                         'body' => 'Barang telah diterima dan tercatat sebagai barang temuan aktif. Data telah tersimpan dan ditampilkan.'],
    'disetujui'      => ['icon' => 'modal-sukses.svg',       'merah' => false, 'title' => 'Klaim Berhasil di Setujui',
                         'body' => 'Klaim telah disetujui dan status barang diperbarui. Proses selanjutnya dapat dilanjutkan ke tahap serah terima barang.'],
    'diserahkan'     => ['icon' => 'modal-sukses.svg',       'merah' => false, 'title' => 'Barang Telah Diserahkan', 'body' => $serahTerima],
    'klaim-ditolak'  => ['icon' => 'modal-sukses-merah.svg', 'merah' => true,  'title' => 'Klaim Berhasil Ditolak',  'body' => $serahTerima],
    'barang-ditolak' => ['icon' => 'modal-sukses-merah.svg', 'merah' => true,  'title' => 'Barang Berhasil Ditolak', 'body' => $serahTerima],
    'error'          => ['icon' => 'modal-error.svg',        'merah' => true,  'title' => 'Error', 'body' => 'Terjadi kesalahan pada sistem.'],
    'hapus'          => ['icon' => 'modal-hapus.svg',        'merah' => true,  'title' => 'Hapus Akun?',
                         'body' => 'Anda akan menghapus [Nama Akun] secara permanen. Tindakan ini tidak dapat dibatalkan. Apakah Anda yakin'],
];
$v = $variants[$variant] ?? $variants['diterima'];
?>
<?php component('modal-overlay', ['closeHref' => $closeHref]); ?>
<div class="pointer-events-none fixed inset-0 z-[70] flex items-start justify-center overflow-y-auto p-4">
    <div role="dialog" aria-modal="true"
         class="my-auto pointer-events-auto flex w-full max-w-[624px] flex-col items-center gap-8 bg-white p-8 shadow-card sm:p-14">
        <img src="<?= baseUrl() ?>/assets/img/<?= $v['icon'] ?>" alt="" width="80" height="80" class="h-20 w-20" />
        <div class="flex w-full flex-col gap-4 text-center leading-[normal]">
            <h2 class="font-heading text-xl font-semibold <?= $v['merah'] ? 'text-status-ditolak' : 'text-navy' ?>"><?= e($title ?? $v['title']) ?></h2>
            <p class="text-sm text-navy"><?= e($body ?? $v['body']) ?></p>
            <?php if ($variant === 'hapus'): ?>
                <div class="flex w-full gap-2">
                    <a href="<?= e($closeHref) ?>" class="flex h-12 flex-1 items-center justify-center rounded-lg border border-status-ditolak px-8 text-sm font-semibold text-status-ditolak shadow-button">Batal</a>
                    <a href="<?= e($href) ?>" class="flex h-12 flex-1 items-center justify-center rounded-lg bg-status-ditolak px-8 text-sm font-semibold text-white shadow-button">Hapus</a>
                </div>
            <?php else: ?>
                <?php component('button', ['label' => 'Kembali ke Beranda', 'href' => $href, 'class' => 'h-12 w-full']); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
