@extends('owner.layout')

@section('title', $gallery->exists ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">GALERI</span>
            <h1>{{ $gallery->exists ? 'Edit dokumentasi' : 'Tambah dokumentasi' }}</h1>
            <p>Unggah gambar dokumentasi; file akan dikompres otomatis agar lebih ringan.</p>
        </div>
    </section>

    <form
        class="owner-form owner-panel"
        action="{{ $gallery->exists ? route('owner.gallery.update', $gallery) : route('owner.gallery.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @if ($gallery->exists)
            @method('PUT')
        @endif

        <div class="owner-form-grid">
            <div class="owner-field owner-field--wide">
                <label for="title">Judul dokumentasi <span>*</span></label>
                <input id="title" name="title" type="text" maxlength="255" value="{{ old('title', $gallery->title) }}" required>
            </div>
            <div class="owner-field">
                <label for="category">Kategori <span>*</span></label>
                <input id="category" name="category" type="text" maxlength="255" value="{{ old('category', $gallery->category) }}" required>
            </div>
            <div class="owner-field">
                <label for="date">Tanggal kegiatan</label>
                <input id="date" name="date" type="date" value="{{ old('date', $gallery->date?->format('Y-m-d')) }}">
            </div>
            <div class="owner-field owner-field--wide">
                <label for="image">Unggah gambar @unless ($gallery->exists)<span>*</span>@endunless</label>
                <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp" aria-describedby="image-help" @required(! $gallery->exists)>
                <small id="image-help">Maksimal 10 MB. Format JPG, PNG, WebP, GIF, atau BMP. Saat edit, kosongkan input untuk mempertahankan gambar saat ini.</small>
                @if ($gallery->image)
                    @php
                        $imagePreview = \Illuminate\Support\Str::startsWith($gallery->image, ['http://', 'https://'])
                            ? $gallery->image
                            : asset('storage/'.$gallery->image);
                    @endphp
                    <img class="owner-image-preview" src="{{ $imagePreview }}" alt="Gambar galeri saat ini">
                @endif
            </div>
            <div class="owner-field owner-field--wide">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" rows="5">{{ old('description', $gallery->description) }}</textarea>
            </div>
        </div>

        <label class="owner-checkbox">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $gallery->exists ? $gallery->is_active : true))>
            <span>Tampilkan di galeri publik</span>
        </label>

        <div class="owner-form__actions">
            <a class="owner-button owner-button--quiet" href="{{ route('owner.gallery.index') }}">Batal</a>
            <button class="owner-button owner-button--purple" type="submit">{{ $gallery->exists ? 'Simpan perubahan' : 'Tambah ke galeri' }}</button>
        </div>
    </form>
@endsection
