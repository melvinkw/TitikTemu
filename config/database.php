<?php

require_once __DIR__ . '/../includes/functions.php';
loadEnv(__DIR__ . '/../.env');

try {
    $dsn = "pgsql:host=" . ($_ENV['DB_HOST'] ?? '127.0.0.1')
         . ";port="     . ($_ENV['DB_PORT'] ?? '5432')
         . ";dbname="   . ($_ENV['DB_DATABASE'] ?? 'titiktemu');

    $pdo = new PDO($dsn, $_ENV['DB_USERNAME'] ?? '', $_ENV['DB_PASSWORD'] ?? '', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    if (($_ENV['APP_DEBUG'] ?? 'false') === 'true') {
        die("❌ Koneksi database gagal: " . $e->getMessage());
    }
    die("❌ Terjadi kesalahan pada database." . $e->getMessage());
}