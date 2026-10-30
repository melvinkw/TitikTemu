// tailwind.config.js
module.exports = {
  content: [
    "./*.php",
    "./includes/**/*.php",
    "./proses/**/*.php",
    "./mahasiswa/**/*.php",
    "./petugas/**/*.php",
    "./admin/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#f4f5fa',
        navy: '#02103d',
        accent: '#ffc938',
        body: '#1f2937',
        muted: '#6b7280',
        footer: '#ff9f00',
        // Warna background halaman di Figma (UI Kit: "Primary 60% — background")
        page: '#dce3fd',
        // Garis & placeholder input form (Figma: border field #abadbc)
        line: '#abadbc',
        // Tag status laporan (komponen Figma "Tags")
        status: {
          ditolak: '#ec745c',
          'ditolak-bg': '#fdefee',
          selesai: '#33bf5e',
          'selesai-bg': '#e1fae7',
          pending: '#e48f31',
          'pending-bg': '#fff4ee',
          diproses: '#008bfb',
          'diproses-bg': '#e5f3fe',
          expired: '#757575',
          'expired-bg': '#f1f1f1',
        },
        // Tag kategori barang (komponen Figma "tags kategori")
        kategori: {
          elektronik: '#8a38f5',
          'elektronik-bg': '#ddccf3',
          aksesoris: '#df38f5',
          'aksesoris-bg': '#e6cfe9',
          identitas: '#e48f31',
          'identitas-bg': '#ffebdf',
        },
      },
      fontFamily: {
        heading: ['"League Spartan"', 'sans-serif'],
        sans: ['Inter', 'sans-serif'],
      },
      maxWidth: { page: '1440px' },
      // desk: lebar frame Figma (1440px). Di bawah ini ukuran panel Petugas/Admin dibuat lebih ringkas.
      screens: { desk: '1440px' },
      boxShadow: {
        // "Button Shadow" di Figma
        button: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
        // Bayangan kartu tabel di Figma
        card: '0 0 2px rgba(0, 0, 0, 0.25)',
      },
    },
  },
  plugins: [],
};