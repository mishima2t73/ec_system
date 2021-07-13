<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class address_update_request extends FormRequest
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
            'post_code' =>['min:7','required'],
            'prefecture' =>['min:3','required'],
            'city' =>['required'],
            'address' =>['required'],
        ];
    }
}
