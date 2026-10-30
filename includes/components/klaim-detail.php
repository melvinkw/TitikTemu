<?php
/**
 * Komponen: klaim-detail
 * Isi detail klaim: kartu penerima + barang temuan (kiri) dan bukti klaim (kanan).
 * Dipakai petugas/verifikasi-klaim.php & petugas/lihat-klaim.php (Figma: frame "card" di halaman klaim).
 *
 * Parameter:
 *   nama, nim         string  Data pengklaim.                         default contoh Figma
 *   lokasi, waktu     string  Data barang temuan.                     default contoh Figma
 *   ciri              array   Ciri-ciri khusus barang.                default contoh Figma
 *   deskripsi         string  Deskripsi pengajuan.                    default contoh Figma
 *
 * Contoh:
 *   component('klaim-detail');
 */
$nama      = $nama ?? 'Ahmad Muhajir';
$nim       = $nim ?? '25410706000';
$lokasi    = $lokasi ?? 'Perpustakaan Graha Polinema - Lantai 3, Ruang Diskusi';
$waktu     = $waktu ?? '29 Desember 2024 – 16.45 WIB';
$ciri      = $ciri ?? ['Mackbook Pro warna silver', 'Sticker Dies Natalis HMTI di bawah keyboard', 'Nomor seri diawali MCB102'];
$deskripsi = $deskripsi ?? 'Saya sedang belajar untuk ujian akhir di Perpustakaan Utara. Saya meninggalkan laptop sebentar untuk ke kantin. Saat kembali 20 menit kemudian saya baru  sadar laptop saya tidak ada';
?>
<div class="grid grid-cols-1 gap-5 lg:grid-cols-[287px_minmax(0,1fr)]">
    <div class="flex flex-col gap-[50px]">
        <?php component('penerima-card', ['nama' => $nama, 'nim' => $nim]); ?>
        <?php component('barang-temuan-card', ['lokasi' => $lokasi, 'waktu' => $waktu]); ?>
    </div>
    <?php component('klaim-bukti-card', ['ciri' => $ciri, 'deskripsi' => $deskripsi]); ?>
</div>
