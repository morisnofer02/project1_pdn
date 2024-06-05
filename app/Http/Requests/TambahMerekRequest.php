<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahMerekRequest extends FormRequest
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
            'merek' => 'required',
            'logo' => 'required|mimes:jpg,jpeg,png'
        ];
    }

    public function messages(): array
    {
        return [
            'merek.required' => 'Merek tidak boleh kosong',
            'logo.mimes' => 'Pastikan format file sudah benar'
        ];
    }
}
