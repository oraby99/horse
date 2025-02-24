<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ar.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('product_translations', 'name')->ignore($this->route('id'), 'product_id')
            ],
            'en.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('product_translations', 'name')->ignore($this->route('id'), 'product_id')
            ],
            'category_id'=>'required',
            'images'=>'nullable',
            'videos'=>'nullable',
            'deliver_time'=>'nullable',
            'size'=>'nullable',
            'price'=>'required',
            'colors'=>'nullable',
            'ar.description'=>[
                'required',
                 ],
            'en.description'=>[
                'required',
               ],
       
            
        ];
    }
}
