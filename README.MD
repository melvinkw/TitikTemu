# TitikTemu

> Platform Lost & Found untuk komunitas Politeknik Negeri Malang.

TitikTemu dirancang untuk membantu mahasiswa melaporkan kehilangan/penemuan barang, memantau laporan, dan melakukan verifikasi melalui petugas.

> [!IMPORTANT]
> **Status branch `main` saat ini:** kode masih berupa prototipe FE awal. Login di `proses/login.php` masih memakai akun hard-coded, beberapa halaman menggunakan data contoh, dan skema database/migration belum ada di branch ini. `test-db.php` hanya memeriksa koneksi PostgreSQL. Jangan menganggap backend final sudah terintegrasi hanya karena koneksi database berhasil.
>
> Paket backend prosedural dan FE revisi telah disiapkan terpisah. Sebelum dijadikan versi utama, integrasikan dan uji paket tersebut ke repository ini. Setelah integrasi, perbarui setup sesuai file yang benar-benar ada.

## Tech stack

- **Backend:** PHP native/prosedural, PDO PostgreSQL
- **Frontend saat ini:** HTML dan Tailwind CSS CLI
- **Database:** PostgreSQL
- **Development:** Laragon/Apache, VS Code, Git/GitHub
- **Build CSS:** Node.js/npm + Tailwind CLI

## Struktur folder saat ini

