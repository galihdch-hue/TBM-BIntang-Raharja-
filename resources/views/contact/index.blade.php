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
                    {{ $contact['hero']['label'] }}
                </span>

                <h1>
                    {{ $contact['hero']['title'] }}
                    <span>{{ $contact['hero']['highlight'] }}</span>
                </h1>

                <p>{{ $contact['hero']['description'] }}</p>

            </div>


            <div class="hero-placeholder">

                <div class="contact-icon">
                    💬
                </div>

                <h3>{{ $contact['hero']['card_title'] }}</h3>

                <p>{{ $contact['hero']['card_description'] }}</p>

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

            <span class="section-label">{{ $contact['people_heading']['label'] }}</span>

            <h2>
                {{ $contact['people_heading']['title'] }}
                <span>{{ $contact['people_heading']['highlight'] }}</span>
            </h2>

            <p>{{ $contact['people_heading']['description'] }}</p>

        </div>


        <div class="contact-person-grid">
            @foreach ($contact['people'] as $person)
                <article class="contact-person-card">
                    @if ($person['photo_url'])
                        <button
                            type="button"
                            class="person-avatar"
                            data-profile-image="{{ $person['photo_url'] }}"
                            data-profile-name="{{ $person['name'] }}"
                            aria-label="Lihat foto profil {{ $person['name'] }}"
                        >
                            <img src="{{ $person['photo_url'] }}" alt="" loading="lazy">
                            <span class="person-avatar-hint" aria-hidden="true">+</span>
                        </button>
                    @else
                        <div class="person-avatar person-avatar--placeholder" role="img" aria-label="Foto {{ $person['name'] }} belum tersedia">
                            <span>{{ strtoupper(mb_substr($person['name'], 0, 3)) }}</span>
                        </div>
                    @endif

                    <div class="person-info">
                        <span class="person-role">{{ $person['role'] }}</span>
                        <h3>{{ $person['name'] }}</h3>
                        @if ($person['description'])
                            <p>{{ $person['description'] }}</p>
                        @endif

                        <div class="person-contact-list">
                            @if ($person['whatsapp_number'])
                                <a
                                    href="https://wa.me/{{ $person['whatsapp_number'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="person-contact whatsapp"
                                >
                                    <span>💬</span>
                                    <div>
                                        <strong>WhatsApp</strong>
                                        <small>{{ $person['phone'] }}</small>
                                    </div>
                                </a>
                            @endif

                            @if ($person['email'])
                                <a href="mailto:{{ $person['email'] }}" class="person-contact email">
                                    <span>✉️</span>
                                    <div>
                                        <strong>Email</strong>
                                        <small>{{ $person['email'] }}</small>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
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

                <span class="section-label">{{ $contact['information']['label'] }}</span>

                <h2>{{ $contact['information']['title'] }}</h2>

                <p>{{ $contact['information']['description'] }}</p>

            </div>

        </div>


        <div class="contact-grid">


            @foreach ($contact['information']['cards'] as $card)
                <article class="contact-card">
                    <div class="contact-card-icon">{{ $card['icon'] }}</div>
                    <div>
                        <h3>{{ $card['title'] }}</h3>
                        <p>{{ $card['description'] }}</p>
                        @if ($card['link_route'] === 'activities.index' && $card['link_label'])
                            <a href="{{ route('activities.index') }}">{{ $card['link_label'] }}</a>
                        @endif
                    </div>
                </article>
            @endforeach

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

                <span class="section-label">{{ $contact['message']['label'] }}</span>

                <h2>{{ $contact['message']['title'] }}</h2>

                <p>{{ $contact['message']['description'] }}</p>

                <div class="info-list">
                    @foreach ($contact['message']['details'] as $detail)
                        <div class="info-item">
                            <div class="info-icon">{{ $detail['icon'] }}</div>
                            <div>
                                <strong>{{ $detail['title'] }}</strong>
                                <span>{{ $detail['description'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>



            {{-- FORM --}}

            <div class="contact-form-card">

                <h3>{{ $contact['message']['form_title'] }}</h3>

                <p class="form-description">{{ $contact['message']['form_description'] }}</p>


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
                {{ $contact['cta']['eyebrow'] }}
                <i aria-hidden="true">✦</i>
            </span>

            <h2>
                {{ $contact['cta']['title'] }}
            </h2>

            <div class="cta-title-line" aria-hidden="true"></div>

            <p>
                {{ $contact['cta']['description'] }}
            </p>

            <a
                href="{{ route('activities.index') }}"
                class="button white cta-button"
            >
                {{ $contact['cta']['activities_label'] }}
                <span aria-hidden="true">→</span>
            </a>

            <a
                href="{{ route('login') }}"
                class="button contact-login-button"
            >
                {{ $contact['cta']['login_label'] }}
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