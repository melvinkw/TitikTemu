<?php
/**
 * includes/functions.php
 * Kumpulan fungsi bantu untuk seluruh aplikasi.
 */

// Mulai session kalau belum
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Baca file .env dan daftarkan ke $_ENV.
 */
function loadEnv(string $path): void
{
    if (!file_exists($path)) return;

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) continue;
        if (!str_contains($line, '=')) continue;

        [$key, $value] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value, " \t\n\r\0\x0B\"'");
    }
}

/**
 * Deteksi BASE_URL otomatis dari folder project.
 * Hasil contoh: "/TitikTemu"
 */
function baseUrl($path = '') {
    $appUrl = $_ENV['APP_URL'] ?? getenv('APP_URL') ?? '';

    if (empty($appUrl)) {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost:8080';
        $appUrl = $protocol . $host;
    }

    $appUrl = rtrim($appUrl, '/');
    $path = ltrim($path, '/');

    return $path ? "$appUrl/$path" : $appUrl;
}

/**
 * Cek apakah user sudah login.
 */
function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}

/**
 * Ambil role user yang sedang login.
 */
function currentRole(): ?string
{
    return $_SESSION['role'] ?? null;
}

/**
 * Cek role user.
 */
function hasRole(string $role): bool
{
    return currentRole() === $role;
}

/**
 * Redirect paksa ke halaman lain.
 */
function redirect(string $url): void
{
    header("Location: $url");
    exit;
}

/**
 * Proteksi halaman: wajib login, opsional wajib role tertentu.
 * Contoh:
 *   requireLogin();                       // login saja
 *   requireLogin(['mahasiswa']);          // harus mahasiswa
 *   requireLogin(['petugas', 'admin']);   // petugas atau admin
 */
function requireLogin(array $allowedRoles = []): void
{
    if (!isLoggedIn()) {
        redirect(baseUrl() . '/index.php');
    }
    if (!empty($allowedRoles) && !in_array(currentRole(), $allowedRoles)) {
        redirectByRole();
    }
}

/**
 * Arahkan user ke dashboard sesuai role.
 */
function redirectByRole(): void
{
    $base = baseUrl();
    switch (currentRole()) {
        case 'mahasiswa': redirect($base . '/mahasiswa/dashboard.php');
        case 'petugas':   redirect($base . '/petugas/dashboard.php');
        case 'admin':     redirect($base . '/admin/dashboard.php');
        default:          redirect($base . '/index.php');
    }
}

/**
 * Bersihkan output agar aman dari XSS.
 */
function e(?string $str): string
{
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

// Helper komponen UI: component('nama', [...])
require_once __DIR__ . '/component.php';