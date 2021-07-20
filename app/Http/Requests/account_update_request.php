<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class account_update_request extends FormRequest
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
            //
            'name' =>['min:2','required'],
            'email' =>['email','required'],
            'tel' =>['numeric','required'],
        ];
    }
    public function messages()
{
    return [
        'name.min' => '２文字以上入力してください',
    ];
}
}
