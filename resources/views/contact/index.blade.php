<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Kontak - TBM Bintang Raharja
    </title>

    <meta
        name="description"
        content="Hubungi TBM Bintang Raharja untuk informasi kegiatan, program, dan kolaborasi."
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/contact.css') }}"
    >

</head>


<body>


{{-- =====================================================
     NAVBAR
===================================================== --}}

<header class="navbar">

    <div class="container navbar-content">

        <a
            href="{{ route('home') }}"
            class="logo"
        >

            <div class="logo-icon">
                <img
                        src="{{ asset('images\logoTBMfinal.png') }}"
                    >
            </div>

            <div>

                <strong>
                    TBM Bintang Raharja
                </strong>

                <span>
                    Membaca • Belajar • Berkarya • Bersama
                </span>

            </div>

        </a>


        <nav class="nav-menu">

    <a href="{{ route('home') }}">
        Beranda
    </a>

    <a href="{{ route('about') }}">
        Tentang
    </a>

    <a href="{{ route('activities.index') }}">
        Kegiatan
    </a>

    <a href="{{ route('news.index') }}">
        Berita
    </a>

    <a href="{{ route('gallery.index') }}">
        Galeri
    </a>

    <a href="{{ route('contact.index') }}">
        Kontak
    </a>

</nav>


        <a
            href="{{ route('login') }}"
            class="login-button"
        >
            Masuk
        </a>

    </div>

</header>



{{-- =====================================================
     HERO
===================================================== --}}

<section class="hero">

    <div class="container">

        <div class="hero-content">

            <div class="hero-text">

                <span class="hero-label">
                    HUBUNGI KAMI
                </span>

                <h1>
                    Mari Terhubung
                    <span>
                        Bersama TBM
                    </span>
                </h1>

                <p>
                    Punya pertanyaan mengenai kegiatan,
                    program, atau ingin mengenal lebih jauh
                    tentang TBM Bintang Raharja?
                    Silakan hubungi kami.
                </p>

            </div>


            <div class="hero-placeholder">

                <div class="contact-icon">
                    💬
                </div>

                <h3>
                    Hubungi TBM
                </h3>

                <p>
                    Kami terbuka untuk komunikasi
                    dan informasi.
                </p>

            </div>

        </div>

    </div>

</section>
{{-- =====================================================
     CONTACT PERSON
===================================================== --}}

<section class="contact-person-section">

    <div class="container">

        <div class="contact-person-header">

            <span class="section-label">
                KONTAK PERSON
            </span>

            <h2>
                Terhubung Langsung
                <span>Dengan Kami</span>
            </h2>

            <p>
                Silakan hubungi kontak person berikut untuk mendapatkan
                informasi mengenai kegiatan, program, kunjungan,
                maupun kolaborasi dengan TBM Bintang Raharja.
            </p>

        </div>


        <div class="contact-person-grid">

            {{-- =================================================
                 IBU MURNI
            ================================================== --}}

            <div class="contact-person-card">

    <div class="person-avatar">
        <img
            src="{{ asset('images/bu murni.jpeg') }}"
            alt="Galih Dwi Chandra"
        >
    </div>

                <div class="person-info">

                    <span class="person-role">
                        Ketua TBM
                    </span>

                    <h3>
                        Ibu Murni Setianingsih, S.Pd.
                    </h3>

                    <p>
                        Ketua TBM Bintang Raharja
                    </p>


                    <div class="person-contact-list">

                        <a
                            href="#"
                            target="_blank"
                            class="person-contact whatsapp"
                        >
                            <span>💬</span>
                            <div>
                                <strong>WhatsApp</strong>
                                <small>+62 813-1908-3960</small>
                            </div>
                        </a>


                        <a
                            href="mailto:#"
                            class="person-contact email"
                        >
                            <span>✉️</span>
                            <div>
                                <strong>Email</strong>
                                <small>Kirim pesan melalui email</small>
                            </div>
                        </a>

                    </div>

                </div>

            </div>


          {{-- =================================================
     GALIH
================================================== --}}

<div class="contact-person-card">

    <div class="person-avatar">
        <img
            src="{{ asset('images/galih.jpeg') }}"
            alt="Galih Dwi Chandra"
        >
    </div>

    <div class="person-info">

        <span class="person-role">
            Kontak Person
        </span>

        <h3>
            Galih Dwi Chandra
        </h3>

        <p>
            Pengembang Website TBM Bintang Raharja
        </p>

        <div class="person-contact-list">

            <a
                href="#"
                target="_blank"
                class="person-contact whatsapp"
            >
                            <span>💬</span>
                            <div>
                                <strong>WhatsApp</strong>
                                <small>+62 898-0525-220</small>
                            </div>
                        </a>


                        <a
                            href="mailto:#"
                            class="person-contact email"
                        >
                            <span>✉️</span>
                            <div>
                                <strong>Email</strong>
                                <small>galih.dch@gmail.com</small>
                            </div>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     CONTACT INFORMATION
===================================================== --}}

