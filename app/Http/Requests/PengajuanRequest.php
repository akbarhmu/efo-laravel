<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PengajuanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address'                       => 'required',
            'domicile_address'              => 'required',
            'domicile_rt_rw'                => 'required',
            'file_scan_ktp'                 => 'required|mimes:jpg,png,jpeg,pdf',
            'file_scan_dpt'                 => 'required|mimes:jpg,png,jpeg,pdf',
            'file_recommendation_letter'    => 'required|mimes:jpg,png,jpeg,pdf',
        ];
    }
}
