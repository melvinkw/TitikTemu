        <!-- ============ FOOTER ============ -->
        <!-- Setiap halaman membuka & menutup <main> sendiri sebelum memanggil footer ini -->
        <footer class="mt-auto flex h-16 items-center justify-center bg-navy px-4 text-center text-sm leading-[normal] text-primary">
            <p>
                <span class="text-footer">©</span> 2026
                <span class="text-footer">TitikTemu</span>. POLITEKNIK NEGERI MALANG.
            </p>
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