<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class launguageupdate extends FormRequest
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
            'name'=>'required|string|max:100', 
            'abbr'=>'required|string|max:100', 
               //'direction'=> 'required|in:rtl,ltr',
               //'active'=>'required|in:0,1',
                             
        ];
    }
}
