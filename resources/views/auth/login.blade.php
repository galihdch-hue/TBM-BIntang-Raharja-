<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Masuk - TBM Bintang Raharja
    </title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #e9f8f2,
                    #f7faf9
                );

            display: flex;
            align-items: center;
            justify-content: center;

            color: #102a43;
        }

        .login-wrapper {
            width: min(420px, 92%);
        }

        .login-card {
            background: white;

            border: 1px solid #e6ece9;

            border-radius: 18px;

            padding: 35px;

            box-shadow:
                0 20px 50px rgba(16, 42, 67, .08);
        }

        .logo {
            text-align: center;

            margin-bottom: 28px;
        }

        .logo-icon {
            width: 55px;
            height: 55px;

            border-radius: 15px;

            background: #e9f8f2;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 12px;

            font-size: 27px;
        }

        .logo h1 {
            font-size: 20px;

            margin-bottom: 5px;
        }

        .logo p {
            color: #667085;

            font-size: 11px;
        }

        .alert {
            padding: 11px 13px;

            border-radius: 8px;

            margin-bottom: 17px;

            font-size: 11px;
        }

        .alert-success {
            background: #e9f8f2;

            color: #087653;
        }

        .alert-error {
            background: #fff1f1;

            color: #c0392b;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;

            font-size: 11px;

            font-weight: 600;

            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;

            height: 44px;

            border: 1px solid #dfe7e4;

            border-radius: 8px;

            padding: 0 13px;

            font-family: inherit;

            font-size: 11px;

            outline: none;

            transition: .2s;
        }

        .form-group input:focus {
            border-color: #0c9b6d;

            box-shadow:
                0 0 0 3px rgba(12,155,109,.08);
        }

        .remember {
            display: flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 18px;

            font-size: 10px;

            color: #667085;
        }

        .remember input {
            accent-color: #0c9b6d;
        }

        .login-button {
            width: 100%;

            height: 45px;

            border: 0;

            border-radius: 8px;

            background: #0c9b6d;

            color: white;

            font-family: inherit;

            font-size: 11px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s;
        }

        .login-button:hover {
            background: #087653;
        }

        .back-home {
            display: block;

            text-align: center;

            margin-top: 20px;

            color: #667085;

            font-size: 10px;
        }

        .back-home:hover {
            color: #0c9b6d;
        }

    </style>

</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="logo">

            <div class="logo-icon">
                ⭐
            </div>

            <h1>
                TBM Bintang Raharja
            </h1>

            <p>
                Masuk ke area pembelajaran
            </p>

        </div>


        @if (session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if ($errors->any())

            <div class="alert alert-error">

                {{ $errors->first() }}

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('login.process') }}"
        >

            @csrf


            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                    autofocus
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

            </div>


            <label class="remember">

                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                >

                Ingat saya

            </label>


            <button
                type="submit"
                class="login-button"
            >
                Masuk
            </button>

        </form>


        <a
            href="{{ route('home') }}"
            class="back-home"
        >
            ← Kembali ke website
        </a>

    </div>

</div>

</body>

</html>