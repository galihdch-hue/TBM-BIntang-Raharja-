@extends('owner.layout')

@section('title', 'Edit Kontak')

@section('content')
    <section class="owner-page-heading">
        <div>
            <span class="owner-eyebrow">KONTEN SITUS</span>
            <h1>Edit Halaman Kontak</h1>
            <p>Kelola narahubung, informasi, foto profil, dan teks yang tampil di halaman Kontak.</p>
        </div>
    </section>

    @php
        $listDefinitions = [
            'people' => ['path' => 'people', 'items' => $contact['people']],
            'cards' => ['path' => 'information.cards', 'items' => $contact['information']['cards']],
            'details' => ['path' => 'message.details', 'items' => $contact['message']['details']],
        ];

        foreach ($listDefinitions as $key => $definition) {
            $items = old($definition['path'], $definition['items']);
            $listDefinitions[$key]['items'] = is_array($items) ? $items : $definition['items'];
            $keys = array_map('intval', array_keys($listDefinitions[$key]['items']));
            $listDefinitions[$key]['next_index'] = $keys === [] ? 0 : max($keys) + 1;
        }
    @endphp

    <form class="owner-form owner-panel" action="{{ route('owner.contact.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <section class="owner-form-section">
            <h2>Bagian pembuka</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul', 'card_title' => 'Judul kartu', 'card_description' => 'Deskripsi kartu'] as $key => $label)
                    <div class="owner-field">
                        <label for="hero-{{ $key }}">{{ $label }}</label>
                        @if ($key === 'description' || $key === 'card_description')
                            <textarea id="hero-{{ $key }}" name="hero[{{ $key }}]" required>{{ old('hero.'.$key, $contact['hero'][$key]) }}</textarea>
                        @else
                            <input id="hero-{{ $key }}" name="hero[{{ $key }}]" value="{{ old('hero.'.$key, $contact['hero'][$key]) }}" required>
                        @endif
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="hero-description">Deskripsi halaman</label>
                    <textarea id="hero-description" name="hero[description]" required>{{ old('hero.description', $contact['hero']['description']) }}</textarea>
                </div>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Judul daftar kontak person</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'highlight' => 'Sorotan judul'] as $key => $label)
                    <div class="owner-field">
                        <label for="people-heading-{{ $key }}">{{ $label }}</label>
                        <input id="people-heading-{{ $key }}" name="people_heading[{{ $key }}]" value="{{ old('people_heading.'.$key, $contact['people_heading'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="people-heading-description">Deskripsi</label>
                    <textarea id="people-heading-description" name="people_heading[description]" required>{{ old('people_heading.description', $contact['people_heading']['description']) }}</textarea>
                </div>
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['people']['next_index'] }}" data-label="Kontak person">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['people']['items'] as $index => $person)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Kontak person {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus kontak</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="person-name-{{ $index }}">Nama</label>
                                    <input id="person-name-{{ $index }}" name="people[{{ $index }}][name]" value="{{ data_get($person, 'name', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="person-role-{{ $index }}">Jabatan / peran</label>
                                    <input id="person-role-{{ $index }}" name="people[{{ $index }}][role]" value="{{ data_get($person, 'role', '') }}" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="person-description-{{ $index }}">Deskripsi</label>
                                    <textarea id="person-description-{{ $index }}" name="people[{{ $index }}][description]">{{ data_get($person, 'description', '') }}</textarea>
                                </div>
                                <div class="owner-field">
                                    <label for="person-phone-{{ $index }}">Nomor WhatsApp</label>
                                    <input id="person-phone-{{ $index }}" name="people[{{ $index }}][phone]" value="{{ data_get($person, 'phone', '') }}" placeholder="+62 812-3456-7890">
                                </div>
                                <div class="owner-field">
                                    <label for="person-email-{{ $index }}">Email</label>
                                    <input id="person-email-{{ $index }}" name="people[{{ $index }}][email]" type="email" value="{{ data_get($person, 'email', '') }}">
                                </div>
                                <div class="owner-field">
                                    <label for="person-photo-{{ $index }}">Foto profil</label>
                                    <input id="person-photo-{{ $index }}" name="people[{{ $index }}][photo]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp">
                                    <small>Maksimal 10 MB. Otomatis dikompres ke WebP.</small>
                                    @if (data_get($person, 'photo_url'))
                                        <img class="owner-image-preview" src="{{ $person['photo_url'] }}" alt="Foto {{ data_get($person, 'name', '') }}">
                                        <label class="owner-checkbox">
                                            <input type="checkbox" name="people[{{ $index }}][remove_photo]" value="1" @checked(old('people.'.$index.'.remove_photo'))>
                                            <span>Hapus foto saat ini</span>
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah kontak person</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Kontak person baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus kontak</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="person-name-__INDEX__">Nama</label>
                                <input id="person-name-__INDEX__" name="people[__INDEX__][name]" required>
                            </div>
                            <div class="owner-field">
                                <label for="person-role-__INDEX__">Jabatan / peran</label>
                                <input id="person-role-__INDEX__" name="people[__INDEX__][role]" required>
                            </div>
                            <div class="owner-field owner-field--wide">
                                <label for="person-description-__INDEX__">Deskripsi</label>
                                <textarea id="person-description-__INDEX__" name="people[__INDEX__][description]"></textarea>
                            </div>
                            <div class="owner-field">
                                <label for="person-phone-__INDEX__">Nomor WhatsApp</label>
                                <input id="person-phone-__INDEX__" name="people[__INDEX__][phone]" placeholder="+62 812-3456-7890">
                            </div>
                            <div class="owner-field">
                                <label for="person-email-__INDEX__">Email</label>
                                <input id="person-email-__INDEX__" name="people[__INDEX__][email]" type="email">
                            </div>
                            <div class="owner-field">
                                <label for="person-photo-__INDEX__">Foto profil</label>
                                <input id="person-photo-__INDEX__" name="people[__INDEX__][photo]" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/bmp">
                                <small>Maksimal 10 MB. Otomatis dikompres ke WebP.</small>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Informasi kontak</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'description' => 'Deskripsi'] as $key => $label)
                    <div class="owner-field">
                        <label for="information-{{ $key }}">{{ $label }}</label>
                        @if ($key === 'description')
                            <textarea id="information-{{ $key }}" name="information[{{ $key }}]" required>{{ old('information.'.$key, $contact['information'][$key]) }}</textarea>
                        @else
                            <input id="information-{{ $key }}" name="information[{{ $key }}]" value="{{ old('information.'.$key, $contact['information'][$key]) }}" required>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['cards']['next_index'] }}" data-label="Informasi">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['cards']['items'] as $index => $card)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Informasi {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus informasi</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="card-icon-{{ $index }}">Ikon</label>
                                    <input id="card-icon-{{ $index }}" name="information[cards][{{ $index }}][icon]" value="{{ data_get($card, 'icon', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="card-title-{{ $index }}">Judul</label>
                                    <input id="card-title-{{ $index }}" name="information[cards][{{ $index }}][title]" value="{{ data_get($card, 'title', '') }}" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="card-description-{{ $index }}">Deskripsi</label>
                                    <textarea id="card-description-{{ $index }}" name="information[cards][{{ $index }}][description]" required>{{ data_get($card, 'description', '') }}</textarea>
                                </div>
                                <div class="owner-field">
                                    <label for="card-link-label-{{ $index }}">Teks tautan</label>
                                    <input id="card-link-label-{{ $index }}" name="information[cards][{{ $index }}][link_label]" value="{{ data_get($card, 'link_label', '') }}">
                                </div>
                                <div class="owner-field">
                                    <label for="card-link-route-{{ $index }}">Tujuan tautan</label>
                                    <select id="card-link-route-{{ $index }}" name="information[cards][{{ $index }}][link_route]">
                                        <option value="">Tanpa tautan</option>
                                        <option value="activities.index" @selected(data_get($card, 'link_route') === 'activities.index')>Halaman Kegiatan</option>
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
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus informasi</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="card-icon-__INDEX__">Ikon</label>
                                <input id="card-icon-__INDEX__" name="information[cards][__INDEX__][icon]" required>
                            </div>
                            <div class="owner-field">
                                <label for="card-title-__INDEX__">Judul</label>
                                <input id="card-title-__INDEX__" name="information[cards][__INDEX__][title]" required>
                            </div>
                            <div class="owner-field owner-field--wide">
                                <label for="card-description-__INDEX__">Deskripsi</label>
                                <textarea id="card-description-__INDEX__" name="information[cards][__INDEX__][description]" required></textarea>
                            </div>
                            <div class="owner-field">
                                <label for="card-link-label-__INDEX__">Teks tautan</label>
                                <input id="card-link-label-__INDEX__" name="information[cards][__INDEX__][link_label]">
                            </div>
                            <div class="owner-field">
                                <label for="card-link-route-__INDEX__">Tujuan tautan</label>
                                <select id="card-link-route-__INDEX__" name="information[cards][__INDEX__][link_route]">
                                    <option value="">Tanpa tautan</option>
                                    <option value="activities.index">Halaman Kegiatan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Formulir pesan</h2>
            <div class="owner-form-grid">
                @foreach (['label' => 'Label', 'title' => 'Judul', 'form_title' => 'Judul formulir', 'form_description' => 'Deskripsi formulir'] as $key => $label)
                    <div class="owner-field">
                        <label for="message-{{ $key }}">{{ $label }}</label>
                        <input id="message-{{ $key }}" name="message[{{ $key }}]" value="{{ old('message.'.$key, $contact['message'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="message-description">Deskripsi</label>
                    <textarea id="message-description" name="message[description]" required>{{ old('message.description', $contact['message']['description']) }}</textarea>
                </div>
            </div>
            <div class="owner-repeater" data-repeater data-next-index="{{ $listDefinitions['details']['next_index'] }}" data-label="Detail pesan">
                <div class="owner-repeater__items" data-repeater-items>
                    @foreach ($listDefinitions['details']['items'] as $index => $detail)
                        <div class="owner-editor-card owner-repeater-item">
                            <div class="owner-editor-card__heading">
                                <h3>Detail {{ $loop->iteration }}</h3>
                                <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus detail</button>
                            </div>
                            <div class="owner-form-grid">
                                <div class="owner-field">
                                    <label for="detail-icon-{{ $index }}">Ikon</label>
                                    <input id="detail-icon-{{ $index }}" name="message[details][{{ $index }}][icon]" value="{{ data_get($detail, 'icon', '') }}" required>
                                </div>
                                <div class="owner-field">
                                    <label for="detail-title-{{ $index }}">Judul</label>
                                    <input id="detail-title-{{ $index }}" name="message[details][{{ $index }}][title]" value="{{ data_get($detail, 'title', '') }}" required>
                                </div>
                                <div class="owner-field owner-field--wide">
                                    <label for="detail-description-{{ $index }}">Deskripsi</label>
                                    <textarea id="detail-description-{{ $index }}" name="message[details][{{ $index }}][description]" required>{{ data_get($detail, 'description', '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="owner-button owner-button--quiet" type="button" data-repeater-add>+ Tambah detail</button>
                <template data-repeater-template>
                    <div class="owner-editor-card owner-repeater-item">
                        <div class="owner-editor-card__heading">
                            <h3>Detail baru</h3>
                            <button class="owner-action-link owner-action-link--danger" type="button" data-repeater-remove>Hapus detail</button>
                        </div>
                        <div class="owner-form-grid">
                            <div class="owner-field">
                                <label for="detail-icon-__INDEX__">Ikon</label>
                                <input id="detail-icon-__INDEX__" name="message[details][__INDEX__][icon]" required>
                            </div>
                            <div class="owner-field">
                                <label for="detail-title-__INDEX__">Judul</label>
                                <input id="detail-title-__INDEX__" name="message[details][__INDEX__][title]" required>
                            </div>
                            <div class="owner-field owner-field--wide">
                                <label for="detail-description-__INDEX__">Deskripsi</label>
                                <textarea id="detail-description-__INDEX__" name="message[details][__INDEX__][description]" required></textarea>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <section class="owner-form-section">
            <h2>Penutup Kontak</h2>
            <div class="owner-form-grid">
                @foreach (['eyebrow' => 'Label', 'title' => 'Judul', 'activities_label' => 'Tombol kegiatan', 'login_label' => 'Tombol masuk'] as $key => $label)
                    <div class="owner-field">
                        <label for="cta-{{ $key }}">{{ $label }}</label>
                        <input id="cta-{{ $key }}" name="cta[{{ $key }}]" value="{{ old('cta.'.$key, $contact['cta'][$key]) }}" required>
                    </div>
                @endforeach
                <div class="owner-field owner-field--wide">
                    <label for="cta-description">Deskripsi</label>
                    <textarea id="cta-description" name="cta[description]" required>{{ old('cta.description', $contact['cta']['description']) }}</textarea>
                </div>
            </div>
        </section>

        <div class="owner-form__actions">
            <a class="owner-button owner-button--quiet" href="{{ route('contact.index') }}" target="_blank" rel="noopener noreferrer">Lihat Kontak</a>
            <button class="owner-button owner-button--green" type="submit">Simpan perubahan</button>
        </div>
    </form>
@endsection
