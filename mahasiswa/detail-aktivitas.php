<?php
/**
 * mahasiswa/detail-aktivitas.php
 * Detail riwayat laporan (Figma: "Riwayat Laporan_ditolak"). Tampilan statis — data masih dummy.
 *   ?modal=ditolak  → menampilkan modal alasan penolakan (Figma: "Aktivitas Saya_ditolak_details")
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Riwayat Laporan';
$base = baseUrl();
$self = $base . '/mahasiswa/detail-aktivitas.php';
$showModal = ($_GET['modal'] ?? '') === 'ditolak';

// Data dummy — daftar laporan milik mahasiswa
$laporanSaya = [
    ['nama' => 'Charger Laptop', 'tanggal' => '26 September 2026', 'status' => 'diproses'],
    ['nama' => 'Charger Laptop', 'tanggal' => '26 September 2026', 'status' => 'selesai'],
    ['nama' => 'TWS Huawei',     'tanggal' => '26 September 2026', 'status' => 'ditolak', 'selected' => true],
    // Tambahan contoh (bukan dari Figma) supaya kolom kiri terisi — disetujui Mafaza
    ['nama' => 'Dompet Hitam',   'tanggal' => '20 September 2026', 'status' => 'diproses'],
    ['nama' => 'Kunci Motor',    'tanggal' => '18 September 2026', 'status' => 'selesai'],
];

// Data dummy — laporan yang sedang dibuka
$detail = [
    'id'        => '#0002345',
    'nama'      => 'TWS Huawei',
    'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
    'tanggal'   => '24 September 2026',
    'lokasi'    => 'Parkiran',
    'img'       => 'earphone.png',
];
$alasan = ['Foto kurang jelas', 'Ciri barang yang disebutkan tidak sesuai'];

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="flex flex-col gap-8 px-5 pb-8 pt-6 sm:px-10 lg:px-20">
    <p class="py-2 text-sm font-semibold leading-[normal] text-status-expired">Riwayat Laporan / <?= e($detail['nama']) ?></p>

    <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-2">
        <!-- Kiri: Laporan Saya (Figma: "card-4"). Di layar besar ikut diam saat halaman di-scroll (di bawah navbar). -->
        <section class="flex w-full flex-col gap-6 overflow-hidden rounded-xl bg-white px-5 py-8 shadow-[0_0_4px_1.5px_rgba(0,0,0,0.25)] sm:px-8 sm:py-10 lg:sticky lg:top-[116px] lg:min-h-[483px]">
            <h2 class="text-base leading-[normal] text-muted">Laporan Saya</h2>
            <?php foreach ($laporanSaya as $lap): ?>
                <?php component('riwayat-item', $lap + ['href' => $self]); ?>
            <?php endforeach; ?>
        </section>

        <!-- Kanan -->
        <div class="flex flex-col gap-6">
            <!-- Detail Laporan (Figma: "card-5") -->
            <section class="flex flex-col gap-[10px] overflow-hidden rounded-xl bg-white px-6 py-6 shadow-[0_0_4px_1.5px_rgba(0,0,0,0.25)] sm:px-12">
                <div class="flex flex-col gap-2 py-6 leading-[normal]">
                    <h2 class="font-heading text-[28px] font-bold text-navy">Detail Laporan</h2>
                    <p class="text-sm text-muted">ID Laporan: <?= e($detail['id']) ?></p>
                </div>
                <?php component('item-summary', $detail); ?>
            </section>

            <!-- Timeline (Figma: "card-6") -->
            <section class="py-[10px]">
                <div class="flex flex-col gap-[37px] overflow-hidden rounded-xl bg-white px-8 py-10 shadow-card">
                    <h2 class="text-base leading-[normal] text-muted">Timeline Progress Laporan</h2>
                    <div class="relative flex flex-col gap-[37px] px-2">
                        <!-- Garis vertikal penghubung -->
                        <span class="absolute bottom-[35px] left-[25px] top-5 w-0.5 bg-line" aria-hidden="true"></span>
                        <?php component('timeline-item', ['title' => 'Klaim Diajukan', 'subtitle' => '26 September 2026    .    09.45 AM']); ?>
                        <?php component('timeline-item', ['title' => 'Menunggu Verifikasi Petugas', 'subtitle' => '26 September 2026    .    09.45 AM']); ?>
                        <?php component('timeline-item', [
                            'title'      => 'Verifikasi Ditolak',
                            'subtitle'   => 'ID Laporan: ' . $detail['id'],
                            'state'      => 'ditolak',
                            'pesan'      => $alasan,
                            'detailHref' => $self . '?modal=ditolak',
                        ]); ?>
                        <?php component('timeline-item', ['title' => 'Laporan Selesai', 'subtitle' => '26 September 2026    .    09.45 AM', 'state' => 'menunggu']); ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<?php if ($showModal): ?>
    <?php component('modal-ditolak', ['idLaporan' => '#000000', 'alasan' => $alasan, 'closeHref' => $self]); ?>
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
