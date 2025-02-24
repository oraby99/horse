<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CampRequest extends FormRequest
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
                Rule::unique('camp_translations', 'name')->ignore($this->route('id'), 'camp_id')
            ],
            'en.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('camp_translations', 'name')->ignore($this->route('id'), 'camp_id')
            ],
            'ar.description'=>[
                'required',
                 ],
            'en.description'=>[
                'required',
               ],
            'images'=>'nullable',
            'videos'=>'nullable',
            'category_id'=>'required',
            'country_id'=>'required',
            'level'=>'array',
            'level_total'=>'array',
            'sport'=>'array',
            'sport_total'=>'array',

        ];
    }
}