<section class="section">

    <div class="container">

        <div class="section-header">

            <div>

                <span class="section-label">
                    INFORMASI KONTAK
                </span>

                <h2>
                    Temukan Kami
                </h2>

                <p>
                    Informasi yang dapat membantu
                    Anda terhubung dengan TBM Bintang Raharja.
                </p>

            </div>

        </div>


        <div class="contact-grid">


            {{-- LOKASI --}}

            <div class="contact-card">

                <div class="contact-card-icon">
                    📍
                </div>

                <div>

                    <h3>
                        Lokasi
                    </h3>

                    <p>
                        Desa Karangharja,
                        Cikarang Utara,
                        Kabupaten Bekasi.
                    </p>

                </div>

            </div>


            {{-- KEGIATAN --}}

            <div class="contact-card">

                <div class="contact-card-icon">
                    📚
                </div>

                <div>

                    <h3>
                        Kegiatan
                    </h3>

                    <p>
                        Informasi mengenai jadwal
                        dan kegiatan dapat dilihat
                        melalui halaman Kegiatan.
                    </p>

                    <a
                        href="{{ route('activities.index') }}"
                    >
                        Lihat Kegiatan →
                    </a>

                </div>

            </div>


            {{-- INFORMASI --}}

            <div class="contact-card">

                <div class="contact-card-icon">
                    ℹ️
                </div>

                <div>

                    <h3>
                        Informasi
                    </h3>

                    <p>
                        Hubungi pengelola TBM untuk
                        mendapatkan informasi lebih lanjut
                        mengenai program dan kegiatan.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =====================================================
     CONTACT FORM
===================================================== --}}

<section class="contact-section">

    <div class="container">

        <div class="contact-layout">


            {{-- INFORMASI --}}

            <div class="contact-info">

                <span class="section-label">
                    PESAN UNTUK KAMI
                </span>

                <h2>
                    Ada yang ingin
                    ditanyakan?
                </h2>

                <p>
                    Sampaikan pertanyaan atau pesan Anda
                    melalui formulir di samping.
                </p>


                <div class="info-list">


                    <div class="info-item">

                        <div class="info-icon">
                            📍
                        </div>

                        <div>

                            <strong>
                                Alamat
                            </strong>

                            <span>
                                Desa Karangharja,
                                Cikarang Utara,
                                Kabupaten Bekasi.
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-icon">
                            📅
                        </div>

                        <div>

                            <strong>
                                Kegiatan
                            </strong>

                            <span>
                                Informasi jadwal kegiatan
                                tersedia di halaman Kegiatan.
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-icon">
                            🤝
                        </div>

                        <div>

                            <strong>
                                Terbuka untuk Kolaborasi
                            </strong>

                            <span>
                                TBM terbuka untuk komunikasi
                                dan kerja sama yang mendukung
                                kegiatan literasi.
                            </span>

                        </div>

                    </div>


                </div>

            </div>



            {{-- FORM --}}

            <div class="contact-form-card">

                <h3>
                    Kirim Pesan
                </h3>

                <p class="form-description">
                    Isi formulir berikut untuk menyampaikan
                    pesan kepada TBM Bintang Raharja.
                </p>


                <form
                    action="#"
                    method="POST"
                    onsubmit="return showMessage(event)"
                >

                    @csrf


                    <div class="form-group">

                        <label for="name">
                            Nama
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan nama Anda"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email Anda"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="subject">
                            Subjek
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            placeholder="Masukkan subjek pesan"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="message">
                            Pesan
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            placeholder="Tuliskan pesan Anda..."
                            required
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="button primary"
                    >
                        Kirim Pesan
                    </button>


                    <div
                        id="form-message"
                        class="form-message"
                    >
                    </div>

                </form>

            </div>


        </div>

    </div>

</section>



{{-- =====================================================
     CTA
===================================================== --}}

<section class="cta-section">

    <div class="container">

        <div class="cta-content">

            <span>
                TBM BINTANG RAHARJA
            </span>

            <h2>
                Mari belajar dan berkembang bersama.
            </h2>

            <p>
                Ikuti kegiatan dan program
                TBM Bintang Raharja.
            </p>

            <a
                href="{{ route('activities.index') }}"
                class="button white"
            >
                Lihat Kegiatan
            </a>

        </div>

    </div>

</section>



{{-- =====================================================
     FOOTER
===================================================== --}}

<footer class="footer">

    <div class="container">

        <div class="footer-content">

            <div>

                <h3>
                    TBM Bintang Raharja
                </h3>

                <p>
                    Membaca • Belajar • Berkarya • Bersama
                </p>

            </div>


            <div>

                <p>
                    Desa Karangharja,
                    Cikarang Utara,
                    Kabupaten Bekasi.
                </p>

            </div>

        </div>

    </div>

</footer>



<script>

function showMessage(event)
{
    event.preventDefault();


    const message =
        document.getElementById('form-message');


    message.textContent =
        'Pesan berhasil disiapkan. Fitur pengiriman pesan akan dihubungkan ke sistem pada tahap berikutnya.';


    message.classList.add('show');


    return false;
}

</script>


</body>

</html>