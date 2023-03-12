<?php

namespace Modules\Front\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $title = 'お知らせ';
        $sub_title = 'NEWS';
        $hero_image_path = '';

        $news_items = News::query()->get();

        return view('front::pages.news.index', compact(
            'title',
            'sub_title',
            'hero_image_path',
            'news_items'
        ));
    }

    /**
     * Show the specified resource.
     * @param News $news
     * @return Renderable
     */
    public function show(News $news): Renderable
    {
        $title = 'お知らせ';
        $sub_title = 'NEWS';
        $hero_image_path = '';

        return view('front::pages.news.show', compact(
            'title',
            'sub_title',
            'hero_image_path',
            'news'
        ));
    }
}
