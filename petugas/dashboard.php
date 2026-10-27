<?php
/**
 * Dashboard Petugas (dipakai juga oleh Admin lewat admin/dashboard.php).
 * Halaman statis sesuai Figma "Petugas-Dashboard-Mafaza".
 *   ?modal=tambah-kehilangan | tambah-penemuan | sukses-kehilangan | sukses-penemuan
 */
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['petugas', 'admin']);

$isAdmin    = currentRole() === 'admin';
$pageTitle  = $isAdmin ? 'Dashboard Admin' : 'Dashboard Petugas';
$panelTitle = 'Dashboard';
$self       = strtok($_SERVER['REQUEST_URI'], '?');
$modal      = $_GET['modal'] ?? '';
$base       = baseUrl();

// Data contoh (dummy) — nanti diganti query
$stats = [
    ['label' => 'Total Laporan Aktif', 'value' => '124', 'variant' => 'navy'],
    ['label' => 'Barang di Storage',   'value' => '124', 'variant' => 'putih'],
    ['label' => 'Menunggu Verifikasi', 'value' => '124', 'variant' => 'kuning'],
];
$tugas = [
    ['title' => 'Verifikasi Laporan Baru:: Dompet Fossil Cokelat (D-203)', 'desc' => '15 menit yang lalu: Menunggu validasi foto ciri khusus.', 'checked' => true],
    ['title' => 'Verifikasi Laporan Baru:: Dompet Fossil Cokelat (D-203)', 'desc' => '15 menit yang lalu: Menunggu validasi foto ciri khusus.', 'checked' => true],
    ['title' => 'Verifikasi Laporan Baru:: Dompet Fossil Cokelat (D-203)', 'desc' => '15 menit yang lalu: Menunggu validasi foto ciri khusus.', 'checked' => false],
];
$aktivitas = array_fill(0, 3, ['title' => 'Verifikasi Laporan Baru:: Dompet Fossil Cokelat (D-203)', 'desc' => '15 menit yang lalu: Menunggu validasi foto ciri khusus.']);
$ringkasan = [
    ['label' => 'Laporan Diproses', 'value' => 89, 'max' => 120, 'bar' => 'bg-accent'],
    ['label' => 'Selesai/Kembali',  'value' => 89, 'max' => 120, 'bar' => 'bg-status-selesai'],
    ['label' => 'Perlu Revisi',     'value' => 89, 'max' => 120, 'bar' => 'bg-navy'],
];
$populer = [
    ['kategori' => 'Elektronik', 'contoh' => '(Charger, Earphone) - 40%.'],
    ['kategori' => 'Elektronik', 'contoh' => '(Charger, Earphone) - 40%.'],
    ['kategori' => 'Elektronik', 'contoh' => '(Charger, Earphone) - 40%.'],
];

require_once __DIR__ . '/../includes/header_panel.php';
?>
<p class="font-heading text-xl font-semibold leading-[normal] text-black">
    <?= $isAdmin ? 'Selamat Datang, Admin!' : 'Selamat Datang, Pak ' . e($_SESSION['nama'] ?? '') . '!' ?>
</p>

<div class="flex flex-wrap gap-6 desk:gap-8">
    <?php foreach ($stats as $s) component('stat-card', $s); ?>
</div>

<div class="grid grid-cols-1 gap-6 lg:grid-cols-[minmax(0,1fr)_320px] desk:grid-cols-[minmax(0,1fr)_376px] desk:gap-8">
    <!-- Kiri -->
    <div class="flex flex-col gap-6">
        <section class="panel-card flex flex-col gap-4 p-4 pb-6">
            <h2 class="flex items-center gap-4 pt-2 text-base font-semibold leading-[normal] text-black">
                <img src="<?= $base ?>/assets/img/icon-clock-black.svg" alt="" width="20" height="20" class="h-5 w-5" />
                Tugas hari ini
            </h2>
            <div class="flex flex-col gap-2">
                <?php foreach ($tugas as $t) component('task-item', $t); ?>
            </div>
        </section>
        <section class="panel-card flex flex-col gap-4 p-4">
            <h2 class="flex items-center gap-4 pt-0.5 text-base font-semibold leading-[normal] text-black">
                <img src="<?= $base ?>/assets/img/icon-alert-black.svg" alt="" width="20" height="20" class="h-5 w-5" />
                Aktivitas Terbaru
            </h2>
            <div class="flex flex-col gap-2">
                <?php foreach ($aktivitas as $a) component('task-item', $a); ?>
            </div>
        </section>
    </div>

    <!-- Kanan -->
    <div class="flex flex-col gap-6 desk:gap-8">
        <div class="flex gap-4 desk:gap-8">
            <?php component('quick-action', ['label' => 'Tambah Laporan Kehilangan', 'href' => $self . '?modal=tambah-kehilangan', 'variant' => 'navy']); ?>
            <?php component('quick-action', ['label' => 'Tambah Laporan Penemuan',   'href' => $self . '?modal=tambah-penemuan',   'variant' => 'terang']); ?>
        </div>

        <section class="panel-card flex flex-col gap-6 p-5 desk:p-6">
            <h2 class="text-base font-semibold leading-[normal] text-black">Ringkasan Status</h2>
            <div class="flex flex-col gap-4">
                <?php foreach ($ringkasan as $r): ?>
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-between text-xs leading-[normal] text-black">
                            <span class="font-semibold"><?= e($r['label']) ?></span>
                            <span><?= (int) $r['value'] ?>/<?= (int) $r['max'] ?></span>
                        </div>
                        <div class="h-[15px] w-full overflow-hidden rounded-full bg-page">
                            <div class="h-full rounded-full <?= $r['bar'] ?>" style="width: <?= round($r['value'] / $r['max'] * 100) ?>%"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="panel-card flex flex-col gap-6 p-5 desk:p-6">
            <h2 class="text-base font-semibold leading-[normal] text-black">Barang Populer (Sering Hilang)</h2>
            <ol class="flex flex-col gap-4">
                <?php foreach ($populer as $i => $p): ?>
                    <li class="flex items-center gap-3 text-xs leading-[normal] text-black desk:gap-4 desk:text-sm">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-page text-sm font-semibold text-navy"><?= $i + 1 ?></span>
                        <span><b class="font-semibold"><?= e($p['kategori']) ?></b> <?= e($p['contoh']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ol>
        </section>
    </div>
</div>

<?php
// Modal (tampil lewat parameter URL)
if ($modal === 'tambah-kehilangan') {
    component('modal-form-laporan', ['jenis' => 'kehilangan', 'closeHref' => $self, 'submitHref' => $self . '?modal=sukses-kehilangan']);
} elseif ($modal === 'tambah-penemuan') {
    component('modal-form-laporan', ['jenis' => 'penemuan', 'closeHref' => $self, 'submitHref' => $self . '?modal=sukses-penemuan']);
} elseif ($modal === 'sukses-kehilangan') {
    component('modal-sukses', ['variant' => 'kehilangan', 'href' => $self]);
} elseif ($modal === 'sukses-penemuan') {
    component('modal-sukses', ['variant' => 'temuan', 'href' => $self]);
}

require_once __DIR__ . '/../includes/footer_panel.php';
