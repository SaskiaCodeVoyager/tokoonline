<?php
namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface CheckoutInterface
{
    public function createTransaction(Request $request);
    public function createTransactionDetails(Request $request, $transactionId);
    public function clearCart($userId);
    public function getUserCart($userId);
}
