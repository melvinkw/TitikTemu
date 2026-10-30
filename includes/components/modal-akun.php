<?php
/**
 * Komponen: modal-akun
 * Modal tambah/edit akun (Figma: "Modal Manajemen Akun" — petugas tambah akun / petugas edit akun).
 * Placeholder semua kolom di Figma tertulis "Pilih Kategori" — dibiarkan sesuai desain.
 *
 * Parameter:
 *   mode       string  'tambah' | 'edit'                     default 'tambah'
 *   peran      string  Kata di judul, mis. 'Petugas'/'Admin'. default 'Petugas'
 *   closeHref  string  Tujuan tombol Batal & klik latar.      default '#'
 *
 * Contoh:
 *   component('modal-akun', ['mode' => 'edit', 'peran' => 'Admin', 'closeHref' => $self]);
 */
$mode      = $mode ?? 'tambah';
$peran     = $peran ?? 'Petugas';
$closeHref = $closeHref ?? '#';
$isEdit    = $mode === 'edit';
$pos = ['pos-1' => 'Pos 1', 'pos-2' => 'Pos 2'];
?>
<?php component('modal-overlay', ['closeHref' => $closeHref]); ?>
<div class="pointer-events-none fixed inset-0 z-[70] flex items-start justify-center overflow-y-auto p-4">
    <form role="dialog" aria-modal="true" onsubmit="return false"
          class="my-auto pointer-events-auto flex w-full max-w-[628px] flex-col gap-8 rounded-xl bg-white px-8 py-12 sm:px-20">
        <h2 class="flex items-center gap-4 font-heading text-xl font-semibold leading-[normal] text-navy">
            <img src="<?= baseUrl() ?>/assets/img/icon-pen.svg" alt="" width="24" height="24" class="h-6 w-6" />
            <?= $isEdit ? 'Edit' : 'Tambah' ?> Akun <?= e($peran) ?>
        </h2>
        <div class="flex flex-col gap-6">
            <?php component('field', ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Pilih Kategori']); ?>
            <?php component('field', ['label' => 'Password', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Pilih Kategori']); ?>
            <?php component('field', ['label' => 'Pos Utama', 'name' => 'pos_utama', 'type' => 'select', 'placeholder' => 'Pilih Kategori', 'options' => $pos]); ?>
            <?php component('field', ['label' => 'Pos Penempatan', 'name' => 'pos_penempatan', 'type' => 'select', 'placeholder' => 'Pilih Kategori', 'options' => $pos]); ?>
        </div>
        <div class="flex items-center justify-end gap-4">
            <?php component('aksi-petugas', ['type' => 'abu', 'label' => 'Batal', 'href' => $closeHref, 'class' => 'w-[127px]']); ?>
            <?php component('aksi-petugas', ['label' => ($isEdit ? 'Edit' : 'Tambah') . ' Akun', 'href' => $closeHref]); ?>
        </div>
    </form>
</div>
