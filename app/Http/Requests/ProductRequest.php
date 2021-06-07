<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //'name' => 'max:100',
            //'maker' => 'max:100'
            /*
            'name'=>['required','max:100'],
            'maker'=>['required','max:100'],
            'model_id'=>['required','max:100'],
            'os'=>['required','max:50'],
            'price' => ['required','max:8'],
            'stock'=>['required','max:4'],
            'cpu'=>['required','max:50'],
            'memory'=>['required','max:50'],
            'graphic'=>['required','max:50'],
            'hdd_ssd'=>['required','max:3'],
            'hdd_ssd_space'=>['required','max:5'],
            'drive'=>['required','max:30'],
            'condition'=>['required','max:3'],
            'date'=>['required','date','after_or_equal:today']
            */
        ];
    }
}
