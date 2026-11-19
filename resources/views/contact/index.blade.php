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
    <link rel="stylesheet" href="{{ asset('css/site-navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/site-footer.css') }}">

</head>


<body>


{{-- =====================================================
     NAVBAR
===================================================== --}}

@include('partials.site-navbar')



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
                        Bersama TBM Bintang Raharja
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

    <button
        type="button"
        class="person-avatar"
        data-profile-image="{{ asset('images/bu murni.jpeg') }}"
        data-profile-name="Ibu Murni Setianingsih, S.Pd."
        aria-label="Lihat foto profil Ibu Murni Setianingsih"
    >
        <img
            src="{{ asset('images/bu murni.jpeg') }}"
    alt=""
    loading="lazy"
        >
        <span class="person-avatar-hint" aria-hidden="true">+</span>
    </button>

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
                            href="https://wa.me/6281319083960"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="person-contact whatsapp"
                        >
                            <span>💬</span>
                            <div>
                                <strong>WhatsApp</strong>
                                <small>+62 813-1908-3960</small>
                            </div>
                        </a>
                    </div>

                </div>

            </div>


          {{-- =================================================
     GALIH
================================================== --}}

<div class="contact-person-card">

    <button
        type="button"
        class="person-avatar"
        data-profile-image="{{ asset('images/galih.jpeg') }}"
        data-profile-name="Galih Dwi Chandra"
        aria-label="Lihat foto profil Galih Dwi Chandra"
    >
        <img
            src="{{ asset('images/galih.jpeg') }}"
            alt=""
            loading="lazy"
        >
        <span class="person-avatar-hint" aria-hidden="true">+</span>
    </button>

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
                href="https://wa.me/628980525220"
                target="_blank"
                rel="noopener noreferrer"
                class="person-contact whatsapp"
            >
                            <span>💬</span>
                            <div>
                                <strong>WhatsApp</strong>
                                <small>+62 898-0525-220</small>
                            </div>
                        </a>


            <a
                href="mailto:galih.dch@gmail.com"
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

            {{-- MERLYN SUMARDIYANI --}}

            <div class="contact-person-card">

                <button
                    type="button"
                    class="person-avatar"
                    data-profile-image="{{ asset('images/merlin.jpeg') }}"
                    data-profile-name="Merlyn Sumardiyani"
                    aria-label="Lihat foto profil Merlyn Sumardiyani"
                >
                    <img
                        src="{{ asset('images/merlin.jpeg') }}"
                        alt=""
                        loading="lazy"
                    >
                    <span class="person-avatar-hint" aria-hidden="true">+</span>
                </button>

                <div class="person-info">

                    <span class="person-role">Sekretaris 2</span>

                    <h3>Merlyn Sumardiyani</h3>

                    <p>Pengurus TBM Bintang Raharja</p>

                    <div class="person-contact-list">
                        <a
                            href="https://wa.me/62895360679144"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="person-contact whatsapp"
                        >
                            <span>💬</span>
                            <div>
                                <strong>WhatsApp</strong>
                                <small>+62 895-3606-79144</small>
                            </div>
                        </a>

                        <a
                            href="mailto:merlynsumardiyani47@gmail.com"
                            class="person-contact email"
                        >
                            <span>✉️</span>
                            <div>
                                <strong>Email</strong>
                                <small>merlynsumardiyani47@gmail.com</small>
                            </div>
                        </a>
                    </div>

                </div>

            </div>

            {{-- ASHILA NUR FATIHAH --}}

            <div class="contact-person-card">

                <div
                    class="person-avatar person-avatar--placeholder"
                    role="img"
                    aria-label="Foto Ashila Nur Fatihah belum tersedia"
                >
                    <span>ANF</span>
                </div>

                <div class="person-info">

                    <span class="person-role">Bendahara 2</span>

                    <h3>Ashila Nur Fatihah</h3>

                    <p>Pengurus TBM Bintang Raharja</p>

                    <div class="person-contact-list">
                        <a
                            href="https://wa.me/6281318356692"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="person-contact whatsapp"
                        >
                            <span>💬</span>
                            <div>
                                <strong>WhatsApp</strong>
                                <small>+62 813-1835-6692</small>
                            </div>
                        </a>

                        <a
                            href="mailto:ashilanurfatihah@gmail.com"
                            class="person-contact email"
                        >
                            <span>✉️</span>
                            <div>
                                <strong>Email</strong>
                                <small>ashilanurfatihah@gmail.com</small>
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

<section class="cta-section contact-cta">

    <div class="cta-atmosphere" aria-hidden="true">
        <span class="cta-orbit cta-orbit--one"></span>
        <span class="cta-orbit cta-orbit--two"></span>
        <span class="cta-glow cta-glow--left"></span>
        <span class="cta-glow cta-glow--right"></span>
        <span class="cta-spark cta-spark--one">✦</span>
        <span class="cta-spark cta-spark--two">✧</span>
        <span class="cta-spark cta-spark--three">✦</span>
        <span class="cta-spark cta-spark--four">✧</span>
    </div>

    <div class="container">

        <div class="cta-content">

            <span class="cta-eyebrow">
                <i aria-hidden="true">✦</i>
                TBM BINTANG RAHARJA
                <i aria-hidden="true">✦</i>
            </span>

            <h2>
                Mari belajar dan berkembang bersama.
            </h2>

            <div class="cta-title-line" aria-hidden="true"></div>

            <p>
                Ikuti kegiatan dan program
                TBM Bintang Raharja.
            </p>

            <a
                href="{{ route('activities.index') }}"
                class="button white cta-button"
            >
                Lihat Kegiatan
                <span aria-hidden="true">→</span>
            </a>

        </div>

    </div>

</section>



{{-- =====================================================
     FOOTER
===================================================== --}}

<dialog class="profile-lightbox" id="profile-lightbox" aria-label="Foto profil kontak">
    <img class="profile-lightbox__image" id="profile-lightbox-image" alt="">
</dialog>

@include('partials.site-footer')



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

const profileLightbox =
    document.getElementById('profile-lightbox');

const profileLightboxImage =
    document.getElementById('profile-lightbox-image');

document.querySelectorAll('.person-avatar[data-profile-image]').forEach(button => {
    button.addEventListener('click', () => {
        profileLightboxImage.src = button.dataset.profileImage;
        profileLightboxImage.alt = button.dataset.profileName;
        profileLightbox.showModal();
    });
});

profileLightbox.addEventListener('click', event => {
    if (event.target === profileLightbox) {
        profileLightbox.close();
    }
});

</script>


</body>

</html>