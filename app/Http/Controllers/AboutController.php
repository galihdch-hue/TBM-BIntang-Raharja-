<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Services\ImageStorage;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function index(): View
    {
        $about = AboutPage::query()->find(1)?->content ?? config('tbm.about');
        $about['images'] = array_merge(config('tbm.about.images'), $about['images'] ?? []);
        $about['image_urls'] = [
            'logo' => $this->imageStorage->url($about['images']['logo']),
            'biography' => $this->imageStorage->url($about['images']['biography']),
        ];

        return view('about', compact('about'));
    }
}
