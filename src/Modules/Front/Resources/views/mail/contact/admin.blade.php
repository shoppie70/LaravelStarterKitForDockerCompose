@component('mail::message')
{{ $request->name }}様より、お問い合わせがありました。<br>
以下、内容になります。

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
