@extends('admin::layouts.master')

@section('content')
    <div class="px-4 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                <div class="flex items-start justify-between">
                    <span>
                        {{ $title }}
                    </span>
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
                        貴社名
                    </th>
                    <th class="th-base">
                        お名前
                    </th>
                    <th class="th-base">
                        住所
                    </th>
                    <th class="th-base">
                        電話番号
                    </th>
                    <th class="th-base">
                        メールアドレス
                    </th>
                    <th class="th-base">
                        お問い合わせ内容
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <th class="td-base text-left flex items-center">
                            {{ $item->id }}
                        </th>
                        <td class="td-base">
                            {{ $item->get_detail_value('company_name') }}
                        </td>
                        <td class="td-base">
                            {{ $item->get_detail_value('name') }}
                        </td>
                        <td class="td-base">
                            {{ '〒' . $item->get_detail_value('postal_code') . ' ' . $item->get_detail_value('address') }}
                        </td>
                        <td class="td-base">
                            {{ $item->get_detail_value('tel') }}
                        </td>
                        <td class="td-base">
                            {{ $item->get_detail_value('email') }}
                        </td>
                        <td class="td-base">
                            {{ $item->get_detail_value('content') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="5" class="td-base text-left flex items-center">
                            {{ $base_title }}が存在していません。
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $items->links() }}
            </div>
        @endcomponent
    </div>
@endsection
