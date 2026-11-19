<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        name="description"
        content="Masuk ke area pengelola TBM Bintang Raharja."
    >

    <title>Login Pengelola - TBM Bintang Raharja</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="{{ asset('css/site-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site-footer.css') }}">
</head>

<body>
    @include('partials.site-navbar')

    <main class="login-page">
        <div class="login-page__glow login-page__glow--one" aria-hidden="true"></div>
        <div class="login-page__glow login-page__glow--two" aria-hidden="true"></div>

        <div class="login-container">
            <a class="login-back-link" href="{{ route('contact.index') }}">
                <span aria-hidden="true">←</span>
                Kembali ke Kontak
            </a>

            <section class="login-card" aria-labelledby="login-title">
                <div class="login-card__brand">
                    <img
                        src="{{ asset('images/logoTBMfinal.png') }}"
                        alt=""
                        width="64"
                        height="64"
                    >
                </div>

                <span class="login-eyebrow">AREA PENGELOLA</span>

                <h1 id="login-title">Masuk ke Area Pengelola</h1>

                <p class="login-description">
                    Halaman khusus pemilik TBM Bintang Raharja.
                </p>

                @if ($errors->any())
                    <div class="login-alert" role="alert">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.authenticate') }}" method="POST" class="login-form">
                    @csrf

                    <div class="login-form__group">
                        <label for="email">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="username"
                            placeholder="nama@email.com"
                            required
                            autofocus
                        >
                    </div>

                    <div class="login-form__group">
                        <label for="password">Kata sandi</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            placeholder="Masukkan kata sandi"
                            required
                        >
                    </div>

                    <label class="login-remember">
                        <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                        <span>Ingat saya</span>
                    </label>

                    <button class="login-submit" type="submit">
                        <span>Login</span>
                        <span aria-hidden="true">→</span>
                    </button>
                </form>

                <p class="login-card__note">
                    Akses hanya tersedia untuk akun dengan role pemilik.
                </p>
            </section>
        </div>
    </main>

    @include('partials.site-footer')
</body>

</html>
