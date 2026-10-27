<?php
/**
 * Komponen: modal-detail-barang
 * Modal detail barang temuan (Figma: "modal detail barang" di frame Detail Barang Temuan).
 *
 * Parameter:
 *   nama       string  Nama barang.                                         default ''
 *   kategori   string  'elektronik' | 'aksesoris' | 'identitas'            default 'elektronik'
 *   deskripsi  string  Deskripsi barang.                                    default ''
 *   lokasi     string  Lokasi ditemukan.                                    default ''
 *   waktu      string  Tanggal & waktu ditemukan.                           default ''
 *   status     string  Keterangan status/penyimpanan.                       default ''
 *   foto       array   Nama file foto di assets/img/ (ditampilkan berjajar). default []
 *   klaimHref  string  Tujuan tombol "Klaim Kepemilikan".                   default '#'
 *   closeHref  string  Tujuan saat latar diklik (menutup modal).            default '#'
 *
 * Contoh:
 *   component('modal-detail-barang', $detail + ['klaimHref' => $base . '/mahasiswa/klaim-barang.php']);
 */
$nama      = $nama ?? '';
$kategori  = $kategori ?? 'elektronik';
$deskripsi = $deskripsi ?? '';
$lokasi    = $lokasi ?? '';
$waktu     = $waktu ?? '';
$status    = $status ?? '';
$foto      = $foto ?? [];
$klaimHref = $klaimHref ?? '#';
$closeHref = $closeHref ?? '#';
$base      = baseUrl();
?>
<?php component('modal-overlay', ['closeHref' => $closeHref]); ?>
<div class="pointer-events-none fixed inset-0 z-[70] flex items-start justify-center overflow-y-auto p-4">
    <div role="dialog" aria-modal="true"
         class="pointer-events-auto my-auto flex w-full max-w-[1281px] justify-center rounded-[20px] bg-white px-6 py-8 shadow-card">
        <div class="flex w-full max-w-[1162px] flex-col items-center gap-10 lg:flex-row">

            <!-- Kiri: informasi -->
            <div class="flex w-full min-w-0 flex-1 flex-col justify-center lg:min-w-[400px]">
                <h2 class="py-2 font-heading text-[28px] font-bold leading-[normal] text-navy"><?= e($nama) ?></h2>
                <div class="py-4"><?php component('tag-kategori', ['kategori' => $kategori]); ?></div>
                <div class="flex flex-col gap-4 leading-[normal] text-navy">
                    <h3 class="font-heading text-xl font-semibold">Deskripsi</h3>
                    <p class="text-sm"><?= e($deskripsi) ?></p>
                </div>
                <div class="py-4"><div class="h-0.5 max-w-[500px] bg-accent"></div></div>
                <div class="flex flex-col gap-6 text-sm leading-[normal] text-navy">
                    <div class="flex items-start gap-2">
                        <div class="flex w-[33px] shrink-0 items-center self-stretch">
                            <img src="<?= $base ?>/assets/img/icon-location.svg" alt="" width="24" height="24" class="h-6 w-6" />
                        </div>
                        <div class="flex flex-1 flex-col gap-2">
                            <p class="font-semibold">Lokasi Ditemukan</p>
                            <p><?= e($lokasi) ?></p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex shrink-0 items-center self-stretch">
                            <img src="<?= $base ?>/assets/img/icon-calendar.svg" alt="" width="24" height="24" class="h-6 w-6" />
                        </div>
                        <div class="flex flex-1 flex-col gap-2">
                            <p class="font-semibold">Tanggal &amp; Waktu Ditemukan</p>
                            <p><?= e($waktu) ?></p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 py-6 text-sm leading-[normal] text-navy">
                    <p class="font-semibold">Status</p>
                    <p><?= e($status) ?></p>
                </div>
                <div class="pt-4">
                    <?php component('button', ['label' => 'Klaim Kepemilikan', 'href' => $klaimHref, 'class' => 'w-full']); ?>
                </div>
            </div>

            <!-- Kanan: foto (Figma: "card-7", geser kiri/kanan) -->
            <div class="flex h-auto w-full max-w-[566px] items-center gap-2 lg:h-[586px]">
                <button type="button" aria-label="Foto sebelumnya" class="invisible shrink-0">
                    <img src="<?= $base ?>/assets/img/icon-chevron-left.svg" alt="" width="32" height="32" class="h-8 w-8" />
                </button>
                <div class="flex h-[300px] min-w-0 flex-1 items-center overflow-hidden px-5 lg:h-[528px]">
                    <div class="flex items-center gap-4">
                        <?php foreach ($foto as $f): ?>
                            <img src="<?= $base ?>/assets/img/<?= e($f) ?>" alt="<?= e($nama) ?>"
                                 class="h-[260px] w-[240px] shrink-0 rounded-xl object-cover lg:h-[500px] lg:w-[460px]" />
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="button" aria-label="Foto berikutnya" class="shrink-0">
                    <img src="<?= $base ?>/assets/img/icon-chevron-right.svg" alt="" width="32" height="32" class="h-8 w-8" />
                </button>
            </div>

        </div>
    </div>
</div>
