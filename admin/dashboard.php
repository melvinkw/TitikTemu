<?php
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['admin']);

$pageTitle = 'Dashboard Admin';
require_once __DIR__ . '/../includes/header.php';
?>
<div class="p-8">
    <h1 class="font-heading text-3xl font-bold">Halo, <?= e($_SESSION['nama']) ?>!</h1>
    <p class="mt-2 text-muted">Ini dashboard untuk role <b>Admin Master</b>.</p>
    <a href="<?= baseUrl() ?>/proses/logout.php" class="mt-4 inline-block text-red-600 underline">Logout</a>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>