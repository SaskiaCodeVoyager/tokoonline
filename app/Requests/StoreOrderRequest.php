<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan membuat request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk input order.
     */
    public function rules(): array
    {
        return [
            'user_id'           => 'required|integer|exists:users,id',
            'order_date'        => 'nullable|date',
            'total_amount'      => 'required|numeric|min:1000',
            'payment_status'    => 'required|string|max:255',
            'order_status'      => 'required|string|max:255',
            'shipping_address'  => 'required|string|max:500',
            'shipping_cost'     => 'nullable|numeric|min:0',
            'tracking_number'   => 'nullable|string|max:255',
        ];
    }

    /**
     * Custom pesan error jika validasi gagal.
     */
    public function messages(): array
    {
        return [
            'user_id.required'        => 'User ID wajib diisi.',
            'user_id.integer'         => 'User ID harus berupa angka.',
            'user_id.exists'          => 'User tidak valid.',

            'order_date.date'         => 'Tanggal order harus berupa tanggal yang valid.',

            'total_amount.required'   => 'Total pembayaran wajib diisi.',
            'total_amount.numeric'    => 'Total pembayaran harus berupa angka.',
            'total_amount.min'        => 'Total pembayaran minimal adalah Rp 1.000.',

            'payment_status.required' => 'Status pembayaran wajib diisi.',
            'payment_status.string'  => 'Status pembayaran harus berupa huruf.',

            'order_status.required'   => 'Status order wajib diisi.',
            'order_status.string'     => 'Status order harus berupa teks.',
            'order_status.max'        => 'Status order tidak boleh lebih dari 255 karakter.',

            'shipping_address.required' => 'Alamat pengiriman wajib diisi.',
            'shipping_address.string'   => 'Alamat pengiriman harus berupa teks.',
            'shipping_address.max'      => 'Alamat pengiriman tidak boleh lebih dari 500 karakter.',

            'shipping_cost.numeric'    => 'Biaya pengiriman harus berupa angka.',
            'shipping_cost.min'        => 'Biaya pengiriman minimal adalah 0.',

            'tracking_number.string'   => 'Nomor pelacakan harus berupa teks.',
            'tracking_number.max'      => 'Nomor pelacakan tidak boleh lebih dari 255 karakter.',
        ];
    }
}
