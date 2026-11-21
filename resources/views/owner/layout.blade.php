<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f3f8fc">
    <title>@yield('title', 'Dashboard Pengelola') - TBM Bintang Raharja</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <script src="{{ asset('js/owner-repeaters.js') }}" defer></script>
</head>

<body class="owner-body">
    <header class="owner-header">
        <a class="owner-brand" href="{{ route('owner.dashboard') }}">
            <img src="{{ asset('images/logoTBMfinal.png') }}" alt="">
            <span>
                <strong>TBM Bintang Raharja</strong>
                <small>Area Pengelola</small>
            </span>
        </a>

        <button
            class="owner-nav-toggle"
            type="button"
            aria-controls="owner-navigation"
            aria-expanded="false"
            data-responsive-nav-toggle
        >
            Menu
        </button>

        <nav id="owner-navigation" class="owner-nav" aria-label="Navigasi pengelolaan">
            <a
                href="{{ route('owner.dashboard') }}"
                class="{{ request()->routeIs('owner.dashboard') ? 'is-active' : '' }}"
            >Dashboard</a>
            <a
                href="{{ route('owner.activities.index') }}"
                class="{{ request()->routeIs('owner.activities.*') ? 'is-active' : '' }}"
            >Kegiatan</a>
            <a
                href="{{ route('owner.news.index') }}"
                class="{{ request()->routeIs('owner.news.*') ? 'is-active' : '' }}"
            >Berita</a>
            <a
                href="{{ route('owner.gallery.index') }}"
                class="{{ request()->routeIs('owner.gallery.*') ? 'is-active' : '' }}"
            >Galeri</a>
            <a
                href="{{ route('owner.home.edit') }}"
                class="{{ request()->routeIs('owner.home.*') ? 'is-active' : '' }}"
            >Beranda</a>
            <a
                href="{{ route('owner.contact.edit') }}"
                class="{{ request()->routeIs('owner.contact.*') ? 'is-active' : '' }}"
            >Kontak</a>
            <a
                href="{{ route('owner.about.edit') }}"
                class="{{ request()->routeIs('owner.about.*') ? 'is-active' : '' }}"
            >Tentang</a>
            @if (auth()->user()->isPemilik())
                <a
                    href="{{ route('owner.pengurus.index') }}"
                    class="{{ request()->routeIs('owner.pengurus.*') ? 'is-active' : '' }}"
                >Pengurus</a>
            @endif
        </nav>

        <div class="owner-header__actions">
            <span class="owner-account">{{ auth()->user()->name }}</span>
            <a class="owner-public-link" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                Lihat situs
            </a>
            <form action="{{ route('owner.logout') }}" method="POST">
                @csrf
                <button class="owner-logout" type="submit">Keluar</button>
            </form>
        </div>
    </header>

    <main class="owner-main">
        @if (session('success'))
            <div class="owner-alert owner-alert--success" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="owner-alert owner-alert--error" role="alert">
                <strong>Periksa kembali data yang dimasukkan.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="owner-footer">
        Area pengelolaan TBM Bintang Raharja
    </footer>
    <script src="{{ asset('js/responsive-navigation.js') }}" defer></script>
</body>

</html>
