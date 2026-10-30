<?php
/**
 * components/mahasiswa/navbar.php
 * Navbar untuk semua halaman mahasiswa.
 *
 * Cara pakai di halaman:
 *   $menuAktif = 'dashboard';   // pilihan: dashboard, daftar-barang, riwayat
 *   require_once __DIR__ . '/../components/mahasiswa/navbar.php';
 */
$menuAktif = $menuAktif ?? '';
?>
<nav class="flex items-center justify-between border-b border-indigo-200 px-4 py-6 md:px-20">
    <!-- Spacer kiri supaya menu tetap di tengah -->
    <div class="w-16"></div>

    <!-- Menu tengah -->
    <div class="flex flex-wrap justify-center gap-6 text-sm font-semibold md:gap-10">
        <a href="<?= $base ?>/mahasiswa/dashboard.php"
           class="<?= $menuAktif === 'dashboard' ? 'text-orange-400' : 'text-navy hover:text-orange-400' ?>">
            Dashboard
        </a>
        <a href="<?= $base ?>/mahasiswa/daftar-barang.php"
           class="<?= $menuAktif === 'daftar-barang' ? 'text-orange-400' : 'text-navy hover:text-orange-400' ?>">
            Daftar Barang
        </a>
        <a href="<?= $base ?>/mahasiswa/riwayat.php"
           class="<?= $menuAktif === 'riwayat' ? 'text-orange-400' : 'text-navy hover:text-orange-400' ?>">
            Riwayat
        </a>
    </div>

    <!-- Logout -->
    <a href="<?= $base ?>/proses/logout.php" class="w-16 text-right text-sm font-semibold text-red-400 hover:text-red-500">
        Logout
    </a>
</nav>
