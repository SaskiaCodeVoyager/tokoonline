<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CheckoutInterface;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutRepository implements CheckoutInterface
{
    public function getUserCart(Request $request)
    {
        $selectedItems = is_array($request->selected_items) ? $request->selected_items : explode(',', $request->selected_items);

        $cart = Cart::whereIn('id', $selectedItems)
                    ->latest()
                    ->get();
         // Ambil transaksi terakhir

        if (!$cart) {
            return collect(); // Kembalikan collection kosong biar tidak error
        }

        return $cart ?? collect(); // Pastikan yang dikembalikan collection
    }


    public function createTransaction(Request $request)
    {
        return Transaction::create([
            'users_id' => $request->user()->id,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'pending',
        ]);
    }

    public function createTransactionDetails($carts, $transactionId, $request)
    {
        foreach ($carts as $cart) {
            if (!$cart->product) {
                throw new \Exception("Produk tidak ditemukan di cart ID: {$cart->id}");
            }

            TransactionDetail::create([
                'transactions_id' => $transactionId,
                'products_id' => $cart->product->id,
                'first_name' => $request->first_name ?? 'Guest',
                'last_name' => $request->last_name ?? '-',
                'address' => $cart->user->address ?? '-',
                'city' => $cart->user->city ?? '-',
                'country' => $cart->user->country ?? '-',
                'zip_code' => $cart->user->zip_code ?? '-',
                'phone' => $cart->user->phone ?? '-',
                'qty' => $cart->qty ?? '1',
            ]);
        }
    }

    public function getSelectedItems($userId)
    {
        return TransactionDetail::whereHas('transaction', function ($query) use ($userId) {
            $query->where('users_id', $userId);
        })->where('is_selected', true)->get();
    }
}
