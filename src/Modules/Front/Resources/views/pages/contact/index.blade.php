@extends('front::layouts.master')

@section('js')
    <script src="//yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@endsection

@section('content')
    {{ Breadcrumbs::render('contact') }}
    <section id="about_us" class="pt-16 mb-20">
        <div class="w-full max-w-screen-md mx-auto">
            <h2 class="heading--underline">
                {{ $title }}
            </h2>
            <p class="leading-7 mb-16 text-center">
                以下のフォームを入力して頂き、お問い合わせをお願いします。
            </p>
            @include('front::components.form.error')
            <form action="{{ $endpoint }}" method="{{ $method }}" class="h-adr">
                @csrf
                @method($method)
                <span class="p-country-name" style="display:none;">Japan</span>
                <div class="mx-auto mb-16 container--sm">
                    <dl class="form__dl">
                        <dt class="form__dt">
                            <span class="font-bold">お名前</span>
                            <span class="form__required">必須</span>
                        </dt>
                        <dd class="form__dd">
                            @include('front::components.form.input-text', [
                                'name' => 'name',
                                'placeholder' => '例）岡山　太郎',
                                'value' => '',
                                'required' => true,
                            ])
                        </dd>
                    </dl>
                    <dl class="form__dl">
                        <dt class="form__dt">
                        <span class="font-bold">
                            住所
                        </span>
                        </dt>
                        <dd class="form__dd">
                            <div class="mb-4">
                                <div class="flex items-center w-5/12">
                                    <div class="mr-4">
                                        〒
                                    </div>
                                    @include('front::components.form.input-zip', [
                                        'name' => 'postal_code',
                                        'value' => '',
                                    ])
                                </div>
                            </div>
                            <div>
                                @include('front::components.form.input-address', [
                                    'name' => 'address',
                                    'value' => '',
                                    'placeholder' => '※ 郵便番号を入れて頂くと自動入力されます。',
                                ])
                            </div>
                        </dd>
                    </dl>
                    <dl class="form__dl">
                        <dt class="form__dt">
                            <span class="font-bold">電話番号</span>
                        </dt>
                        <dd class="form__dd">
                            @include('front::components.form.input-tel', [
                                'name' => 'tel',
                                'placeholder' => '例）086-123-4567',
                                'value' => '',
                                'required' => false,
                            ])
                        </dd>
                    </dl>
                    <dl class="form__dl">
                        <dt class="form__dt">
                            <span class="font-bold">メールアドレス</span>
                            <span class="form__required">必須</span>
                        </dt>
                        <dd class="form__dd">
                            @include('front::components.form.input-email', [
                                'name' => 'email',
                                'placeholder' => '例）sample@example.com',
                                'value' => '',
                                'required' => true,
                            ])
                        </dd>
                    </dl>
                    <dl class="form__dl">
                        <dt class="form__dt">
                            <span class="font-bold">お問い合わせ内容</span>
                            <span class="form__required">必須</span>
                        </dt>
                        <dd class="form__dd">
                            <textarea class="form-input form-input__textarea" name="note" id="note" cols="30" rows="10" required></textarea>
                        </dd>
                    </dl>
                </div>
                <button type="submit" class="block px-16 py-4 mx-auto font-bold text-white bg-black cursor-pointer">
                    送　信
                </button>
            </form>
        </div>
    </section>
@endsection
