@extends('admin::layouts.master')

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/23.1.0/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: 'ja',
                ckfinder: {
                    uploadUrl: '/api/admin/v1/media/',
                },
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection


@section('content')
    <div class="px-4 mx-auto w-full md:px-10">
        @component('admin::components.widgets.card')
            @slot('title')
                {{ $title }}
            @endslot
            <div class="flex-auto px-4 py-10 pt-8">
                <form method="{{ $method }}" action="{{ $endpoint }}" class="api_form">
                    @csrf
                    <section>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-full px-2">
                                @include('admin::components.form.input-text', [
                                    'label' => '投稿タイトル',
                                    'name' => 'title',
                                    'value' => $news->title ?? ''
                                ])
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-full px-2">
                                <label for="editor" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    本文
                                </label>
                                <textarea name="body" id="editor"
                                          class="block w-full">{{ $news->body ?? '' }}</textarea>
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
