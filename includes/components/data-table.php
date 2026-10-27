<?php
/**
 * Komponen: data-table
 * Tabel data di halaman Petugas/Admin (Figma: "Card list" — header biru muda, baris, nomor halaman).
 *
 * Parameter:
 *   columns     array  Judul kolom, mis. ['Nama Barang & ID', 'Nama Pelapor', 'Aksi'].   default []
 *   rows        array  Daftar baris. Tiap baris = array sel, satu sel per kolom.          default []
 *                      Jenis sel (key 'type'):
 *                        ['type' => 'judul',  'judul' => 'MacBook Pro Silver', 'sub' => 'FND-9921']
 *                        ['type' => 'teks',   'teks' => 'Putra Mahendra']           // 12px, 1 baris
 *                        ['type' => 'tanggal','teks' => '31-10-2024 12:21']         // 12px, 1 baris
 *                        ['type' => 'status', 'status' => 'disimpan']               // komponen status-petugas
 *                        ['type' => 'aksi',   'aksi' => 'verifikasi', 'href' => '...', 'class' => '']  // komponen aksi-petugas
 *                        ['type' => 'ikon',   'edit' => '...', 'hapus' => '...']   // tombol ikon; isi salah satu/keduanya
 *   pagination array  Parameter untuk komponen pagination.                            default []
 *
 * Contoh:
 *   component('data-table', ['columns' => $kolom, 'rows' => $baris, 'pagination' => ['label' => 'Petugas']]);
 */
$columns    = $columns ?? [];
$rows       = $rows ?? [];
$pagination = $pagination ?? [];
?>
<div class="panel-card flex w-full flex-col gap-4 px-2 py-2">
    <!-- Tabel bisa digeser ke samping di layar kecil; nomor halaman tetap di luar area geser -->
    <div class="overflow-x-auto">
    <div class="flex min-w-[860px] flex-col gap-4">
        <div class="flex h-[50px] items-center gap-8 rounded-[10px] bg-page px-4">
            <?php foreach ($columns as $ci => $col): ?>
                <!-- Kolom pertama rata kiri, sejajar isinya -->
                <div class="flex h-full flex-1 items-center <?= $ci === 0 ? 'justify-start' : 'justify-center' ?>">
                    <span class="whitespace-nowrap text-sm font-semibold leading-[normal] text-black"><?= e($col) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex flex-col gap-4 px-4">
            <?php foreach ($rows as $row): ?>
                <div class="flex min-h-10 items-center gap-8">
                    <?php foreach ($row as $cell):
                        $type = $cell['type'] ?? 'teks'; ?>
                        <?php if ($type === 'judul'): ?>
                            <div class="flex min-w-0 flex-1 flex-col gap-2 whitespace-nowrap leading-[normal] text-black">
                                <p class="text-sm font-semibold"><?= e($cell['judul'] ?? '') ?></p>
                                <p class="text-xs"><?= e($cell['sub'] ?? '') ?></p>
                            </div>
                        <?php else: ?>
                            <div class="flex min-w-0 flex-1 items-center justify-center gap-2">
                                <?php if ($type === 'teks'): ?>
                                    <p class="whitespace-nowrap text-xs leading-[normal] text-black"><?= e($cell['teks'] ?? '') ?></p>
                                <?php elseif ($type === 'tanggal'): ?>
                                    <p class="whitespace-nowrap text-xs leading-[normal] text-black"><?= e($cell['teks'] ?? '') ?></p>
                                <?php elseif ($type === 'status'): ?>
                                    <?php component('status-petugas', ['status' => $cell['status'] ?? 'selesai']); ?>
                                <?php elseif ($type === 'aksi'): ?>
                                    <?php component('aksi-petugas', ['type' => $cell['aksi'] ?? 'verifikasi', 'href' => $cell['href'] ?? '#', 'class' => $cell['class'] ?? '']); ?>
                                <?php elseif ($type === 'ikon'): ?>
                                    <?php if (isset($cell['edit'])) component('icon-button', ['type' => 'edit', 'href' => $cell['edit']]); ?>
                                    <?php if (isset($cell['hapus'])) component('icon-button', ['type' => 'hapus', 'href' => $cell['hapus']]); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    <?php component('pagination', $pagination + ['tray' => true, 'spread' => true]); ?>
</div>
