<?php
/**
 * Komponen: filter-bar
 * Kotak pencarian barang (Figma: "search bar" — Cari Barang, Kategori Barang, Lokasi + tombol Cari/Reset).
 *
 * Parameter:
 *   lokasiLabel  string  Placeholder kolom lokasi.     default 'Lokasi Kehilangan'
 *   resetHref    string  Tujuan tombol Reset.          default '#'
 *
 * Contoh:
 *   component('filter-bar', ['resetHref' => $base . '/mahasiswa/barang-temuan.php']);
 */
$lokasiLabel = $lokasiLabel ?? 'Lokasi Kehilangan';
$resetHref   = $resetHref ?? '#';
$base        = baseUrl();
// Pill filter (Figma: komponen "filter")
$pill = 'flex h-[49px] w-full items-center gap-[10px] rounded-full bg-page px-4 text-xs font-semibold leading-[normal] text-navy';
?>
<form class="flex w-full flex-col gap-4 rounded-xl bg-white p-4 sm:p-6 lg:flex-row lg:items-center" onsubmit="return false">
    <div class="grid flex-1 grid-cols-1 gap-4 md:grid-cols-3">
        <label class="<?= $pill ?>">
            <img src="<?= $base ?>/assets/img/icon-search-navy.svg" alt="" width="15" height="16" class="h-4 w-[15px] shrink-0" />
            <input type="text" name="q" placeholder="Cari Barang" class="w-full bg-transparent outline-none placeholder:text-navy" />
        </label>
        <label class="<?= $pill ?> relative">
            <select name="kategori" class="w-full appearance-none bg-transparent pl-[25px] pr-8 outline-none">
                <option value="">Kategori Barang</option>
                <option value="elektronik">Elektronik</option>
                <option value="aksesoris">Aksesoris</option>
                <option value="kartu-identitas">Kartu Identitas</option>
                <option value="buku">Buku</option>
                <option value="lainnya">Lainnya</option>
            </select>
            <img src="<?= $base ?>/assets/img/icon-chevron-down.svg" alt="" width="24" height="24" class="pointer-events-none absolute right-4 h-6 w-6" />
        </label>
        <label class="<?= $pill ?>">
            <img src="<?= $base ?>/assets/img/icon-search-navy.svg" alt="" width="15" height="16" class="h-4 w-[15px] shrink-0" />
            <input type="text" name="lokasi" placeholder="<?= e($lokasiLabel) ?>" class="w-full bg-transparent outline-none placeholder:text-navy" />
        </label>
    </div>
    <div class="flex shrink-0 items-center gap-2">
        <?php component('button', ['label' => 'Cari', 'type' => 'submit']); ?>
        <?php component('button', ['label' => 'Reset', 'variant' => 'quaternary', 'href' => $resetHref]); ?>
    </div>
</form>
