<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
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
            'name'  => 'required',
            'nik'   => 'required|numeric|digits:16|unique:users,nik',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'birth_date'    => 'required|date',
            'password'      => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ];
    }
}
