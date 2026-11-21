<header class="site-navbar">
    <div class="site-navbar__inner">
        <a href="{{ route('home') }}" class="site-navbar__brand">
            <span class="site-navbar__logo">
                <img
                    src="{{ asset('images/logoTBMfinal.png') }}"
                    alt="Logo TBM Bintang Raharja"
                >
            </span>

            <span class="site-navbar__brand-copy">
                <strong>TBM Bintang Raharja</strong>
                <span>Membaca • Belajar • Berkarya • Bersama</span>
            </span>
        </a>

        <nav id="site-navigation" class="site-navbar__links" aria-label="Navigasi utama">
            <a
                href="{{ route('home') }}"
                class="site-navbar__link {{ request()->routeIs('home') ? 'is-active' : '' }}"
                @if (request()->routeIs('home')) aria-current="page" @endif
            >
                Beranda
            </a>
            <a
                href="{{ route('about') }}"
                class="site-navbar__link {{ request()->routeIs('about') ? 'is-active' : '' }}"
                @if (request()->routeIs('about')) aria-current="page" @endif
            >
                Tentang
            </a>
            <a
                href="{{ route('activities.index') }}"
                class="site-navbar__link {{ request()->routeIs('activities.*') ? 'is-active' : '' }}"
                @if (request()->routeIs('activities.*')) aria-current="page" @endif
            >
                Kegiatan
            </a>
            <a
                href="{{ route('news.index') }}"
                class="site-navbar__link {{ request()->routeIs('news.*') ? 'is-active' : '' }}"
                @if (request()->routeIs('news.*')) aria-current="page" @endif
            >
                Berita
            </a>
            <a
                href="{{ route('gallery.index') }}"
                class="site-navbar__link {{ request()->routeIs('gallery.*') ? 'is-active' : '' }}"
                @if (request()->routeIs('gallery.*')) aria-current="page" @endif
            >
                Galeri
            </a>
            <a
                href="{{ route('contact.index') }}"
                class="site-navbar__link {{ request()->routeIs('contact.*') ? 'is-active' : '' }}"
                @if (request()->routeIs('contact.*')) aria-current="page" @endif
            >
                Kontak
            </a>
        </nav>

        <button
            class="site-navbar__toggle"
            type="button"
            aria-controls="site-navigation"
            aria-expanded="false"
            data-responsive-nav-toggle
        >
            Menu
        </button>
    </div>
</header>
<script src="{{ asset('js/responsive-navigation.js') }}" defer></script>
