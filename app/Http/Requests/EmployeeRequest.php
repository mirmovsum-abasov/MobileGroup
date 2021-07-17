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
}
