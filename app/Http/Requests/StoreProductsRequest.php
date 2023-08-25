<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
            'kode' => 'required|unique:products,id_barang|min:7|max:7',
            'namabarang' => 'required',
            'stokmasuk' => 'required|numeric',
            'hpp' => 'required|numeric',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'penitip' => 'required',
            'stand' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Data :attribute harus diisi',
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
            'kode' => 'Kode Barang',
            'namabarang' => 'Nama Barang',
            'stokmasuk' => 'Stok Masuk',
            'hpp' => 'HPP/Harga Jual',
            'kategori' => 'Kategori',
            'penitip' => 'Penitip',
            'stand' => 'Stand',
        ];
    }
}
