@extends('admin::layouts.master')

@section('content')
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
            <table class="items-center w-full border-collapse">
                <thead>
                <tr>
                    <th class="th-base">
                        #
                    </th>
                    <th class="th-base">
                        タイトル
                    </th>
                    <th class="th-base">
                        本文
                    </th>
                    <th class="th-base">
                        表示設定
                    </th>
                    <th class="th-base">
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            <a href="{{ route('admin.news.edit', ['news' => $item]) }}">
                                {{ $item->id }}
                            </a>
                        </th>
                        <td class="td-base">
                            <a href="{{ route('admin.news.edit', ['news' => $item]) }}">
                                {{ $item->title }}
                            </a>
                        </td>
                        <td class="td-base">
                            {!! strip_tags($item->body) !!}...
                        </td>
                        <td class="td-base">
                            {{ $item->is_hidden ? '非表示' : '表示' }}
                        </td>
                        <td class="td-base text-right">
                            <a href="{{ route('admin.news.edit', ['news' => $item]) }}"
                               class="btn-primary">
                                編集
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="td-base text-left flex items-center" colspan="5">
                            {{ $base_title }}が存在していません。
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        @endcomponent
    </div>
@endsection
