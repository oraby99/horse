<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
                Rule::unique('plan_translations', 'name')->ignore($this->route('id'), 'plan_id')
            ],
            'en.name'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('plan_translations', 'name')->ignore($this->route('id'), 'plan_id')
            ],
            'ar.description'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('plan_translations', 'description')->ignore($this->route('id'), 'plan_id')
            ],
            'en.description'=>[
                'required',
                'string',
                'max:191',
                'min:3',
                Rule::unique('plan_translations', 'description')->ignore($this->route('id'), 'plan_id')
            ],
            'time' =>'required|numeric',
            'price'=>'required|numeric',

        ];
    }
}
