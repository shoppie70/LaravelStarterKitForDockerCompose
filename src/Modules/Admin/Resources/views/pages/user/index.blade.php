@extends('admin::layouts.master')

@section('content')
    <div class="mx-auto w-full">
        <div class="px-4 mx-auto w-full md:px-10">
            @component('admin::components.widgets.card')
                @slot('title')
                    <div class="flex items-start justify-between">
                    <span>
                        {{ $title }}
                    </span>
                        <a class="btn-primary" href="{{ $route_for_create }}">
                            {{ $base_title }}の新規追加
                        </a>
                    </div>
                @endslot
                <p class="ml-4 text-sm">
                </p>
                <table class="items-center w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="th-base">
                            #
                        </th>
                        <th class="th-base">
                            ユーザ名
                        </th>
                        <th class="th-base">
                            メールアドレス
                        </th>
                        <th class="th-base">
                            ステータス
                        </th>
                        <th class="th-base"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <th class="td-base text-left flex items-center">
                                <a href="{{ route('admin.user.edit',['user' => $user]) }}">
                                    {{ $user->id }}
                                </a>
                            </th>
                            <td class="td-base">
                                <a href="{{ route('admin.user.edit',['user' => $user]) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td class="td-base">
                                {{ $user->email ?? '' }}
                            </td>
                            <td class="td-base">

                            </td>
                            <td class="td-base text-right">
                                <a href="#pablo" class="text-blueGray-500 block py-1 px-3"
                                   onclick="openDropdown(event,'table-light-1-dropdown')">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div
                                    class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                                    id="table-light-1-dropdown">
                                    <a href="{{ route('admin.user.edit',['user' => $user]) }}"
                                       class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                        ユーザ情報の編集
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="td-base text-left flex items-center">
                                ユーザーが存在していません。
                            </th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $users->links() }}
                </div>
            @endcomponent
        </div>
    </div>
@endsection
