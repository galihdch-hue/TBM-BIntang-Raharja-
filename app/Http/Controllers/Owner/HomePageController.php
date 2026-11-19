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

class HomePageController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function edit(): View
    {
        $pageContent = PageContent::query()->where('slug', 'home')->first();
        $home = array_replace(config('pages.home'), $pageContent?->content ?? []);
        $home['images'] = array_merge(config('pages.home.images'), $home['images'] ?? []);

        foreach ($home['partners']['items'] as &$partner) {
            $partner['icon_url'] = $this->imageStorage->url($partner['icon'] ?? null);
        }
        unset($partner);

        return view('owner.home.edit', [
            'home' => $home,
            'imageUrls' => [
                'hero' => $this->imageStorage->url($home['images']['hero']),
                'about' => $this->imageStorage->url($home['images']['about']),
            ],
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $iconOptions = config('pages.home.icon_options');
        $content = $request->validate([
            'hero.label' => ['required', 'string', 'max:100'],
            'hero.title' => ['required', 'string', 'max:255'],
            'hero.highlight' => ['required', 'string', 'max:255'],
            'hero.description' => ['required', 'string', 'max:2000'],
            'hero.primary_label' => ['required', 'string', 'max:100'],
            'hero.secondary_label' => ['required', 'string', 'max:100'],
            'hero.focus' => ['required', 'array', 'min:1', 'max:5'],
            'hero.focus.*.label' => ['required', 'string', 'max:80'],
            'hero.focus.*.value' => ['required', 'string', 'max:80'],
            'hero.focus.*.icon' => ['required', 'string', Rule::in($iconOptions)],
            'stats' => ['required', 'array', 'min:1', 'max:10'],
            'stats.*.number' => ['required', 'string', 'max:30'],
            'stats.*.label' => ['required', 'string', 'max:80'],
            'stats.*.icon' => ['required', 'string', Rule::in($iconOptions)],
            'intro.label' => ['required', 'string', 'max:100'],
            'intro.title' => ['required', 'string', 'max:255'],
            'intro.highlight' => ['required', 'string', 'max:255'],
            'intro.description' => ['required', 'string', 'max:2000'],
            'intro.link_label' => ['required', 'string', 'max:100'],
            'activities.label' => ['required', 'string', 'max:100'],
            'activities.title' => ['required', 'string', 'max:255'],
            'activities.highlight' => ['required', 'string', 'max:255'],
            'activities.description' => ['required', 'string', 'max:2000'],
            'activities.link_label' => ['required', 'string', 'max:100'],
            'about.label' => ['required', 'string', 'max:100'],
            'about.title' => ['required', 'string', 'max:255'],
            'about.highlight' => ['required', 'string', 'max:255'],
            'about.paragraphs' => ['required', 'array', 'min:1', 'max:10'],
            'about.paragraphs.*' => ['required', 'string', 'max:2000'],
            'about.points' => ['required', 'array', 'min:1', 'max:10'],
            'about.points.*' => ['required', 'string', 'max:255'],
            'about.link_label' => ['required', 'string', 'max:100'],
            'history.label' => ['required', 'string', 'max:100'],
            'history.title' => ['required', 'string', 'max:255'],
            'history.highlight' => ['required', 'string', 'max:255'],
            'history.description' => ['required', 'string', 'max:2000'],
            'history.items' => ['required', 'array', 'min:1', 'max:20'],
            'history.items.*.year' => ['required', 'string', 'max:100'],
            'history.items.*.title' => ['required', 'string', 'max:255'],
            'history.items.*.description' => ['required', 'string', 'max:2000'],
            'values.label' => ['required', 'string', 'max:100'],
            'values.title' => ['required', 'string', 'max:255'],
            'values.description' => ['required', 'string', 'max:2000'],
            'values.items' => ['required', 'array', 'min:1', 'max:10'],
            'values.items.*.title' => ['required', 'string', 'max:255'],
            'values.items.*.description' => ['required', 'string', 'max:2000'],
            'values.items.*.icon' => ['required', 'string', Rule::in($iconOptions)],
            'impact.label' => ['required', 'string', 'max:100'],
            'impact.title' => ['required', 'string', 'max:255'],
            'impact.highlight' => ['required', 'string', 'max:255'],
            'impact.title_suffix' => ['required', 'string', 'max:255'],
            'impact.description' => ['required', 'string', 'max:2000'],
            'impact.items' => ['required', 'array', 'min:1', 'max:10'],
            'impact.items.*.title' => ['required', 'string', 'max:255'],
            'impact.items.*.description' => ['required', 'string', 'max:2000'],
            'milestones.label' => ['required', 'string', 'max:100'],
            'milestones.title' => ['required', 'string', 'max:255'],
            'milestones.highlight' => ['required', 'string', 'max:255'],
            'milestones.description' => ['required', 'string', 'max:2000'],
            'milestones.items' => ['required', 'array', 'min:1', 'max:10'],
            'milestones.items.*.title' => ['required', 'string', 'max:255'],
            'milestones.items.*.description' => ['required', 'string', 'max:2000'],
            'partners.label' => ['required', 'string', 'max:100'],
            'partners.title' => ['required', 'string', 'max:255'],
            'partners.description' => ['required', 'string', 'max:2000'],
            'partners.items' => ['required', 'array', 'min:1', 'max:20'],
            'partners.items.*.name' => ['required', 'string', 'max:255'],
            'partners.items.*.icon' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'cta.eyebrow' => ['required', 'string', 'max:100'],
            'cta.title_first' => ['required', 'string', 'max:255'],
            'cta.title_second' => ['required', 'string', 'max:255'],
            'cta.title_third' => ['required', 'string', 'max:255'],
            'cta.description' => ['required', 'string', 'max:2000'],
            'cta.activities_label' => ['required', 'string', 'max:100'],
            'cta.contact_label' => ['required', 'string', 'max:100'],
            'images.hero' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
            'images.about' => [
                'nullable',
                File::image()
                    ->types(['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])
                    ->max(ImageStorage::MAX_UPLOAD_SIZE_KB)
                    ->dimensions(Rule::dimensions()->maxWidth(6000)->maxHeight(6000)),
            ],
        ], [
            'images.hero.max' => 'Ukuran foto utama maksimal 10 MB.',
            'images.hero.uploaded' => 'Upload foto utama gagal atau ukuran file melebihi 10 MB.',
            'images.about.max' => 'Ukuran foto Tentang maksimal 10 MB.',
            'images.about.uploaded' => 'Upload foto Tentang gagal atau ukuran file melebihi 10 MB.',
            'partners.items.*.icon.image' => 'Logo kolaborator harus berupa gambar yang valid.',
            'partners.items.*.icon.max' => 'Ukuran logo kolaborator maksimal 10 MB.',
            'partners.items.*.icon.uploaded' => 'Upload logo kolaborator gagal atau ukuran file melebihi 10 MB.',
            'partners.items.*.icon.dimensions' => 'Dimensi logo kolaborator maksimal 6000 x 6000 piksel.',
        ]);

        $pageContent = PageContent::query()->where('slug', 'home')->first();
        $existingPartners = $pageContent?->content['partners']['items'] ?? config('pages.home.partners.items');

        foreach ($content['partners']['items'] as $index => &$partner) {
            $upload = $partner['icon'] ?? null;
            $existingIcon = $existingPartners[$index]['icon'] ?? '';
            $partner['icon'] = $upload instanceof UploadedFile
                ? $this->imageStorage->store($upload, 'uploads/partners')
                : $existingIcon;
        }
        unset($partner);

        foreach ([
            'hero.focus',
            'stats',
            'about.paragraphs',
            'about.points',
            'history.items',
            'values.items',
            'impact.items',
            'milestones.items',
            'partners.items',
        ] as $path) {
            data_set($content, $path, array_values(data_get($content, $path)));
        }

        $content['about']['point_icons'] = config('pages.home.about.point_icons');
        $existingImages = array_merge(
            config('pages.home.images'),
            $pageContent?->content['images'] ?? [],
        );
        $uploads = $content['images'] ?? [];
        unset($content['images']);

        foreach (['hero', 'about'] as $imageKey) {
            $upload = $uploads[$imageKey] ?? null;
            $content['images'][$imageKey] = $upload instanceof UploadedFile
                ? $this->imageStorage->store($upload, 'uploads/home')
                : $existingImages[$imageKey];
        }

        $pageContent ??= new PageContent;
        $pageContent->fill([
            'slug' => 'home',
            'content' => $content,
        ]);
        $pageContent->save();

        foreach (['hero', 'about'] as $imageKey) {
            if ($existingImages[$imageKey] !== $content['images'][$imageKey]) {
                $this->imageStorage->delete($existingImages[$imageKey]);
            }
        }

        $remainingPartnerLogos = array_filter(array_column($content['partners']['items'], 'icon'));

        foreach (array_unique(array_filter(array_column($existingPartners, 'icon'))) as $logo) {
            if (! \in_array($logo, $remainingPartnerLogos, true)) {
                $this->imageStorage->delete($logo);
            }
        }

        return redirect()
            ->route('owner.home.edit')
            ->with('success', 'Konten Beranda berhasil diperbarui.');
    }
}
