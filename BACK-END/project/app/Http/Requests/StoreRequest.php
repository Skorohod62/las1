<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required',
            'image' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required'
        ];
    }

    public function prepareForValidation()
    {
        $path = $this->file('image0')->store('public');
        $this->merge(['image' => $path]);
    }
}
