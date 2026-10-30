<?php
/**
 * Komponen: penerima-card
 * Kartu data mahasiswa penerima/pengklaim (Figma: "card-6").
 * Foto avatar di Figma belum bisa diunduh — sementara memakai avatar abu-abu.
 *
 * Parameter:
 *   nama   string  Nama mahasiswa.                  default ''
 *   nim    string  NIM.                             default ''
 *   foto   string  File avatar di assets/img/.      default 'avatar-placeholder.svg'
 *
 * Contoh:
 *   component('penerima-card', ['nama' => 'Farhan', 'nim' => '25410706000']);
 */
$nama = $nama ?? '';
$nim  = $nim ?? '';
$foto = $foto ?? 'avatar-placeholder.svg';
?>
<div class="flex h-[140px] w-full flex-col gap-3 rounded-[10px] bg-white">
    <?php component('card-header-bar', ['title' => 'Penerima']); ?>
    <div class="flex items-center gap-[13px]">
        <img src="<?= baseUrl() ?>/assets/img/<?= e($foto) ?>" alt="" width="61" height="64" class="h-16 w-[61px] shrink-0 rounded-full bg-[#e2e8f0] object-cover" />
        <div class="flex flex-col gap-2 whitespace-nowrap leading-[normal] text-black">
            <p class="text-sm font-semibold"><?= e($nama) ?></p>
            <p class="text-xs">NIM: <?= e($nim) ?></p>
        </div>
    </div>
</div>
