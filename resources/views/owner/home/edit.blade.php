@extends('owner.layout')

@section('title', 'Edit Beranda')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">KONTEN SITUS</span>
            <h1>Edit Halaman Beranda</h1>
            <p>Kelola teks, statistik, perjalanan, nilai, kolaborator, dan foto yang tampil di Beranda.</p>
        </div>
    </section>

    @php
        $listDefinitions = [
            'focus' => ['path' => 'hero.focus', 'items' => $home['hero']['focus']],
            'stats' => ['path' => 'stats', 'items' => $home['stats']],
            'about_paragraphs' => ['path' => 'about.paragraphs', 'items' => $home['about']['paragraphs']],
            'about_points' => ['path' => 'about.points', 'items' => $home['about']['points']],
            'history' => ['path' => 'history.items', 'items' => $home['history']['items']],
            'values' => ['path' => 'values.items', 'items' => $home['values']['items']],
            'impact' => ['path' => 'impact.items', 'items' => $home['impact']['items']],
            'milestones' => ['path' => 'milestones.items', 'items' => $home['milestones']['items']],
            'partners' => ['path' => 'partners.items', 'items' => $home['partners']['items']],
        ];

        foreach ($listDefinitions as $key => $definition) {
            $items = old($definition['path'], $definition['items']);
            $listDefinitions[$key]['items'] = is_array($items) ? $items : $definition['items'];
            $keys = array_map('intval', array_keys($listDefinitions[$key]['items']));
            $listDefinitions[$key]['next_index'] = $keys === [] ? 0 : max($keys) + 1;
        }
    @endphp

    <form class="owner-form owner-panel" action="{{ route('owner.home.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <section class="owner-form-section">
            <h2>Bagian pembuka</h2>
            <div class="owner-form-grid">
                <div class="owner-field">
                    <label for="hero-label">Label</label>
                    <input id="hero-label" name="hero[label]" value="{{ old('hero.label', $home['hero']['label']) }}" required>
                </div>
                <div class="owner-field">
                    <label for="hero-title">Judul</label>
                    <input id="hero-title" name="hero[title]" value="{{ old('hero.title', $home['hero']['title']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="hero-highlight">Sorotan judul</label>
                    <input id="hero-highlight" name="hero[highlight]" value="{{ old('hero.highlight', $home['hero']['highlight']) }}" required>
                </div>
                <div class="owner-field owner-field--wide">
                    <label for="hero-description">Deskripsi</label>
                    <textarea id="hero-description" name="hero[description]" required>{{ old('hero.description', $home['hero']['description']) }}</textarea>
                </div>
                <div class="owner-field">
                    <label for="hero-primary-label">Tombol utama</label>
                    <input id="hero-primary-label" name="hero[primary_label]" value="{{ old('hero.primary_label', $home['hero']['primary_label']) }}" required>
                </div>
                <div class="owner-field">
                    <label for="hero-secondary-label">Tombol kedua</label>
                    <input id="hero-secondary-label" name="hero[secondary_label]" value="{{ old('hero.secondary_label', $home['hero']['secondary_label']) }}" required>
                </div>
                <div class="owner-field">
                    <label for="home-hero-image">Foto utama</label>
                    <input id="home-hero-image" name="images[hero]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp">
                    <small>Maksimal 10 MB. Otomatis dikompres ke WebP.</small>
                    <img class="owner-image-preview" src="{{ $imageUrls['hero'] }}" alt="Foto utama saat ini">
                </div>
                <div class="owner-field">
                    <label for="home-about-image">Foto bagian Tentang</label>
                    <input id="home-about-image" name="images[about]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp">
                    <small>Maksimal 10 MB. Otomatis dikompres ke WebP.</small>
                    <img class="owner-image-preview" src="{{ $imageUrls['about'] }}" alt="Foto bagian Tentang saat ini">
                </div>
            </div>

            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['focus']['next_index'] }}" data-label="Informasi utama">
                <h3>Informasi singkat</h3>
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['focus']['items'] as $index => $focus)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Informasi {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="focus-label-{{ $index }}">Label</label>
                                    <input id="focus-label-{{ $index }}" name="hero[focus][{{ $index }}][label]" value="{{ data_get($focus, 'label', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="focus-value-{{ $index }}">Isi</label>
                                    <input id="focus-value-{{ $index }}" name="hero[focus][{{ $index }}][value]" value="{{ data_get($focus, 'value', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="focus-icon-{{ $index }}">Ikon</label>
                                    <select id="focus-icon-{{ $index }}" name="hero[focus][{{ $index }}][icon]" required>
                                        @foreach (config('pages.home.icon_options') as $icon)
                                            <option value="{{ $icon }}" @selected(data_get($focus, 'icon') === $icon)>{{ $icon }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah informasi</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Informasi baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="focus-label-__INDEX__">Label</label>
                                <input id="focus-label-__INDEX__" name="hero[focus][__INDEX__][label]" required>
                            </div>
                            <div class="owner-field">
                                <label for="focus-value-__INDEX__">Isi</label>
                                <input id="focus-value-__INDEX__" name="hero[focus][__INDEX__][value]" required>
                            </div>
                            <div class="owner-field">
                                <label for="focus-icon-__INDEX__">Ikon</label>
                                <select id="focus-icon-__INDEX__" name="hero[focus][__INDEX__][icon]" required>
                                    @foreach (config('pages.home.icon_options') as $icon)
                                        <option value="{{ $icon }}">{{ $icon }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Statistik</h2>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['stats']['next_index'] }}" data-label="Statistik">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['stats']['items'] as $index => $stat)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Statistik {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="stat-number-{{ $index }}">Angka</label>
                                    <input id="stat-number-{{ $index }}" name="stats[{{ $index }}][number]" value="{{ data_get($stat, 'number', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="stat-label-{{ $index }}">Label</label>
                                    <input id="stat-label-{{ $index }}" name="stats[{{ $index }}][label]" value="{{ data_get($stat, 'label', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="stat-icon-{{ $index }}">Ikon</label>
                                    <select id="stat-icon-{{ $index }}" name="stats[{{ $index }}][icon]" required>
                                        @foreach (config('pages.home.icon_options') as $icon)
                                            <option value="{{ $icon }}" @selected(data_get($stat, 'icon') === $icon)>{{ $icon }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah statistik</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Statistik baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="stat-number-__INDEX__">Angka</label>
                                <input id="stat-number-__INDEX__" name="stats[__INDEX__][number]" required>
                            </div>
                            <div class="owner-field">
                                <label for="stat-label-__INDEX__">Label</label>
                                <input id="stat-label-__INDEX__" name="stats[__INDEX__][label]" required>
                            </div>
                            <div class="owner-field">
                                <label for="stat-icon-__INDEX__">Ikon</label>
                                <select id="stat-icon-__INDEX__" name="stats[__INDEX__][icon]" required>
                                    @foreach (config('pages.home.icon_options') as $icon)
                                        <option value="{{ $icon }}">{{ $icon }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Pernyataan pembuka</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul', 'link_label' => 'Teks tautan'] as $key => $label)
                    <div class="owner-field">
                        <label for="intro-{{ $key }}">{{ $label }}</label>
                        <input id="intro-{{ $key }}" name="intro[{{ $key }}]" value="{{ old('intro.'.$key, $home['intro'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="intro-description">Deskripsi</label>
                    <textarea id="intro-description" name="intro[description]" required>{{ old('intro.description', $home['intro']['description']) }}</textarea>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Judul bagian Kegiatan</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul', 'link_label' => 'Teks tautan'] as $key => $label)
                    <div class="owner-field">
                        <label for="activities-{{ $key }}">{{ $label }}</label>
                        <input id="activities-{{ $key }}" name="activities[{{ $key }}]" value="{{ old('activities.'.$key, $home['activities'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="activities-description">Deskripsi</label>
                    <textarea id="activities-description" name="activities[description]" required>{{ old('activities.description', $home['activities']['description']) }}</textarea>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Bagian Tentang di Beranda</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul', 'link_label' => 'Teks tautan'] as $key => $label)
                    <div class="owner-field">
                        <label for="about-{{ $key }}">{{ $label }}</label>
                        <input id="about-{{ $key }}" name="about[{{ $key }}]" value="{{ old('about.'.$key, $home['about'][$key]) }}" required>
                    </div>
                @endforeach
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['about_paragraphs']['next_index'] }}" data-label="Paragraf">
                <h3>Paragraf Tentang</h3>
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['about_paragraphs']['items'] as $index => $paragraph)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Paragraf {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-field">
                                <label for="about-paragraph-{{ $index }}">Isi paragraf</label>
                                <textarea id="about-paragraph-{{ $index }}" name="about[paragraphs][{{ $index }}]" required>{{ is_string($paragraph) ? $paragraph : '' }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah paragraf</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Paragraf baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-field">
                            <label for="about-paragraph-__INDEX__">Isi paragraf</label>
                            <textarea id="about-paragraph-__INDEX__" name="about[paragraphs][__INDEX__]" required></textarea>
                        </div>
                    </div>
                </template>
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['about_points']['next_index'] }}" data-label="Poin">
                <h3>Poin pendukung</h3>
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['about_points']['items'] as $index => $point)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Poin {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-field">
                                <label for="about-point-{{ $index }}">Isi poin</label>
                                <input id="about-point-{{ $index }}" name="about[points][{{ $index }}]" value="{{ is_string($point) ? $point : '' }}" required>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah poin</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Poin baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-field">
                            <label for="about-point-__INDEX__">Isi poin</label>
                            <input id="about-point-__INDEX__" name="about[points][__INDEX__]" required>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Sejarah</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul'] as $key => $label)
                    <div class="owner-field">
                        <label for="history-{{ $key }}">{{ $label }}</label>
                        <input id="history-{{ $key }}" name="history[{{ $key }}]" value="{{ old('history.'.$key, $home['history'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="history-description">Deskripsi</label>
                    <textarea id="history-description" name="history[description]" required>{{ old('history.description', $home['history']['description']) }}</textarea>
                </div>
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['history']['next_index'] }}" data-label="Sejarah">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['history']['items'] as $index => $item)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Sejarah {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="history-year-{{ $index }}">Waktu / periode</label>
                                    <input id="history-year-{{ $index }}" name="history[items][{{ $index }}][year]" value="{{ data_get($item, 'year', '') }}" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="history-item-title-{{ $index }}">Judul</label>
                                    <input id="history-item-title-{{ $index }}" name="history[items][{{ $index }}][title]" value="{{ data_get($item, 'title', '') }}" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="history-item-description-{{ $index }}">Deskripsi</label>
                                    <textarea id="history-item-description-{{ $index }}" name="history[items][{{ $index }}][description]" required>{{ data_get($item, 'description', '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah sejarah</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Sejarah baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="history-year-__INDEX__">Waktu / periode</label>
                                <input id="history-year-__INDEX__" name="history[items][__INDEX__][year]" required>
                            </div>
                            <div class="owner-field owner-field--wide">
                                <label for="history-item-title-__INDEX__">Judul</label>
                                <input id="history-item-title-__INDEX__" name="history[items][__INDEX__][title]" required>
                            </div>
                            <div class="owner-field owner-field--wide">
                                <label for="history-item-description-__INDEX__">Deskripsi</label>
                                <textarea id="history-item-description-__INDEX__" name="history[items][__INDEX__][description]" required></textarea>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Nilai</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'description' => 'Deskripsi'] as $key => $label)
                    <div class="owner-field">
                        <label for="values-{{ $key }}">{{ $label }}</label>
                        @if ($key === 'description')
                            <textarea id="values-{{ $key }}" name="values[{{ $key }}]" required>{{ old('values.'.$key, $home['values'][$key]) }}</textarea>
                        @else
                            <input id="values-{{ $key }}" name="values[{{ $key }}]" value="{{ old('values.'.$key, $home['values'][$key]) }}" required>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['values']['next_index'] }}" data-label="Nilai">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['values']['items'] as $index => $value)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Nilai {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="value-title-{{ $index }}">Nama nilai</label>
                                    <input id="value-title-{{ $index }}" name="values[items][{{ $index }}][title]" value="{{ data_get($value, 'title', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="value-icon-{{ $index }}">Ikon</label>
                                    <select id="value-icon-{{ $index }}" name="values[items][{{ $index }}][icon]" required>
                                        @foreach (config('pages.home.icon_options') as $icon)
                                            <option value="{{ $icon }}" @selected(data_get($value, 'icon') === $icon)>{{ $icon }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="value-description-{{ $index }}">Deskripsi</label>
                                    <textarea id="value-description-{{ $index }}" name="values[items][{{ $index }}][description]" required>{{ data_get($value, 'description', '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah nilai</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Nilai baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="value-title-__INDEX__">Nama nilai</label>
                                <input id="value-title-__INDEX__" name="values[items][__INDEX__][title]" required>
                            </div>
                            <div class="owner-field">
                                <label for="value-icon-__INDEX__">Ikon</label>
                                <select id="value-icon-__INDEX__" name="values[items][__INDEX__][icon]" required>
                                    @foreach (config('pages.home.icon_options') as $icon)
                                        <option value="{{ $icon }}">{{ $icon }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="owner-field owner-field--wide">
                                <label for="value-description-__INDEX__">Deskripsi</label>
                                <textarea id="value-description-__INDEX__" name="values[items][__INDEX__][description]" required></textarea>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Dampak</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul', 'title_suffix' => 'Akhir judul'] as $key => $label)
                    <div class="owner-field">
                        <label for="impact-{{ $key }}">{{ $label }}</label>
                        <input id="impact-{{ $key }}" name="impact[{{ $key }}]" value="{{ old('impact.'.$key, $home['impact'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="impact-description">Deskripsi</label>
                    <textarea id="impact-description" name="impact[description]" required>{{ old('impact.description', $home['impact']['description']) }}</textarea>
                </div>
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['impact']['next_index'] }}" data-label="Dampak">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['impact']['items'] as $index => $item)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Dampak {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-field">
                                <label for="impact-title-{{ $index }}">Judul</label>
                                <input id="impact-title-{{ $index }}" name="impact[items][{{ $index }}][title]" value="{{ data_get($item, 'title', '') }}" required>
                            </div>
                            <div class="owner-field">
                                <label for="impact-item-description-{{ $index }}">Deskripsi</label>
                                <textarea id="impact-item-description-{{ $index }}" name="impact[items][{{ $index }}][description]" required>{{ data_get($item, 'description', '') }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah dampak</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Dampak baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-field">
                            <label for="impact-title-__INDEX__">Judul</label>
                            <input id="impact-title-__INDEX__" name="impact[items][__INDEX__][title]" required>
                        </div>
                        <div class="owner-field">
                            <label for="impact-item-description-__INDEX__">Deskripsi</label>
                            <textarea id="impact-item-description-__INDEX__" name="impact[items][__INDEX__][description]" required></textarea>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Milestone</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul'] as $key => $label)
                    <div class="owner-field">
                        <label for="milestones-{{ $key }}">{{ $label }}</label>
                        <input id="milestones-{{ $key }}" name="milestones[{{ $key }}]" value="{{ old('milestones.'.$key, $home['milestones'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="milestones-description">Deskripsi</label>
                    <textarea id="milestones-description" name="milestones[description]" required>{{ old('milestones.description', $home['milestones']['description']) }}</textarea>
                </div>
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['milestones']['next_index'] }}" data-label="Milestone">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['milestones']['items'] as $index => $item)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Milestone {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-field">
                                <label for="milestone-title-{{ $index }}">Judul</label>
                                <input id="milestone-title-{{ $index }}" name="milestones[items][{{ $index }}][title]" value="{{ data_get($item, 'title', '') }}" required>
                            </div>
                            <div class="owner-field">
                                <label for="milestone-description-{{ $index }}">Deskripsi</label>
                                <textarea id="milestone-description-{{ $index }}" name="milestones[items][{{ $index }}][description]" required>{{ data_get($item, 'description', '') }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah milestone</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Milestone baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-field">
                            <label for="milestone-title-__INDEX__">Judul</label>
                            <input id="milestone-title-__INDEX__" name="milestones[items][__INDEX__][title]" required>
                        </div>
                        <div class="owner-field">
                            <label for="milestone-description-__INDEX__">Deskripsi</label>
                            <textarea id="milestone-description-__INDEX__" name="milestones[items][__INDEX__][description]" required></textarea>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Kolaborator</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'description' => 'Deskripsi'] as $key => $label)
                    <div class="owner-field">
                        <label for="partners-{{ $key }}">{{ $label }}</label>
                        @if ($key === 'description')
                            <textarea id="partners-{{ $key }}" name="partners[{{ $key }}]" required>{{ old('partners.'.$key, $home['partners'][$key]) }}</textarea>
                        @else
                            <input id="partners-{{ $key }}" name="partners[{{ $key }}]" value="{{ old('partners.'.$key, $home['partners'][$key]) }}" required>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['partners']['next_index'] }}" data-label="Kolaborator">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['partners']['items'] as $index => $partner)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Kolaborator {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="partner-name-{{ $index }}">Nama</label>
                                    <input id="partner-name-{{ $index }}" name="partners[items][{{ $index }}][name]" value="{{ data_get($partner, 'name', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="partner-icon-{{ $index }}">Logo</label>
                                    <input id="partner-icon-{{ $index }}" name="partners[items][{{ $index }}][icon]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp">
                                    <small>Maksimal 10 MB. Logo otomatis dikompres ke WebP. Kosongkan untuk mempertahankan logo saat ini.</small>
                                    @if (data_get($partner, 'icon_url'))
                                        <img class="owner-image-preview" src="{{ $partner['icon_url'] }}" alt="Logo {{ data_get($partner, 'name', 'kolaborator') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah kolaborator</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Kolaborator baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="partner-name-__INDEX__">Nama</label>
                                <input id="partner-name-__INDEX__" name="partners[items][__INDEX__][name]" required>
                            </div>
                            <div class="owner-field">
                                <label for="partner-icon-__INDEX__">Logo</label>
                                <input id="partner-icon-__INDEX__" name="partners[items][__INDEX__][icon]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp">
                                <small>Maksimal 10 MB. Logo otomatis dikompres ke WebP.</small>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Penutup Beranda</h2>
            <div class="owner-form-grid">
                @foreach (['eyebrow' => 'Label', 'title_first' => 'Judul baris pertama', 'title_second' => 'Judul baris kedua', 'title_third' => 'Judul baris ketiga', 'activities_label' => 'Tombol kegiatan', 'contact_label' => 'Tombol kontak'] as $key => $label)
                    <div class="owner-field">
                        <label for="cta-{{ $key }}">{{ $label }}</label>
                        <input id="cta-{{ $key }}" name="cta[{{ $key }}]" value="{{ old('cta.'.$key, $home['cta'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="cta-description">Deskripsi</label>
                    <textarea id="cta-description" name="cta[description]" required>{{ old('cta.description', $home['cta']['description']) }}</textarea>
                </div>
            </div>
        </section>

        <div class="owner-form__actions">
            <a class="owner-button owner-button--quiet" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">Lihat Beranda</a>
            <button class="owner-button owner-button--green" type="submit">Simpan perubahan</button>
        </div>
    </form>
@endsection
