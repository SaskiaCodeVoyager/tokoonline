<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan membuat request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk input produk.
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:1000',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'anime_id'    => 'required|exists:animes,id',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'weight'      => 'required|numeric|min:1',
        ];
    }

    /**
     * Custom pesan error jika validasi gagal.
     */
    public function messages(): array
    {
        return [
            'name.required'        => 'Nama produk wajib diisi.',
            'name.string'          => 'Nama produk harus berupa teks.',
            'name.max'             => 'Nama produk tidak boleh lebih dari 255 karakter.',

            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga produk harus berupa angka.',
            'price.min'            => 'Harga minimal adalah Rp 1.000.',

            'stock.required'       => 'Stok produk wajib diisi.',
            'stock.integer'        => 'Stok harus berupa angka bulat.',
            'stock.min'            => 'Stok minimal adalah 0.',

            'category_id.required' => 'Pilih kategori produk.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',

            'anime_id.required'    => 'Pilih anime terkait.',
            'anime_id.exists'      => 'Anime yang dipilih tidak valid.',

            'image.image'      => 'File yang diunggah harus berupa gambar.',
            'image.mimes'      => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max'        => 'Ukuran gambar maksimal adalah 2MB.',

            'weight.required'      => 'Berat produk wajib diisi.',
            'weight.numeric'       => 'Berat harus berupa angka.',
            'weight.min'           => 'Berat minimal adalah 1 gram.',
        ];
    }
}
