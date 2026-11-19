<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Services\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class ContactPageController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function edit(): View
    {
        $pageContent = PageContent::query()->where('slug', 'contact')->first();
        $contact = array_replace(config('pages.contact'), $pageContent?->content ?? []);

        foreach ($contact['people'] as &$person) {
            $person['photo_url'] = $this->imageStorage->url($person['photo'] ?? null);
        }
        unset($person);

        return view('owner.contact.edit', compact('contact'));
    }

    public function update(Request $request): RedirectResponse
    {
        $content = $request->validate([
            'hero.label' => ['required', 'string', 'max:100'],
            'hero.title' => ['required', 'string', 'max:255'],
            'hero.highlight' => ['required', 'string', 'max:255'],
            'hero.description' => ['required', 'string', 'max:2000'],
            'hero.card_title' => ['required', 'string', 'max:255'],
            'hero.card_description' => ['required', 'string', 'max:2000'],
            'people_heading.label' => ['required', 'string', 'max:100'],
            'people_heading.title' => ['required', 'string', 'max:255'],
            'people_heading.highlight' => ['required', 'string', 'max:255'],
            'people_heading.description' => ['required', 'string', 'max:2000'],
            'people' => ['required', 'array', 'min:1', 'max:20'],
            'people.*.name' => ['required', 'string', 'max:255'],
            'people.*.role' => ['required', 'string', 'max:255'],
            'people.*.description' => ['nullable', 'string', 'max:500'],
            'people.*.phone' => ['nullable', 'string', 'max:30'],
            'people.*.email' => ['nullable', 'email', 'max:255'],
            'people.*.photo' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'people.*.remove_photo' => ['sometimes', 'boolean'],
            'information.label' => ['required', 'string', 'max:100'],
            'information.title' => ['required', 'string', 'max:255'],
            'information.description' => ['required', 'string', 'max:2000'],
            'information.cards' => ['required', 'array', 'min:1', 'max:10'],
            'information.cards.*.icon' => ['required', 'string', 'max:30'],
            'information.cards.*.title' => ['required', 'string', 'max:255'],
            'information.cards.*.description' => ['required', 'string', 'max:2000'],
            'information.cards.*.link_label' => ['nullable', 'string', 'max:100'],
            'information.cards.*.link_route' => ['nullable', Rule::in(['activities.index'])],
            'message.label' => ['required', 'string', 'max:100'],
            'message.title' => ['required', 'string', 'max:255'],
            'message.description' => ['required', 'string', 'max:2000'],
            'message.form_title' => ['required', 'string', 'max:255'],
            'message.form_description' => ['required', 'string', 'max:2000'],
            'message.details' => ['required', 'array', 'min:1', 'max:10'],
            'message.details.*.icon' => ['required', 'string', 'max:30'],
            'message.details.*.title' => ['required', 'string', 'max:255'],
            'message.details.*.description' => ['required', 'string', 'max:2000'],
            'cta.eyebrow' => ['required', 'string', 'max:100'],
            'cta.title' => ['required', 'string', 'max:255'],
            'cta.description' => ['required', 'string', 'max:2000'],
            'cta.activities_label' => ['required', 'string', 'max:100'],
            'cta.login_label' => ['required', 'string', 'max:100'],
        ], [
            'people.*.photo.image' => 'Foto kontak harus berupa gambar yang valid.',
            'people.*.photo.max' => 'Ukuran foto kontak maksimal 10 MB.',
            'people.*.photo.uploaded' => 'Upload foto kontak gagal atau ukuran file melebihi 10 MB.',
            'people.*.photo.dimensions' => 'Dimensi foto kontak maksimal 6000 x 6000 piksel.',
        ]);

        $pageContent = PageContent::query()->where('slug', 'contact')->first();
        $existingPeople = $pageContent?->content['people'] ?? config('pages.contact.people');
        $people = [];

        foreach ($content['people'] as $index => $person) {
            $existingPhoto = $existingPeople[$index]['photo'] ?? '';
            $upload = $person['photo'] ?? null;

            if ($request->boolean("people.{$index}.remove_photo")) {
                $photo = '';
            } elseif ($upload instanceof UploadedFile) {
                $photo = $this->imageStorage->store($upload, 'uploads/contacts');
            } else {
                $photo = $existingPhoto;
            }

            unset($person['photo'], $person['remove_photo']);
            $person['photo'] = $photo;
            $people[] = $person;
        }

        $content['people'] = array_values($people);
        $content['information']['cards'] = array_values($content['information']['cards']);
        $content['message']['details'] = array_values($content['message']['details']);

        $pageContent ??= new PageContent;
        $pageContent->fill([
            'slug' => 'contact',
            'content' => $content,
        ]);
        $pageContent->save();

        $remainingPhotos = array_filter(array_column($people, 'photo'));

        foreach (array_unique(array_filter(array_column($existingPeople, 'photo'))) as $photo) {
            if (! \in_array($photo, $remainingPhotos, true)) {
                $this->imageStorage->delete($photo);
            }
        }

        return redirect()
            ->route('owner.contact.edit')
            ->with('success', 'Konten Kontak berhasil diperbarui.');
    }
}
