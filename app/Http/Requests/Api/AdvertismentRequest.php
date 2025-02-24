<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class AdvertismentRequest extends FormRequest
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
            'name'=>'required|string',
            'type'=>'required',
            'description'=>'nullable',
            'country_id'=>'required',
            'price'=>'required',
            'phone'=>'required',
            'plan_id'=>'nullable',
            'category_id'=>'required',
            'age'=>'nullable',
            'images'=>'nullable',
            'videos'=>'nullable',
            'ads_type'=>'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'=> 403,
            'message'=> 'Validation errors',
            'data'=> $validator->errors()
        ],403));
    }
}
