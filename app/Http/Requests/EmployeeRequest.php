<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'surname' => 'required|string|min:3|max:100',
            'email' => 'nullable|email|min:6|max:150',
            'phone' => 'nullable|string|min:8|max:18',
            'company_id' => 'required|numeric|exists:companies,id'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Name cannot be empty',
            'name.min' => 'The name must be at least 3 letters',
            'name.max' => 'The name must be at max 100 letters',

            'surname.required' => 'Surname cannot be empty',
            'surname.min' => 'The name must be at least 3 letters',
            'surname.max' => 'The name must be at max 100 letters',

            'company_id.required' => 'Company cannot be empty',
            'company_id.exists' => 'Company not found',

            'email.min' => 'The E-Mail must be at least 6 letters',
            'email.email' => 'E-Mail is not valid',
            'email.max' => 'The E-Mail must be at max 150 letters',

            'phone.min' => 'The phone must be at least 8 letters',
            'phone.max' => 'The phone must be at max 20 letters',
        ];
    }
}
