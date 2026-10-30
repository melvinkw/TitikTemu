        <!-- ============ FOOTER ============ -->
        <footer class="mt-auto flex flex-col items-center justify-between gap-2 border-t border-indigo-200 px-4 py-6 text-xs text-gray-500 md:flex-row">
            <p>
                <span class="font-bold text-gray-700">TitikTemu.</span>
                Politeknik Negeri Malang
            </p>
            <p>Platform informasi barang hilang dan barang temuan.</p>
            <p>&copy; 2026 TitikTemu</p>
        </footer>
    </div> <!-- Penutup div.container dari header.php -->

    <!-- Script toggle menu mobile -->
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                const isOpen = mobileMenu.classList.toggle('hidden') === false;
                mobileMenu.classList.toggle('flex', isOpen);
                menuBtn.setAttribute('aria-expanded', String(isOpen));
            });
        }
    </script>
</body>
</html>