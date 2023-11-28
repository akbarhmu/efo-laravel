<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'nik'   => 'required|numeric|digits:16|unique:users,nik,' . auth()->user()->id,
            'email' => 'required|email:rfc,dns|unique:users,email,' . auth()->user()->id,
            'birth_date'    => 'required|date',
            'gender'        => 'required|in:Laki-Laki,Perempuan',
            'address'       => 'required',
            'tps_address'   => 'required',
            'tps_number'    => 'required|numeric',
        ];
    }
}
