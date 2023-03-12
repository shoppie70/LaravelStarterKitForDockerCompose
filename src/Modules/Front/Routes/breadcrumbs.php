<?php
// Home
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', static function ($trail) {
    $trail->push('トップページ', route('index'));
});

Breadcrumbs::for('contact', static function ($trail) {
    $trail->parent('home');
    $trail->push('お問い合わせ', route('contact.index'));
});

Breadcrumbs::for('news', static function ($trail) {
    $trail->parent('home');
    $trail->push('お知らせ', route('news.index'));
});
