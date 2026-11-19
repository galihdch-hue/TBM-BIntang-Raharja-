<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Services\ImageStorage;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(private ImageStorage $imageStorage) {}

    public function index(): View
    {
        $pageContent = PageContent::query()->where('slug', 'contact')->first();
        $contact = array_replace(
            config('pages.contact'),
            $pageContent?->content ?? [],
        );

        foreach ($contact['people'] as &$person) {
            $person['photo_url'] = $this->imageStorage->url($person['photo'] ?? null);
            $phoneNumber = preg_replace('/\D+/', '', $person['phone'] ?? '') ?? '';
            $person['whatsapp_number'] = str_starts_with($phoneNumber, '0')
                ? '62'.substr($phoneNumber, 1)
                : $phoneNumber;
        }
        unset($person);

        return view('contact.index', compact('contact'));
    }
}
