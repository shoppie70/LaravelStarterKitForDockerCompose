<?php

namespace Modules\Admin\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'email' => 'nullable|string',
            'password' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '職員名',
            'email' => 'メールアドレス',
            'password' => 'パスワード'
        ];
    }
}
