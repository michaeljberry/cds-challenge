<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
            'fname'                 => 'required|string|max:30',
            'lname'                 => 'required|string|max:30',
            'phone'                 => 'required|phone:US',
            'email'                 => 'email|required|string|max:50',
            'promo_code'            => 'alpha_num:ascii',
            'other'                 => 'required_if:reference,Other',
            'terms_and_conditions'  => 'required',
            'reference'             => 'required_without:promo_code'
        ];
    }

    public function messages()
    {
        return [
            'fname.required'                => 'The first name field is required.',
            'lname.required'                => 'The last name field is required.',
            'reference.required_without'    => 'The reference field is required when promo code is empty.',
            'other.required_if'             => 'Please specify your other answer.'
        ];
    }
}
