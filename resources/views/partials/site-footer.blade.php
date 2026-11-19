<footer class="site-footer">
    <div class="site-footer__inner">
        <div class="site-footer__content">
            <div class="site-footer__brand">
                <a href="{{ route('home') }}" class="site-footer__logo">
                    <span class="site-footer__logo-icon">
                        <img
                            src="{{ asset('images/logoTBMfinal.png') }}"
                            alt="Logo TBM Bintang Raharja"
                        >
                    </span>

                    <span class="site-footer__brand-copy">
                        <strong>TBM Bintang Raharja</strong>
                        <span>Membaca • Belajar • Berkarya • Bersama</span>
                    </span>
                </a>

                <p>
                    Ruang belajar masyarakat yang hadir untuk menumbuhkan budaya literasi,
                    kreativitas, dan kebersamaan.
                </p>
            </div>

            <nav class="site-footer__column" aria-label="Navigasi footer">
                <h2>Navigasi</h2>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('about') }}">Tentang</a>
                <a href="{{ route('activities.index') }}">Kegiatan</a>
                <a href="{{ route('news.index') }}">Berita</a>
            </nav>

            <nav class="site-footer__column" aria-label="Jelajahi">
                <h2>Jelajahi</h2>
                <a href="{{ route('gallery.index') }}">Galeri</a>
                <a href="{{ route('contact.index') }}">Kontak</a>
            </nav>
        </div>

        <div class="site-footer__bottom">
            <p>© {{ date('Y') }} TBM Bintang Raharja. All rights reserved.</p>
            <span>Dibangun dengan semangat literasi dan kolaborasi.</span>
        </div>
    </div>
</footer>
