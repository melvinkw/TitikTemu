# Panduan Kerja Tim TitikTemu — 4 Minggu

Project menggunakan PHP native/prosedural dan PostgreSQL, tanpa framework PHP dan tanpa arsitektur MVC.

## Pembagian tanggung jawab

| Anggota | Tugas utama |
|---|---|
| Melvin — PM/backend/database | Prioritas dan risiko, kontrak backend, migration, review integrasi, backup, deployment. Hindari mengambil semua task FE. |
| Faza — koordinator FE | Slicing Figma, struktur markup/CSS, pembagian task FE, review Pull Request FE. |
| Natha — koordinator UI/UX | Mengelola UI V2, design system, prototype, dan review visual. |
| Rafa — FE pemula | Task kecil: item card, badge status, grid katalog, responsive fixes. |
| Agam — FE pemula | Task kecil: form field, page heading, tabel mobile, empty state. |

Rafa dan Agam tidak diberi task abstrak seperti “buat seluruh dashboard”. Setiap task harus mencantumkan tujuan, screenshot referensi, file yang boleh diubah, definisi selesai, dan cara menguji.

## Rencana 4 minggu

### Minggu 1 — Fondasi dan onboarding
- Natha: audit desain V1, susun UI V2, design system, dan urutan halaman prioritas.
- Faza: sepakati komponen yang benar-benar berulang, markup/CSS bersama, dan file yang disentuh per task.
- Rafa dan Agam: clone project, pahami struktur folder, pelajari HTML semantic, box model, Flexbox/Grid, responsive CSS, dan Git; masing-masing menyelesaikan satu komponen kecil.
- Melvin: dokumentasikan kontrak backend/form, siapkan migration, data uji, serta alur clone dan konfigurasi.

**Selesai jika:** semua anggota bisa membuka project, komponen dasar disepakati, UI V2 prioritas terkunci, dan setiap form memiliki kontrak backend yang jelas.

### Minggu 2 — Slicing halaman inti
- Faza: layout bersama, navbar, tombol, field, card, dan status.
- Rafa: item card dan katalog barang.
- Agam: field form dan form laporan.
- Natha: menyelesaikan desain halaman inti dan meninjau hasil slicing.
- Melvin: mengintegrasikan form/listing ke query backend dan memperbaiki isu integrasi.

**Selesai jika:** beranda/katalog, login/register, form laporan, dan dashboard mahasiswa mempunyai tampilan V2 serta jalur data utamanya terhubung.

### Minggu 3 — Role dan alur bisnis
- Faza: dashboard petugas/admin dan tabel.
- Rafa: badge status, empty state, detail barang, responsive fixes.
- Agam: klaim, feedback sukses/gagal, validasi visual, responsive checks.
- Natha: audit konsistensi seluruh halaman dengan desain.
- Melvin: uji verifikasi, klaim, matching, email, dan akses data privat.

**Selesai jika:** alur mahasiswa → verifikasi petugas → klaim/serah-terima dapat diuji dari awal sampai akhir.

### Minggu 4 — Stabilitas dan penyerahan
- Awal minggu: feature freeze; hanya terima fitur baru jika wajib untuk kriteria penilaian.
- Pertengahan minggu: regression test semua role, mobile/desktop, koneksi DB, upload, laporan privat, dan validasi.
- Akhir minggu: deployment/demo, backup DB, dokumentasi, screenshot bukti uji, pembagian narasi dan latihan presentasi.

**Selesai jika:** satu versi stabil dapat dijalankan berdasarkan README, tidak hanya pada laptop satu anggota, dan semua anggota bisa menjelaskan kode yang dikerjakannya.

## Rutinitas harian

1. **10 menit stand-up:** hasil kemarin, rencana hari ini, blocker.
2. **30–45 menit belajar terarah:** Faza/Natha memberi satu contoh sederhana; anggota pemula membuat variasi sendiri dan menjelaskan cara kerjanya.
3. **Sesi implementasi:** satu task kecil per orang. Target idealnya selesai/review di hari yang sama atau maksimal satu hari.
4. **Akhir hari:** commit/push branch, update PR, screenshot sebelum/sesudah bila perlu, dan catatan yang dipelajari.
5. **Review:** pemilik task menunjukkan hasilnya di browser sebelum PR di-merge.

## Jalur belajar Rafa dan Agam

1. Hari 1: clone, buka VS Code, jalankan, pahami folder \`public/\`, \`app/\`, \`assets/\`, dan \`database/\`.
2. Hari 2: semantic HTML, class CSS, box model, Flexbox/Grid, warna, spacing.
3. Hari 3: edit satu komponen, reload browser, dan jelaskan perubahan.
4. Hari 4: responsive breakpoint, gambar, overflow, dan aksesibilitas dasar.
5. Hari 5: branch, status, add, commit, push, PR, review.
6. Hari berikutnya: implementasikan satu bagian UI nyata sesuai Figma dan tulis langkah pengujiannya.

Contoh task yang baik: “Pada lebar 390 px, kartu barang tidak menyebabkan horizontal overflow, gambar tetap 1:1, dan nama panjang tetap terbaca.” Task seperti “perbaiki UI” terlalu luas.

## Kontrak FE dan backend

- FE boleh mengubah HTML/CSS, tetapi jangan mengganti \`name\`, \`method\`, \`action\`, CSRF token, atau ID yang dipakai JavaScript tanpa koordinasi dengan Melvin.
- Jangan membuat koneksi database berulang pada setiap halaman; gunakan bootstrap koneksi yang tersedia di project.
- Jangan menyimpan password/connection string di PHP, CSS, Figma, atau repository. Rahasia hanya berada di \`.env\`.
- Jangan mengedit migration yang sudah diterapkan. Buat migration baru dengan nomor berikutnya.
- Jangan menggunakan database produksi untuk percobaan.

## Branch dan Pull Request

- \`main\`: versi stabil; jangan coding langsung di sini.
- \`feature/nama-task\`: task/f fitur baru.
- \`fix/nama-masalah\`: perbaikan bug.
- \`docs/nama-dokumen\`: dokumentasi.

Clone hanya sekali. Untuk task baru, update \`main\`, lalu buat branch sendiri:

\`\`\`bash
git switch main
git pull origin main
git switch -c feature/nama-task
# edit, lalu uji perubahan
git status
git add path/file-yang-diubah
git commit -m "feat: jelaskan perubahan"
git push -u origin feature/nama-task
\`\`\`

Buat PR dari branch task ke \`main\`; tulis perubahan, cara uji, dan screenshot. Faza mereview FE; Natha melihat kesesuaian desain; Melvin mereview backend/database. Migration hanya dijalankan oleh Melvin atau penanggung jawab DB yang ditunjuk.

Jika terjadi merge conflict, jangan asal pilih “Current” atau “Incoming”. Bandingkan dua perubahan dan minta pemilik kode terkait untuk review.
