// tailwind.config.js
module.exports = {
  content: [
    "./*.php",
    "./includes/**/*.php",
    "./components/**/*.php",
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
        page: '#dce3fd', // warna background halaman (desain revisi)
      },
      fontFamily: {
        heading: ['"League Spartan"', 'sans-serif'],
        sans: ['Inter', 'sans-serif'],
      },
      maxWidth: { page: '1440px' },
    },
  },
  plugins: [],
};