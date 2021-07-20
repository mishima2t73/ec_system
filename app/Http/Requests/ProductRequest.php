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
