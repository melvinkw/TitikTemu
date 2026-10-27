<?php
/**
 * includes/component.php
 * Helper untuk memanggil komponen UI di folder includes/components/.
 *
 * Cara pakai di halaman:
 *   <?php component('button', ['label' => 'Submit', 'variant' => 'primary']); ?>
 *
 * - Argumen pertama  : nama file komponen (tanpa .php), boleh pakai subfolder.
 * - Argumen kedua    : array parameter. Setiap key jadi variabel di dalam file komponen.
 * - Variabel di dalam komponen tidak bocor ke halaman / komponen lain,
 *   karena file komponen dijalankan di dalam scope fungsi.
 * - Parameter yang tidak diisi memakai nilai default yang ditulis di file komponen.
 */

function component(string $name, array $props = []): void
{
    $file = __DIR__ . '/components/' . $name . '.php';
    if (!is_file($file)) {
        trigger_error("Komponen '$name' tidak ditemukan di includes/components/", E_USER_WARNING);
        return;
    }

    (static function (string $__file, array $__props): void {
        extract($__props, EXTR_SKIP);
        require $__file;
    })($file, $props);
}
