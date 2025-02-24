<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;

class ads extends FormRequest
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
            'name'         => 'required',
            'description'  => 'required',
           'location'     => 'required',
           'price'        => 'required',
           'category_id'  => 'required',
           'user_id'      => 'required',
           'plan_id'      => 'required',
           'country_id'   => 'required',
           'age'          => 'required',
           'phone'        => 'required',
           'ads_type'     => 'required',
           'type'         => 'required',
        ];
    }
}
