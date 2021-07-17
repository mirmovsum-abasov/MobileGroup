<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'logo' => 'nullable|image|mimes:jpg,png,gif,jpeg,webp',
            'website' => 'nullable|string|min:5|max:100',
            'email' => 'nullable|email|min:6|max:150'
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
            'website.min' => 'The WEBSITE must be at least 6 letters',
            'email.min' => 'The E-Mail must be at least 5 letters',
            'logo.mimes' => 'The logo is wrong. JPG,PNG,Gif,Jpeg,Webp'
        ];
    }
}
