<?php
/**
 * Komponen: button
 * Tombol sesuai komponen Figma "Buttons" (UI Kit).
 *
 * Parameter:
 *   label     string   Teks tombol.                                        default 'Button'
 *   variant   string   'primary'    = latar navy, teks putih               default 'primary'
 *                      'secondary'  = latar kuning (accent), teks navy
 *                      'tertiary'   = garis navy, latar transparan
 *                      'quaternary' = teks navy saja, tanpa garis/latar (Batal, Kembali, Reset, Tutup)
 *   href      ?string  Jika diisi, tombol dirender sebagai <a>.            default null
 *   type      string   Atribut type untuk <button>.                        default 'button'
 *   icon      ?string  Nama file ikon di assets/img/ (tampil di kanan).    default null
 *   iconClass string   Kelas tambahan untuk ikon (mis. 'rotate-180').      default ''
 *   class     string   Kelas Tailwind tambahan.                            default ''
 *   attrs     string   Atribut HTML tambahan, sudah aman.                  default ''
 *
 * Contoh:
 *   component('button', ['label' => 'Submit', 'href' => $base . '/mahasiswa/review-hilang.php']);
 *   component('button', ['label' => 'Batal', 'variant' => 'quaternary']);
 */
$label     = $label ?? 'Button';
$variant   = $variant ?? 'primary';
$href      = $href ?? null;
$type      = $type ?? 'button';
$icon      = $icon ?? null;
$iconClass = $iconClass ?? '';
$class     = $class ?? '';
$attrs     = $attrs ?? '';

$variants = [
    'primary'    => 'bg-navy text-white shadow-button',
    'secondary'  => 'bg-accent text-navy shadow-button',
    'tertiary'   => 'border border-navy text-navy shadow-button',
    'quaternary' => 'text-navy',
];
$classes = 'inline-flex items-center justify-center gap-2 rounded-lg px-8 py-[14px] text-sm font-semibold leading-[normal] whitespace-nowrap '
    . ($variants[$variant] ?? $variants['primary']) . ' ' . $class;

$iconHtml = $icon
    ? '<img src="' . baseUrl() . '/assets/img/' . e($icon) . '" alt="" width="24" height="24" class="h-6 w-6 shrink-0 ' . e($iconClass) . '" />'
    : '';
?>
<?php if ($href !== null): ?>
    <a href="<?= e($href) ?>" class="<?= e($classes) ?>" <?= $attrs ?>><?= e($label) ?><?= $iconHtml ?></a>
<?php else: ?>
    <button type="<?= e($type) ?>" class="<?= e($classes) ?>" <?= $attrs ?>><?= e($label) ?><?= $iconHtml ?></button>
<?php endif; ?>
