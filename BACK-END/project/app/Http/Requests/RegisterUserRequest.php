<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | string',
			'email' => 'required | email | string | unique:users,email',
			'password' => 'required | confirmed',
            'role_id' => 'required'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['role_id' => 2]);
    }
}
