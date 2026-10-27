<?php
/**
 * includes/header.php
 * Layout atas yang dipakai semua halaman.
 * Sebelum require file ini, set dulu: $pageTitle (opsional)
 */
if (!function_exists('baseUrl')) {
    require_once __DIR__ . '/functions.php';
}
$base = baseUrl();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= e($pageTitle ?? 'TitikTemu') ?> — TitikTemu</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=League+Spartan:wght@600;700;800&display=swap" rel="stylesheet" />

    <!-- 🔥 Tailwind hasil build (BUKAN CDN) -->
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css" />
</head>

<body class="bg-page font-sans text-navy antialiased">
    <div class="mx-auto flex min-h-screen max-w-page flex-col">