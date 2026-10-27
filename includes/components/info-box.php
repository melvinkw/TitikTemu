<?php
/**
 * Komponen: info-box
 * Kotak informasi biru (Figma: kotak #e5f3fe teks #008bfb di form & review).
 *
 * Parameter:
 *   text   string  Isi informasi.                                  default ''
 *   class  string  Kelas tambahan (mis. padding 'px-10').          default 'px-4'
 *
 * Contoh:
 *   component('info-box', ['text' => 'Data yang anda kirimkan akan diverifikasi ...', 'class' => 'px-10']);
 */
$text  = $text ?? '';
$class = $class ?? 'px-4';
?>
<div class="flex min-h-20 w-full items-center rounded-xl bg-status-diproses-bg py-6 <?= e($class) ?>">
    <p class="flex-1 text-sm leading-[normal] text-status-diproses"><?= e($text) ?></p>
</div>
