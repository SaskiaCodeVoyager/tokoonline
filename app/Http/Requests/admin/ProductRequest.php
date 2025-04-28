<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'photos' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' => 'required|integer|min:1',
            'quality' => 'required|string|min:3|max:100',
            'thumb_description' => 'required|string|min:5|max:255',
            'short_description' => 'required|string|min:10|max:500',
            'long_description' => 'required|string|min:20',
            'price' => 'required|integer|min:1',
            'weight' => 'required|numeric|min:0.1',
            'check' => 'required|string|min:3|max:50',
            'country_of_origin' => 'required|string|min:2|max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    
}
