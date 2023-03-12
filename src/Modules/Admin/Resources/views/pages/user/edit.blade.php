@extends('admin::layouts.master')

@section('content')
    <div class="px-4 mx-auto w-full">
        @component('admin::components.widgets.card')
            @slot('title')
                {{ $title }}
            @endslot
            <div class="flex-auto px-4 py-10 pt-0">
                <form method="{{ $method }}" action="{{ $endpoint }}" class="api_form">
                    @csrf
                    <section>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-1/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '名前',
                                    'name' => 'name',
                                    'value' => $user->name ?? ''
                                ])
                            </div>
                            <div class="w-2/3 px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => 'メールアドレス',
                                    'name' => 'email',
                                    'value' => $user->email ?? '',
                                ])
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-full px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '新規パスワード',
                                    'name' => 'password',
                                    'value' => ''
                                ])
                            </div>
                        </div>
                        <hr class="mt-6 mb-4 border-b-1 border-blueGray-300">
                        <div class="flex justify-end items-center">
                            <button type="submit" class="btn-primary">
                                保存する
                            </button>
                        </div>
                    </section>

                </form>
            </div>
        @endcomponent
    </div>
@endsection
