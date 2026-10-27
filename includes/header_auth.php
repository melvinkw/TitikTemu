<?php
/**
 * includes/header_auth.php
 * Layout khusus halaman login/register (tanpa navbar).
 */
if (!function_exists('baseUrl')) {
    require_once __DIR__ . '/functions.php';
}
$base = baseUrl();
$pageTitle = $pageTitle ?? 'Login';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= e($pageTitle) ?> — TitikTemu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=League+Spartan:wght@600;700;800&display=swap" rel="stylesheet" />

    <!-- 🔥 Tailwind hasil build -->
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css" />
</head>
<body class="bg-primary font-sans text-navy antialiased">
<!-- <body> ditutup di includes/footer_auth.php -->