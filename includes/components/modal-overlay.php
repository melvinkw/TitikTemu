<?php
/**
 * Komponen: modal-overlay
 * Latar blur di belakang modal (Figma: layer "blur" — rgba(203,213,225,0.5) + backdrop blur 5px).
 * Dipanggil oleh komponen modal-*, tidak perlu dipanggil langsung dari halaman.
 *
 * Parameter:
 *   closeHref  ?string  Jika diisi, klik latar membuka URL ini (menutup modal).   default null
 *
 * Contoh:
 *   component('modal-overlay', ['closeHref' => $base . '/mahasiswa/barang-temuan.php']);
 */
$closeHref = $closeHref ?? null;
?>
<?php if ($closeHref !== null): ?>
    <a href="<?= e($closeHref) ?>" aria-label="Tutup" class="fixed inset-0 z-[60] bg-[rgba(203,213,225,0.5)] backdrop-blur-[5px]"></a>
<?php else: ?>
    <div class="fixed inset-0 z-[60] bg-[rgba(203,213,225,0.5)] backdrop-blur-[5px]"></div>
<?php endif; ?>
