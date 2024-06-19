<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'image' => 'file|max:3000|nullable|mimes:jpg,bmp,png',
            'name' => 'required|max:50',
            'description' => 'nullable|max:5000',
            'price' => 'required|numeric',
            'visible' => 'required|boolean',
            'discount' => 'nullable|numeric|min:0|max:100',
            'featured' => 'required|boolean',
        ];
    }
}

