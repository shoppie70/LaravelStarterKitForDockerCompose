@extends('front::layouts.master')

@section('css')

@endsection

@section('content')
    {{ Breadcrumbs::render('news', $title) }}
    <article id="" class="pt-8 mb-20">
        <div class="w-full max-w-screen-xl mx-auto p-4">
            <div class="rounded p-8 bg-gray-100">
                <time class="inline-block bg-blue-400 text-white text-sm rounded py-1 px-2 mb-4"
                      datetime="{{ $news->created_at->format('Y-m-d') }}">
                    {{ $news->created_at->format('Y.m.d') }}
                </time>
                <h1 class="font-bold text-3xl border-b border-black mb-6 pb-4">
                    {{ $news->title }}
                </h1>
                {!! $news->body ?? '' !!}
            </div>
        </div>
    </article>
@endsection
