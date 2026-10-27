<?php
/**
 * Komponen: konfirmasi-barang-card
 * Kartu konfirmasi penerimaan barang temuan (Figma: "card-8").
 * Placeholder dropdown di Figma tertulis "Pilih Kategori" — dibiarkan sesuai desain.
 *
 * Parameter:
 *   lokasi      array   Pilihan lokasi penyimpanan [value => label].      default 3 pos contoh
 *   batalHref   string  Tujuan tombol Batal.                              default '#'
 *   terimaHref  string  Tujuan tombol Terima Barang.                      default '#'
 *
 * Contoh:
 *   component('konfirmasi-barang-card', ['batalHref' => $listUrl, 'terimaHref' => $self . '?modal=diterima']);
 */
$lokasi     = $lokasi ?? ['pos-gedung-sipil' => 'Pos Gedung Sipil', 'pos-gerbang-utama' => 'Pos Gerbang Utama', 'pos-jti' => 'Pos Jurusan Teknologi Informasi'];
$batalHref  = $batalHref ?? '#';
$terimaHref = $terimaHref ?? '#';
$pernyataan = [
    'Saya (pelapor) menyatakan bahwa saya telah menerima barang sebagaimana dijelaskan di atas dalam kondisi sesuai saat ditemukan. Saya membebaskan pihak Kemanan TitikTemu dari tanggung jawab lebih lanjut terkait barang ini.',
    'Saya menyatakan telah memberikan barang titipan dalam kondisi sesuai laporan dan bertanggung jawab atas penyimpanan barang tersebut.',
];
?>
<form onsubmit="return false" class="flex w-full flex-col gap-6 rounded-[10px] bg-white">
    <?php component('card-header-bar', ['title' => 'Konfirmasi Barang']); ?>
    <div class="flex flex-col gap-6 px-4">
        <?php component('field', ['label' => 'Pilih Lokasi Penyimpanan', 'name' => 'lokasi_penyimpanan', 'type' => 'select',
                                  'placeholder' => 'Pilih Kategori', 'options' => $lokasi]); ?>
        <?php foreach ($pernyataan as $i => $teks): ?>
            <label class="flex cursor-pointer items-start gap-4">
                <input type="checkbox" name="pernyataan[]" value="<?= $i + 1 ?>" class="peer sr-only" />
                <img src="<?= baseUrl() ?>/assets/img/checkbox-empty.svg" alt="" width="24" height="24" class="h-6 w-6 shrink-0" />
                <span class="text-xs leading-[normal] text-[#0f172a]"><?= e($teks) ?></span>
            </label>
        <?php endforeach; ?>
    </div>
    <div class="flex items-center justify-end gap-4 px-4 pb-4">
        <?php component('aksi-petugas', ['type' => 'abu', 'label' => 'Batal', 'href' => $batalHref, 'class' => 'w-[127px]']); ?>
        <?php component('aksi-petugas', ['label' => 'Terima Barang', 'href' => $terimaHref]); ?>
    </div>
</form>
