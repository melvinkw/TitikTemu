<?php
/**
 * Komponen: modal-form-laporan
 * Modal form tambah laporan oleh Petugas/Admin (Figma: "admin-petugas-modal laporan/kehilangan" & ".../penemuan").
 *
 * Parameter:
 *   jenis       string  'kehilangan' | 'penemuan'                      default 'kehilangan'
 *   closeHref   string  Tujuan tombol Batal & klik latar.              default '#'
 *   submitHref  string  Tujuan tombol Submit.                          default '#'
 *
 * Contoh:
 *   component('modal-form-laporan', ['jenis' => 'penemuan', 'closeHref' => $self, 'submitHref' => $self . '?modal=sukses-penemuan']);
 */
$jenis      = $jenis ?? 'kehilangan';
$closeHref  = $closeHref ?? '#';
$submitHref = $submitHref ?? '#';
$penemuan   = $jenis === 'penemuan';

// Pilihan dropdown — sama dengan form mahasiswa
$kategori = [
    'elektronik' => 'Elektronik', 'aksesoris' => 'Aksesoris', 'kartu-identitas' => 'Kartu Identitas',
    'buku' => 'Buku', 'lainnya' => 'Lainnya',
];
$posPenyerahan = [
    'pos-satpam-utama' => 'Pos Satpam Gerbang Utama',
    'pos-gedung-satu'  => 'Pos Satpam Gedung Utama',
    'pos-jti'          => 'Pos Jurusan Teknologi Informasi',
];
?>
<?php component('modal-overlay', ['closeHref' => $closeHref]); ?>
<!-- items-start + my-auto: modal di tengah, tapi kalau lebih tinggi dari layar bisa di-scroll tanpa terpotong -->
<div class="pointer-events-none fixed inset-0 z-[70] flex items-start justify-center overflow-y-auto p-4">
    <form role="dialog" aria-modal="true" onsubmit="return false"
          class="pointer-events-auto my-auto flex w-full flex-col gap-6 rounded-xl bg-white p-6 sm:p-10 desk:gap-10 desk:p-12 <?= $penemuan ? 'max-w-[1082px]' : 'max-w-[628px]' ?>">
        <?php component('page-heading', [
            'title'    => $penemuan ? 'Form Penemuan Barang' : 'Form Kehilangan Barang',
            'subtitle' => 'Isi form dibawah ini dengan detail lengkap untuk mempermudah pencarian',
        ]); ?>

        <?php if ($penemuan): ?>
            <div class="flex flex-col gap-4">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <?php component('field', ['label' => 'Kategori Barang', 'name' => 'kategori', 'type' => 'select', 'star' => true,
                                              'placeholder' => 'Pilih Kategori', 'options' => $kategori]); ?>
                    <?php component('field', ['label' => 'Nama Barang', 'name' => 'nama_barang', 'star' => true,
                                              'placeholder' => 'Contoh: Earbuds, Tumbler, Charger Laptop']); ?>
                    <?php component('field', ['label' => 'Pilih Pos Penyerahan', 'name' => 'pos', 'type' => 'select', 'star' => true,
                                              'placeholder' => 'Pilih Lokasi Pos Penyerahan', 'options' => $posPenyerahan]); ?>
                </div>
                <?php component('field', ['label' => 'Kondisi & Detail Barang', 'name' => 'detail', 'type' => 'textarea', 'star' => true,
                                          'placeholder' => 'Tuliskan detail/ciri-ciri umum barang',
                                          'helper' => '* Semakin detail informasi yang diberikan, semakin mudah barang ditemukan.']); ?>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <?php component('field', ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'star' => true]); ?>
                    <?php component('field', ['label' => 'Lokasi Ditemukan', 'name' => 'lokasi', 'star' => true,
                                              'placeholder' => 'Contoh: Kantin Gedung A, Parkiran motor B']); ?>
                    <?php component('field', ['label' => 'Tanggal & Waktu', 'name' => 'waktu', 'type' => 'datetime', 'star' => true]); ?>
                </div>
                <?php component('upload-box', ['label' => 'Foto Barang (Min 1, Max 3)', 'star' => true, 'compact' => true]); ?>
            </div>
        <?php else: ?>
            <div class="flex flex-col gap-4">
                <?php component('field', ['label' => 'Kategori Barang', 'name' => 'kategori', 'type' => 'select', 'star' => true,
                                          'placeholder' => 'Pilih Kategori', 'options' => $kategori]); ?>
                <div class="grid grid-cols-1 gap-[10px] sm:grid-cols-2">
                    <?php component('field', ['label' => 'Nama Barang', 'name' => 'nama_barang', 'star' => true,
                                              'placeholder' => 'Contoh: Earbuds, Tumbler, Charger Laptop']); ?>
                    <?php component('field', ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'star' => true]); ?>
                </div>
                <?php component('field', ['label' => 'Deskripsi Barang', 'name' => 'deskripsi', 'type' => 'textarea', 'star' => true,
                                          'placeholder' => 'Tuliskan detail/ciri-ciri umum barang',
                                          'helper' => '* Semakin detail informasi yang diberikan, semakin mudah barang ditemukan.']); ?>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <?php component('field', ['label' => 'Lokasi Terakhir Dilihat', 'name' => 'lokasi', 'star' => true,
                                              'placeholder' => 'Contoh: Kantin Gedung A, Parkiran motor B']); ?>
                    <?php component('field', ['label' => 'Tanggal & Waktu', 'name' => 'waktu', 'type' => 'datetime', 'star' => true]); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php component('form-actions', ['backHref' => $closeHref, 'submitHref' => $submitHref]); ?>
    </form>
</div>
