@extends('owner.layout')

@section('title', $news->exists ? 'Edit Berita' : 'Tambah Berita')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">BERITA</span>
            <h1>{{ $news->exists ? 'Edit berita' : 'Tambah berita' }}</h1>
            <p>Berita berstatus terbit akan muncul di halaman publik.</p>
        </div>
    </section>

    <form
        class="owner-form owner-panel"
        action="{{ $news->exists ? route('owner.news.update', $news) : route('owner.news.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @if ($news->exists)
            @method('PUT')
        @endif

        <div class="owner-form-grid">
            <div class="owner-field owner-field--wide">
                <label for="title">Judul berita <span>*</span></label>
                <input id="title" name="title" type="text" maxlength="255" value="{{ old('title', $news->title) }}" required>
            </div>
            <div class="owner-field">
                <label for="category">Kategori <span>*</span></label>
                <input id="category" name="category" type="text" maxlength="255" value="{{ old('category', $news->category) }}" required>
            </div>
            <div class="owner-field">
                <label for="slug">Slug URL <span>*</span></label>
                <input id="slug" name="slug" type="text" maxlength="255" value="{{ old('slug', $news->slug) }}" required>
                <small>Gunakan huruf, angka, dan tanda hubung; setiap slug harus unik.</small>
            </div>
            <div class="owner-field">
                <label for="author">Penulis</label>
                <input id="author" name="author" type="text" maxlength="255" value="{{ old('author', $news->author) }}">
            </div>
            <div class="owner-field">
                <label for="published_at">Tanggal terbit</label>
                <input id="published_at" name="published_at" type="date" value="{{ old('published_at', $news->published_at?->format('Y-m-d')) }}">
            </div>
            <div class="owner-field owner-field--wide">
                <label for="image">Unggah gambar (opsional)</label>
                <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp" aria-describedby="image-help">
                <small id="image-help">Maksimal 10 MB. Gambar otomatis dikompres ke WebP. Mengosongkan input akan mempertahankan gambar saat ini.</small>
                @if ($news->image)
                    @php
                        $imagePreview = \Illuminate\Support\Str::startsWith($news->image, ['http://', 'https://'])
                            ? $news->image
                            : asset('storage/'.$news->image);
                    @endphp
                    <img class="owner-image-preview" src="{{ $imagePreview }}" alt="Gambar berita saat ini">
                @endif
            </div>
            <div class="owner-field owner-field--wide">
                <label for="excerpt">Ringkasan</label>
                <textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $news->excerpt) }}</textarea>
            </div>
            <div class="owner-field owner-field--wide">
                <label for="content">Isi berita <span>*</span></label>
                <textarea id="content" name="content" rows="10" required>{{ old('content', $news->content) }}</textarea>
            </div>
        </div>

        <label class="owner-checkbox">
            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $news->exists ? $news->is_published : true))>
            <span>Terbitkan berita</span>
        </label>

        <div class="owner-form__actions">
            <a class="owner-button owner-button--quiet" href="{{ route('owner.news.index') }}">Batal</a>
            <button class="owner-button owner-button--blue" type="submit">{{ $news->exists ? 'Simpan perubahan' : 'Buat berita' }}</button>
        </div>
    </form>
@endsection
