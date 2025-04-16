<?php
namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface CheckoutInterface
{
    public function createTransaction(Request $request);
    public function createTransactionDetails($carts, $transactionId, Request $request);

    public function getUserCart(Request $request);
    public function getSelectedItems($userId);
}
