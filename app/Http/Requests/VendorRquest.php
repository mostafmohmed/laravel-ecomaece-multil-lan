<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRquest extends FormRequest
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
            'logo'=>'requierd_without:id|mimes:jpg,jpeg,png',
            'name'=>'requierd|string|max:100',
            'email'=>'sametimes|nullable|email',
            'mobile'=>'requierd|max:100',
           // 'category_id'=>'requierd|exists:main__catagotiries,id'
        ];
    }
}
