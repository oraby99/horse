<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CountryRequest extends FormRequest
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
            //
            'logo'=>'image',
            'sign'=>'required|string|max:3',
            'ar.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('countries_translations', 'name')->ignore($this->route('id'), 'country_id')
            ],
            'en.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('countries_translations', 'name')->ignore($this->route('id'), 'country_id')
            ],
        ];
    }
}
