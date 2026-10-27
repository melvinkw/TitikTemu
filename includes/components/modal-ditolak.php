<?php
/**
 * Komponen: modal-ditolak
 * Modal detail penolakan klaim (Figma: "Modal-2").
 *
 * Parameter:
 *   idLaporan  string  Nomor laporan.                         default '#000000'
 *   alasan     array   Daftar alasan penolakan.                default []
 *   closeHref  string  Tujuan tombol "Tutup".                  default '#'
 *
 * Contoh:
 *   component('modal-ditolak', ['idLaporan' => '#0002345', 'alasan' => $alasan,
 *                               'closeHref' => $base . '/mahasiswa/detail-aktivitas.php']);
 */
$idLaporan = $idLaporan ?? '#000000';
$alasan    = $alasan ?? [];
$closeHref = $closeHref ?? '#';
?>
<?php component('modal-overlay', ['closeHref' => $closeHref]); ?>
<div class="pointer-events-none fixed inset-0 z-[70] flex items-start justify-center overflow-y-auto p-4">
    <div role="dialog" aria-modal="true"
         class="my-auto pointer-events-auto w-full max-w-[680px] rounded-xl bg-white px-6 py-[35px] shadow-[0_0_4px_1.5px_rgba(0,0,0,0.25)] sm:px-20">
        <div class="flex flex-col items-end gap-[21px]">
            <div class="flex w-full items-center gap-[21px]">
                <img src="<?= baseUrl() ?>/assets/img/timeline-ditolak.svg" alt="" width="35" height="35" class="h-[35px] w-[35px] shrink-0" />
                <div class="flex flex-1 flex-col gap-2 text-sm leading-[normal]">
                    <p class="font-bold text-navy">Verifikasi Ditolak</p>
                    <p class="text-muted">ID Laporan: <?= e($idLaporan) ?></p>
                </div>
            </div>
            <div class="flex w-full flex-col gap-2 text-sm leading-[normal] sm:px-20">
                <p class="font-bold text-navy">Mohon Maaf, permohonan klaim anda ditolak</p>
                <p class="text-muted">Petugas telah meninjau bukti kepemilikan yang anda ajukan, namun terdapat beberapa hal yang tidak sesuai.</p>
            </div>
            <?php component('pesan-petugas', ['title' => 'Alasan Penolakan', 'items' => $alasan]); ?>
            <?php component('button', ['label' => 'Tutup', 'variant' => 'quaternary', 'href' => $closeHref]); ?>
        </div>
    </div>
</div>
