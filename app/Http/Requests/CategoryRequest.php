<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CategoryRequest extends FormRequest
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
            'image'=>'image|mimes:jpeg,png,jpg',
            'parent_id'=>'nullable',
            'has_child'=>'nullable',
            'ar.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('category_translations', 'name')->ignore($this->route('id'), 'category_id')
            ],
            'en.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('category_translations', 'name')->ignore($this->route('id'), 'category_id')
            ],
        
        ];
    }
}
