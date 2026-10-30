<?php
/**
 * Komponen: profile-menu
 * Ikon profil + dropdown (Figma: "profile" dan "profile-dropdown").
 *
 * Parameter:
 *   open        bool    Dropdown tampil terbuka.                  default false
 *   toggleHref  string  Tujuan saat ikon diklik (buka/tutup).     default '#'
 *
 * Contoh:
 *   component('profile-menu', ['open' => true]);
 */
$open       = $open ?? false;
$toggleHref = $toggleHref ?? '#';
$base       = baseUrl();
$item = 'flex h-[38px] w-full items-center justify-center whitespace-nowrap rounded-xl p-[10px] text-sm font-semibold leading-[normal] text-navy hover:bg-page';
?>
<div class="relative flex flex-col items-end gap-[7px]">
    <a href="<?= e($toggleHref) ?>" aria-label="Menu profil" class="block h-10 w-10 desk:h-[50px] desk:w-[50px]">
        <img src="<?= $base ?>/assets/img/icon-profile.svg" alt="" width="50" height="50" class="h-10 w-10 desk:h-[50px] desk:w-[50px]" />
    </a>
    <?php if ($open): ?>
        <div class="absolute right-0 top-[47px] desk:top-[57px] z-30 flex w-[152px] flex-col gap-2 rounded-xl border-[0.5px] border-muted bg-white px-1 py-2">
            <!-- Halaman profil belum ada -->
            <a href="#" class="<?= $item ?>">Lihat Profile</a>
            <a href="<?= $base ?>/proses/logout.php" class="<?= $item ?> rounded-full">Logout</a>
        </div>
    <?php endif; ?>
</div>
