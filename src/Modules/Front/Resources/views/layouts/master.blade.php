<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,nofollow">
        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ asset('assets/front/css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">

        @yield('css')
    </head>
    <body class="min-h-screen">
        <header id="header" class="header">
            @include('front::partials.top_nav')
            @include('front::partials.header')
        </header>
        <main>
            <article>
                @yield('content')
            </article>
        </main>
        <footer>
            @include('front::partials.footer')
        </footer>

        <script src="{{ asset('assets/front/js/app.js') }}"></script>
        @yield('js')

    </body>
</html>
