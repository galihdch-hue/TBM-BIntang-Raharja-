<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\PageContent;
use App\Services\ImageStorage;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function index(): View
    {
        $pageContent = PageContent::query()->where('slug', 'home')->first();
        $home = array_replace(
            config('pages.home'),
            $pageContent?->content ?? [],
        );
        $home['images'] = array_merge(config('pages.home.images'), $home['images'] ?? []);
        $home['image_urls'] = [
            'hero' => $this->imageStorage->url($home['images']['hero']),
            'about' => $this->imageStorage->url($home['images']['about']),
        ];

        foreach ($home['partners']['items'] as &$partner) {
            $partner['icon_url'] = $this->imageStorage->url($partner['icon'] ?? null);
        }
        unset($partner);

        $activities = Activity::where('is_active', true)
            ->orderBy('date', 'asc')
            ->get();

        return view('home', compact('home', 'activities'));
    }
}
