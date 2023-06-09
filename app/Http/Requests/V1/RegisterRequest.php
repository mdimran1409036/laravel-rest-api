<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|confirmed',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'password_confirmation' => $this->passwordConfirmation
        ]);
    }
}
