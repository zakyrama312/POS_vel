<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'jml' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute diisi dulu bang',
            'unique' => 'Data sudah ada',
            'min' => 'Jumlah karakter kurang',
            'max' => 'Jumlah karakter terlalu panjang',
            'email' => 'Harus berupa Email',
            'numeric' => 'Harus berupa Nomor'
        ];
    }
    public function attributes(): array
    {
        return [
            'jml' => 'Jumlah',
        ];
    }
}
