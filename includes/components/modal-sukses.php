<?php
/**
 * Komponen: modal-sukses
 * Modal berhasil kirim (Figma: "Modal submit form" — lapor temuan / lapor kehilangan / klaim barang).
 *
 * Parameter:
 *   variant  string  'temuan' | 'kehilangan' | 'klaim'           default 'temuan'
 *   href     string  Tujuan tombol "Kembali ke Beranda".          default '#'
 *
 * Contoh:
 *   component('modal-sukses', ['variant' => 'kehilangan', 'href' => $base . '/mahasiswa/dashboard.php']);
 */
$variant = $variant ?? 'temuan';
$href    = $href ?? '#';

$texts = [
    'temuan' => [
        'title' => 'Laporan Berhasil Terkirim',
        'body'  => 'Terima kasih atas kejujuran Anda! Laporan barang temuan telah diterima. Mohon serahkan barang ke pos yang telah dipilih',
    ],
    'kehilangan' => [
        'title' => 'Laporan Berhasil Terkirim',
        'body'  => 'Terima kasih telah melapor. Laporan Anda telah tersimpan di Daftar Riwayat. Kami akan memberi tahu Anda via WhatsApp jika ada barang temuan yang cocok',
    ],
    'klaim' => [
        'title' => 'Pengajuan Klaim Terkirim',
        'body'  => 'Bukti kepemilikan Anda telah kami terima untuk diverifikasi. Silakan cek menu Riwayat Klaim secara berkala untuk melihat status persetujuan dari petugas.',
    ],
];
$t = $texts[$variant] ?? $texts['temuan'];
?>
<?php component('modal-overlay'); ?>
<div class="fixed inset-0 z-[70] flex items-start justify-center overflow-y-auto p-4">
    <div role="dialog" aria-modal="true"
         class="my-auto flex min-h-[354px] w-full max-w-[624px] flex-col items-center rounded-xl bg-white p-8 shadow-[0_0_4px_1.5px_rgba(0,0,0,0.25)] sm:p-14">
        <div class="flex w-full max-w-[513px] flex-col items-center gap-8">
            <img src="<?= baseUrl() ?>/assets/img/modal-sukses.svg" alt="" width="80" height="80" class="h-20 w-20" />
            <div class="flex w-full flex-col gap-4 text-center leading-[normal] text-navy">
                <h2 class="font-heading text-xl font-semibold"><?= e($t['title']) ?></h2>
                <p class="text-sm"><?= e($t['body']) ?></p>
                <?php component('button', ['label' => 'Kembali ke Beranda', 'href' => $href, 'class' => 'h-12 w-full']); ?>
            </div>
        </div>
    </div>
</div>
