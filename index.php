<?php
/**
 * index.php
 * Halaman login utama (Figma: "Login"). Semua role (mahasiswa, petugas, admin) login dari sini.
 */
require_once __DIR__ . '/includes/functions.php';

// Kalau sudah login, langsung lempar ke dashboard sesuai role
if (isLoggedIn()) {
    redirectByRole();
}

$pageTitle = 'Login';
$base = baseUrl();
require_once __DIR__ . '/includes/header_auth.php';
?>

<main class="flex min-h-screen flex-wrap items-center gap-16 p-4 sm:px-8 md:flex-nowrap">

    <!-- Panel kiri. Di Figma berupa gambar gradasi; gambarnya belum bisa diunduh, jadi didekati dengan CSS -->
    <section class="relative hidden h-[758px] max-h-[calc(100vh-62px)] max-w-[672px] flex-1 overflow-hidden rounded-lg bg-[#0b1847] md:block" aria-hidden="true">
        <div class="absolute -top-24 left-[22%] h-96 w-80 rounded-full bg-amber-400/90 blur-3xl"></div>
        <div class="absolute -right-16 -top-16 h-80 w-72 rounded-full bg-rose-500/80 blur-3xl"></div>
        <div class="absolute left-[-6rem] top-[32%] h-80 w-[30rem] -rotate-12 rounded-full bg-slate-200/90 blur-3xl"></div>
        <div class="absolute bottom-[-8rem] right-[5%] h-96 w-96 rounded-full bg-[#0b1847] blur-3xl"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-transparent via-transparent to-[#0b1847]/60"></div>
    </section>

    <!-- Form login -->
    <section class="flex w-full flex-1 justify-center py-10 md:max-w-[624px]">
        <div class="flex w-full max-w-[439px] flex-col items-center gap-[65px]">

            <header class="flex w-full max-w-[422px] flex-col items-center gap-4 text-center leading-[normal]">
                <h1 class="font-heading text-5xl font-semibold text-navy">TitikTemu.</h1>
                <p class="text-base text-[#9e9caa]">Platform Lost &amp; Found Polinema</p>
            </header>

            <form action="<?= $base ?>/proses/login.php" method="POST" class="flex w-full flex-col gap-8">

                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-700">
                        <?= e($_SESSION['error']) ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-700">
                        <?= e($_SESSION['success']) ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <?php component('field', ['label' => 'Username', 'name' => 'username', 'id' => 'username',
                                          'placeholder' => 'NIM', 'attrs' => 'autocomplete="username" required']); ?>
                <?php component('field', ['label' => 'Password', 'name' => 'password', 'id' => 'password', 'type' => 'password',
                                          'placeholder' => '*************', 'attrs' => 'autocomplete="current-password" required']); ?>

                <a href="#" class="w-full text-right font-heading text-base font-semibold leading-[1.5] text-[#727085]">Forgot Password?</a>

                <button type="submit"
                        class="flex w-full items-center justify-center rounded-lg bg-navy px-6 py-[14px] font-heading text-base font-semibold leading-[1.5] text-white shadow-button">
                    Sign in
                </button>
            </form>

        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer_auth.php'; ?>
