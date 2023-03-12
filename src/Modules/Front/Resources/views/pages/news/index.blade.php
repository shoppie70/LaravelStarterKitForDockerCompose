@extends('front::layouts.master')

@section('css')
    <style>
        .news-item {
            border-bottom: 2px dashed #ccc;
        }
    </style>
@endsection

@section('content')
    {{ Breadcrumbs::render('news', $title) }}
    <section id="" class="pt-16 mb-20">
        <div class="w-full max-w-screen-xl mx-auto p-4">
            <div class="mb-12">
                @include('front::components.heading-main', ['main_title' => $title, 'sub_title' => $sub_title])
            </div>
            <ul class="rounded mx-auto bg-gray-100 py-4 px-4 md:px-8">
                @foreach($news_items as $news_item)
                    <li class="news-item py-4">
                        <article class="flex items-center flex-wrap">
                            <time datetime="{{ $news_item->created_at->format('Y-m-d') }}"
                                  class="md:mr-4 block bg-blue-400 text-white text-sm rounded py-1 px-2 mb-2 md:mb-0">
                                {{ $news_item->created_at->format('Y.m.d') }}
                            </time>
                            <h1>
                                <a href="{{ route('news.show',['news' => $news_item]) }}">
                                    {{ $news_item->title }}
                                </a>
                            </h1>
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
