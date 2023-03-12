<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    private string $base_title = '管理者';

    public function index()
    {
        $title = $this->base_title . '一覧';
        $users = User::query()->paginate(30);
        $route_for_create = route('admin.user.create');
        $base_title = $this->base_title;

        return view('admin::pages.user.index', compact(
            'title',
            'base_title',
            'users',
            'route_for_create'
        ));
    }

    public function edit(User $user)
    {
        $title = $user->name . 'の編集';
        $method = 'POST';
        $endpoint = route('api.admin.v1.user.update', ['user' => $user]);

        return view('admin::pages.user.edit', compact(
            'title',
            'user',
            'method',
            'endpoint'
        ));
    }

    public function create()
    {
        $title = $this->base_title . 'の新規追加';
        $method = 'POST';
        $endpoint = route('api.admin.v1.user.create');

        return view('admin::pages.user.edit', compact(
            'title',
            'method',
            'endpoint'
        ));
    }
}
