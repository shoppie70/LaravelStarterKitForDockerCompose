<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    protected string $base_title = 'お知らせ';

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $title = $this->base_title . '一覧';
        $base_title = $this->base_title;
        $route_for_create = route('admin.news.create');
        $method = 'POST';
        $items = News::query()->paginate(10);

        return view('admin::pages.news.index', compact(
            'base_title',
            'title',
            'method',
            'route_for_create',
            'items'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        $title = $this->base_title . 'の作成';
        $base_title = $this->base_title;
        $endpoint = route('api.admin.v1.news.store');
        $method = 'POST';

        return view('admin::pages.news.edit', compact(
            'title',
            'base_title',
            'method',
            'endpoint',
        ));
    }


    /**
     * Show the form for editing the specified resource.
     * @param News $news
     * @return Renderable
     */
    public function edit(News $news): Renderable
    {
        $title = $this->base_title . 'の編集';
        $base_title = $this->base_title;
        $endpoint = route('api.admin.v1.news.update', ['news' => $news]);
        $method = 'POST';

        return view('admin::pages.news.edit', compact(
            'title',
            'base_title',
            'endpoint',
            'method',
            'news'
        ));
    }
}
