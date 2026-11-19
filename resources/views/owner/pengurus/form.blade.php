@extends('owner.layout')

@section('title', $pengurus->exists ? 'Edit Pengurus' : 'Tambah Pengurus')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">AKUN PENGELOLA</span>
            <h1>{{ $pengurus->exists ? 'Edit pengurus' : 'Tambah pengurus' }}</h1>
            <p>Role akun dikunci sebagai Pengurus dan tidak dapat diubah menjadi Pemilik dari formulir ini.</p>
        </div>
    </section>

    <form
        class="owner-form owner-panel"
        action="{{ $pengurus->exists ? route('owner.pengurus.update', $pengurus) : route('owner.pengurus.store') }}"
        method="POST"
    >
        @csrf
        @if ($pengurus->exists)
            @method('PUT')
        @endif

        <div class="owner-form-grid">
            <div class="owner-field">
                <label for="name">Nama <span>*</span></label>
                <input id="name" name="name" type="text" maxlength="255" value="{{ old('name', $pengurus->name) }}" required>
            </div>
            <div class="owner-field">
                <label for="email">Email <span>*</span></label>
                <input id="email" name="email" type="email" maxlength="255" value="{{ old('email', $pengurus->email) }}" required>
            </div>
            <div class="owner-field">
                <label for="password">{{ $pengurus->exists ? 'Kata sandi baru' : 'Kata sandi' }} @unless ($pengurus->exists)<span>*</span>@endunless</label>
                <input id="password" name="password" type="password" minlength="8" @required(! $pengurus->exists)>
                @if ($pengurus->exists)
                    <small>Kosongkan jika tidak ingin mengganti kata sandi.</small>
                @else
                    <small>Gunakan minimal 8 karakter.</small>
                @endif
            </div>
            <div class="owner-field">
                <label for="password_confirmation">Konfirmasi kata sandi @unless ($pengurus->exists)<span>*</span>@endunless</label>
                <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" @required(! $pengurus->exists)>
            </div>
        </div>

        <div class="owner-form__actions">
            <a class="owner-button owner-button--quiet" href="{{ route('owner.pengurus.index') }}">Batal</a>
            <button class="owner-button owner-button--green" type="submit">{{ $pengurus->exists ? 'Simpan perubahan' : 'Buat akun pengurus' }}</button>
        </div>
    </form>
@endsection
