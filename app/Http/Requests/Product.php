<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
            'name' => ['required','min:2','max:50'],
            'maker' => ['required','min:2','max:50'],
            'model_id' => ['required','min:2','max:50'],
            'price' => ['required','max:11'],
            'stock' => ['required','max:11'],
            'cpu' => ['required','min:2','max:50'],
            'memory' => ['required','min:2','max:30'],
            'graphic' => ['required','min:2','max:50'],
            'hdd_ssd' => ['required','min:2','max:50'],
            'hdd_ssd_space' => ['required','min:2','max:10'],
            'drive' => ['required','min:2','max:50'],
            'display' => ['required','min:2','max:50'],
            'os' => ['required','min:2','max:30'],
            'attached' => ['required','min:2','max:50'],
            'remarks' => ['required','max:200'],
            'condition' => ['required','min:2','max:5'],
            'staff_id' => ['required'],
            'new_product' => ['required','max:2'],
            'pctype' => ['required','max:11'],
            'release_at' => ['required','max:20'],
        ];
    }
}