\`\`\`text
TitikTemu/
├── admin/             # Halaman admin (prototipe)
├── assets/
│   ├── css/           # input.css (source) dan style.css
│   └── img/           # Gambar serta ikon
├── config/
│   └── database.php   # Koneksi PostgreSQL lewat PDO
├── includes/          # Helper sesi/role, header, footer, navbar
├── mahasiswa/         # Halaman mahasiswa (sebagian masih data contoh)
├── petugas/           # Halaman petugas (prototipe)
├── proses/            # Handler form, termasuk login
├── .env.example       # Template konfigurasi; tanpa password asli
├── index.php          # Halaman login
├── package.json       # Dependency Tailwind CLI
└── test-db.php        # Pemeriksaan koneksi PostgreSQL
\`\`\`

## Setup lokal untuk mulai mengerjakan FE

### 1. Prasyarat

Siapkan Laragon (Apache dan PHP 8.1+), Git, Node.js LTS, VS Code, dan akses PostgreSQL. PostgreSQL tidak harus terpasang di setiap laptop jika tim memakai database development bersama yang di-host.

Periksa PHP dari terminal VS Code:

\`\`\`powershell
php -v
php -m
\`\`\`

Pastikan extension `PDO` dan `pdo_pgsql` aktif untuk PHP yang digunakan Apache dan terminal.

### 2. Clone repository

\`\`\`bash
git clone https://github.com/melvinkw/TitikTemu.git
cd TitikTemu
\`\`\`

Letakkan folder di dalam folder `www` Laragon, misalnya `C:\laragon\www\TitikTemu`. Jangan membuat folder project bersarang dua kali.

### 3. Siapkan konfigurasi

Buat file `.env` dari template.

PowerShell:

\`\`\`powershell
Copy-Item .env.example .env
\`\`\`

Git Bash:

\`\`\`bash
cp .env.example .env
\`\`\`

Isi `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` berdasarkan akses yang diberikan Melvin. Jangan pernah commit `.env`.

**Status saat ini:** handler login masih memakai akun hard-coded dan belum mengambil akun dari database. Aplikasi tetap memuat koneksi database, jadi koneksi PostgreSQL harus valid. Skema final belum tersedia di branch ini.

### 4. Build Tailwind CSS

Dari root project:

\`\`\`bash
npm install
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/style.css --watch
\`\`\`

Biarkan terminal `--watch` tetap berjalan saat development. Edit source CSS di `assets/css/input.css`; jangan edit `assets/css/style.css` hasil build secara manual.

### 5. Jalankan aplikasi

Nyalakan Apache dari Laragon, lalu buka:

\`\`\`text
http://localhost/TitikTemu/index.php
\`\`\`

Pemeriksaan koneksi PostgreSQL:

\`\`\`text
http://localhost/TitikTemu/test-db.php
\`\`\`

Akun prototipe:

| Username | Password | Role |
|---|---|---|
| `mahasiswa1` | `mahasiswa1` | mahasiswa |
| `satpam1` | `satpam1` | petugas |
| `admin` | `admin` | admin |

Akun ini hard-coded dan hanya untuk demo lokal. Jangan gunakan untuk deployment.

## Git untuk pemula

- **Clone:** mengambil repository ke laptop pertama kali.
- **Branch:** jalur kerja terpisah untuk satu task. Branch memisahkan perubahan kode, bukan database yang berbeda.
- **Commit:** menyimpan sekumpulan perubahan dengan catatan.
- **Push:** mengirim commit ke GitHub.
- **Pull:** mengambil update dari GitHub.
- **Pull Request (PR):** permintaan agar branch direview dan digabung ke `main`.
- **Merge:** menggabungkan perubahan setelah diperiksa.

Jangan coding langsung di `main`. Setelah clone, buat branch untuk satu task kecil. Contoh:

\`\`\`bash
git switch main
git pull origin main
git switch -c feature/item-card-rafa

# Setelah perubahan selesai, cek apa yang berubah
git status
git add assets/css/input.css mahasiswa/barang-temuan.php
git commit -m "feat: improve item card"
git push -u origin feature/item-card-rafa
\`\`\`

Lalu buka GitHub dan buat PR ke `main`. Sertakan tujuan, cara uji, dan screenshot untuk perubahan visual. Faza mereview FE; Natha memeriksa kesesuaian desain; Melvin memeriksa backend, database, dan integrasi.

Sebelum task baru, ambil update `main` dan buat branch baru. Jika muncul merge conflict, jangan asal memilih “Accept Current” atau “Accept Incoming”. Bandingkan perubahan dan minta reviewer membantu.

### Aturan kolaborasi

1. Satu branch untuk satu task kecil, bukan satu branch raksasa untuk semua pekerjaan.
2. Jangan commit `.env`, `node_modules/`, `vendor/`, atau upload privat.
3. Jangan mengubah `name`, `method`, `action`, atau field form backend tanpa koordinasi dengan Melvin.
4. Setiap task punya tujuan, file yang boleh diubah, screenshot referensi, definisi selesai, dan langkah uji.
5. Jangan menjalankan skrip reset/migration pada database bersama tanpa persetujuan penanggung jawab database.

## Database bersama dan migration

Semua laptop bisa menggunakan **satu PostgreSQL development bersama** melalui konfigurasi lokal masing-masing di `.env`. Anggota tidak perlu membuat database sendiri, tetapi data uji yang diubah satu orang juga terlihat oleh anggota lain.

Branch `main` saat ini **belum memiliki folder migration maupun runner**. Jangan menjalankan perintah migration yang belum tersedia di branch ini. Saat backend final diintegrasikan, gunakan SQL migrations bernomor yang dijalankan lewat skrip PHP CLI sederhana (tanpa framework): migration yang sukses dicatat pada tabel `schema_migrations`; perubahan baru dibuat sebagai file baru dan tidak mengedit migration lama.

Melvin menjadi penanggung jawab migration pada database bersama. Anggota lain mengajukan migration lewat PR dan tidak menjalankan migration secara bersamaan. Gunakan data sintetis, pisahkan database development dari demo/production, pakai SSL untuk koneksi hosted jika provider mensyaratkan, dan jangan memakai kredensial superuser untuk aplikasi.

## Pembagian fokus dan rencana empat minggu

- **Melvin — PM/backend/database:** prioritas, kontrak backend, migration, review integrasi, backup, deployment.
- **Faza — koordinator FE:** komponen FE, slicing Figma, pembagian task, review PR FE.
- **Natha — koordinator UI/UX:** UI V2, design system, prototype, review visual.
- **Rafa — FE pemula:** task terbatas seperti item card, badge status, grid katalog, responsive fixes.
- **Agam — FE pemula:** task terbatas seperti form field, heading, tabel mobile, empty state.

| Minggu | Fokus | Hasil yang harus terlihat |
|---|---|---|
| 1 | Struktur Figma V2, design system, onboarding, latihan HTML/CSS/Git | Semua anggota bisa membuka project; komponen dasar dan kontrak form disepakati |
| 2 | Slicing halaman inti dan integrasi backend | Home, login/register, form laporan, dashboard mahasiswa |
| 3 | Dashboard petugas/admin, klaim, status, responsive | Jalur utama mahasiswa → petugas → klaim bisa diuji |
| 4 | Feature freeze, testing, bugfix, deployment/demo, dokumentasi | Versi stabil, bukti uji, backup, latihan presentasi |

Rafa dan Agam tidak perlu menunggu UI/UX selesai untuk belajar. Mulai dengan satu komponen kecil dari screenshot referensi; Faza meninjau hasilnya setiap hari. Panduan lengkap ada di [docs/TEAM_WORKFLOW.md](docs/TEAM_WORKFLOW.md).

## Troubleshooting

| Masalah | Yang diperiksa |
|---|---|
| `could not find driver` | Aktifkan extension `pdo_pgsql` pada PHP Laragon yang benar |
| `Connection refused` | Periksa host/port dan apakah PostgreSQL berjalan/endpoint dapat dijangkau |
| `password authentication failed` | Periksa kredensial `.env` secara privat |
| CSS tidak berubah | Pastikan `--watch` berjalan dan edit `input.css` |
| Konflik Git | Bandingkan kedua perubahan; jangan memilih versi secara asal |
| Login/form belum berfungsi penuh | Branch ini masih prototipe; backend final belum terintegrasi |

---

**Project:** TitikTemu — PBL Sistem Informasi Bisnis, Politeknik Negeri Malang.
