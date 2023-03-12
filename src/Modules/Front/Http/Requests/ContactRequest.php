<?php

namespace Modules\Front\Http\Requests;

use App\Rules\Tel;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'contents' => 'nullable|string',
            'company_name' => 'nullable|string',
            'name' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'tel' => [
                'nullable',
                'string',
                new Tel(),
            ],
            'email' => 'required|email',
            'note' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'contents' => 'お問い合わせ内容',
            'name' => '名前',
            'company_name' => '貴社名',
            'postal_code' => '郵便番号',
            'address' => '住所',
            'tel' => '電話番号',
            'email' => 'メールアドレス',
            'note' => 'その他ご要望',
        ];
    }
}
