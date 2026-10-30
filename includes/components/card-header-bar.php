<?php
/**
 * Komponen: card-header-bar
 * Bilah judul biru muda di kartu halaman detail Petugas (Figma: "Header" tinggi 50px).
 *
 * Parameter:
 *   title  string  Teks judul.         default ''
 *
 * Contoh:
 *   component('card-header-bar', ['title' => 'Penerima']);
 */
$title = $title ?? '';
?>
<div class="flex h-[50px] w-full items-center rounded-[10px] bg-page px-4">
    <p class="whitespace-nowrap text-sm font-semibold leading-[normal] text-black"><?= e($title) ?></p>
</div>
