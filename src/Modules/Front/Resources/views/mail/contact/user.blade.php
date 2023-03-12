@component('mail::message')
{{ $request->name }}様,<br>
お問い合わせをありがとうございました。<br>
以下、送信された内容の確認になります。

@component('mail::panel')
    ※本メールは、自動的に配信しています。<br>
    こちらのメールは送信専用のため、直接ご返信いただいてもお問い合わせにはお答えできませんので、あらかじめご了承ください。
@endcomponent

@component('mail::table')
    |   送信内容 |    |
    | ---- | ---- |
    |  お名前  |  {{ $request->name }}  |
    |  住所  |  {{ $request->postal_code ?? '' . $request->address ?? '' }}  |
    |  電話番号  |  {{ $request->tel ?? '' }}  |
    |  メールアドレス  |  {{ $request->email ?? '' }}  |
    |  お問い合わせ内容  |  {{$request->note ?? '' }}  |
@endcomponent

@endcomponent

