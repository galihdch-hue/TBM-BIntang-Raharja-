<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::query()
            ->where('is_published', true)
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->get();

        return view('news.index', compact('news'));
    }

    public function show(News $news): View
    {
        abort_unless(
            $news->is_published,
            404
        );

        return view('news.show', compact('news'));
    }
}