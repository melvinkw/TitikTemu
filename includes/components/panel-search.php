<?php
/**
 * Komponen: panel-search
 * Kolom cari + tombol Filter di halaman Petugas/Admin (Figma: "Search Bar").
 *
 * Parameter:
 *   placeholder  string  Teks placeholder.         default 'Cari Barang'
 *
 * Contoh:
 *   component('panel-search', ['placeholder' => 'Cari Petugas berdasarkan nama, ID, pos utama, pos penempatan']);
 */
$placeholder = $placeholder ?? 'Cari Barang';
$base        = baseUrl();
?>
<form class="flex w-full items-center gap-6 overflow-hidden rounded-[10px] bg-white p-2 shadow-[0_0_1px_1.5px_rgba(0,0,0,0.25)]" onsubmit="return false">
    <label class="flex h-[49px] min-w-0 flex-1 items-center gap-[10px] rounded-full bg-page px-4">
        <img src="<?= $base ?>/assets/img/icon-search-navy.svg" alt="" width="15" height="16" class="h-4 w-[15px] shrink-0 opacity-60" />
        <input type="text" name="q" placeholder="<?= e($placeholder) ?>"
               class="w-full bg-transparent text-xs font-semibold leading-[normal] text-navy outline-none placeholder:text-status-expired" />
    </label>
    <button type="button" class="flex shrink-0 items-center gap-[14px] rounded-xl border border-navy p-[10px] text-sm font-semibold leading-[normal] text-navy">
        <img src="<?= $base ?>/assets/img/icon-filter.svg" alt="" width="20" height="20" class="h-5 w-5" />
        Filter
    </button>
</form>
