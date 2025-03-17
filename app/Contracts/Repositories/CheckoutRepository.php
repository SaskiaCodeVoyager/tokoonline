<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CheckoutInterface;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutRepository implements CheckoutInterface
{
    public function getUserCart($userId)
    {
        return Cart::with(['product', 'user'])->where('users_id', $userId)->get();
    }

    public function createTransaction(Request $request)
    {
        return Transaction::create([
            'users_id' => $request->user()->id,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'pending',
        ]);
    }

    public function createTransactionDetails(Request $request, $transactionId)
    {
        // Check if $request->carts is set and is an array
        if (isset($request->carts) && is_array($request->carts)) {
            foreach ($request->carts as $cart) {
                TransactionDetail::create([
                    'transactions_id' => $transactionId,
                    'products_id' => $cart->product->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'zip_code' => $request->zip_code,
                    'phone' => $request->phone,
                    'qty' => $cart->qty,
                ]);
            }
        } else {
            // Handle the case where carts is not set or is not an array
            // You can throw an exception, return an error response, or log the error
            throw new \InvalidArgumentException('Carts data is required and must be an array.');
        }
    }
    public function clearCart($userId)
    {
        Cart::where('users_id', $userId)->delete();
    }
}
