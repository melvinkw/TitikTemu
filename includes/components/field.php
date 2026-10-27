<?php
/**
 * Komponen: field
 * Label + input form (Figma: "Field" — label League Spartan 16px, kotak border #abadbc tinggi 40px).
 *
 * Parameter:
 *   label        string   Teks label.                                                   default ''
 *   name         string   Atribut name input.                                           default ''
 *   type         string   'text' | 'email' | 'password' | 'select' | 'textarea' | 'datetime'   default 'text'
 *   placeholder  string   Placeholder (untuk select: teks pilihan pertama).             default ''
 *   options      array    Pilihan untuk type 'select': ['value' => 'Label', ...].      default []
 *   helper       ?string  Teks kecil di bawah input.                                    default null
 *   rows         int      Tinggi textarea (baris).                                      default 3
 *   class        string   Kelas tambahan untuk pembungkus.                              default ''
 *   id           ?string  Atribut id input. Kosong = 'field-{name}'.                    default null
 *   attrs        string   Atribut tambahan untuk input, sudah aman (mis. 'required').   default ''
 *   star         bool     Tampilkan tanda * merah di depan label (field wajib).        default false
 *
 * Contoh:
 *   component('field', ['label' => 'Nama Barang', 'name' => 'nama_barang',
 *                       'placeholder' => 'Contoh: Earbuds, Tumbler, Charger Laptop']);
 *   component('field', ['label' => 'Kategori Barang', 'name' => 'kategori', 'type' => 'select',
 *                       'placeholder' => 'Pilih Kategori', 'options' => $kategori]);
 */
$label       = $label ?? '';
$name        = $name ?? '';
$type        = $type ?? 'text';
$placeholder = $placeholder ?? '';
$options     = $options ?? [];
$helper      = $helper ?? null;
$rows        = $rows ?? 3;
$class       = $class ?? '';
$attrs       = $attrs ?? '';
$star        = $star ?? false;

$id = $id ?? 'field-' . preg_replace('/[^a-z0-9_-]/i', '', $name);
$base = baseUrl();
// Kotak input: border #abadbc, radius 8, shadow tombol, teks League Spartan 16px
$box = 'w-full rounded-lg border border-line bg-transparent px-4 font-heading text-base leading-[1.5] text-navy shadow-button outline-none placeholder:text-line focus:border-navy';
?>
<div class="flex min-w-0 flex-col gap-2 <?= e($class) ?>">
    <label for="<?= e($id) ?>" class="flex items-center font-heading text-base font-semibold leading-[1.5] text-navy">
        <?php if ($star): ?><span class="w-[21px] shrink-0 text-center text-status-ditolak">*</span><?php endif; ?>
        <?= e($label) ?>
    </label>

    <?php if ($type === 'select'): ?>
        <div class="relative">
            <select id="<?= e($id) ?>" name="<?= e($name) ?>" class="<?= $box ?> h-10 appearance-none pr-12 invalid:text-line" required>
                <option value="" selected disabled><?= e($placeholder) ?></option>
                <?php foreach ($options as $value => $text): ?>
                    <option value="<?= e((string) $value) ?>" class="text-navy"><?= e($text) ?></option>
                <?php endforeach; ?>
            </select>
            <img src="<?= $base ?>/assets/img/icon-chevron-down.svg" alt="" width="24" height="24"
                 class="pointer-events-none absolute right-[22px] top-1/2 h-6 w-6 -translate-y-1/2" />
        </div>

    <?php elseif ($type === 'textarea'): ?>
        <textarea id="<?= e($id) ?>" name="<?= e($name) ?>" rows="<?= (int) $rows ?>"
                  placeholder="<?= e($placeholder) ?>" class="<?= $box ?> min-h-[107px] resize-y py-[14px]"></textarea>

    <?php elseif ($type === 'datetime'): ?>
        <div class="relative">
            <img src="<?= $base ?>/assets/img/icon-calendar.svg" alt="" width="24" height="24"
                 class="pointer-events-none absolute left-[14px] top-1/2 h-6 w-6 -translate-y-1/2" />
            <input id="<?= e($id) ?>" name="<?= e($name) ?>" type="text" placeholder="<?= e($placeholder) ?>"
                   class="<?= $box ?> h-10 pl-12" />
        </div>

    <?php else: ?>
        <input id="<?= e($id) ?>" name="<?= e($name) ?>" type="<?= e($type) ?>" placeholder="<?= e($placeholder) ?>"
               class="<?= $box ?> h-10" <?= $attrs ?> />
    <?php endif; ?>

    <?php if ($helper !== null): ?>
        <p class="text-sm leading-[normal] text-muted"><?= e($helper) ?></p>
    <?php endif; ?>
</div>
