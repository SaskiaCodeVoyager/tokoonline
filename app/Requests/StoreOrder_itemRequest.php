<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder_itemRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan membuat request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk input order item.
     */
    public function rules(): array
    {
        return [
            'order_id'   => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'price'      => 'required|numeric|min:0',
            'subtotal'   => 'required|numeric|min:0',
        ];
    }

    /**
     * Custom pesan error jika validasi gagal.
     */
    public function messages(): array
    {
        return [
            'order_id.required'   => 'Order ID wajib diisi.',
            'order_id.integer'    => 'Order ID harus berupa angka.',
            'order_id.exists'     => 'Order tidak valid.',

            'product_id.required' => 'Product ID wajib diisi.',
            'product_id.integer'  => 'Product ID harus berupa angka.',
            'product_id.exists'   => 'Produk tidak valid.',

            'quantity.required'   => 'Jumlah produk wajib diisi.',
            'quantity.integer'    => 'Jumlah produk harus berupa angka.',
            'quantity.min'        => 'Jumlah produk minimal adalah 1.',

            'price.required'      => 'Harga produk wajib diisi.',
            'price.numeric'       => 'Harga produk harus berupa angka.',
            'price.min'           => 'Harga produk minimal adalah 0.',

            'subtotal.required'   => 'Subtotal wajib diisi.',
            'subtotal.numeric'    => 'Subtotal harus berupa angka.',
            'subtotal.min'        => 'Subtotal minimal adalah 0.',
        ];
    }
}