<?php

namespace App\Services;

use App\Contracts\Interfaces\CheckoutInterface;
use Illuminate\Http\Request;

class CheckoutService
{
    private CheckoutInterface $checkoutRepository;

    public function __construct(CheckoutInterface $checkoutRepository)
    {
        $this->checkoutRepository = $checkoutRepository;
    }

    public function handleCheckout(Request $request)
    {
        // Create a transaction
        $transaction = $this->checkoutRepository->createTransaction($request);

        // Create transaction details
        $this->checkoutRepository->createTransactionDetails($request, $transaction->id);

        // Clear the user's cart
        $this->checkoutRepository->clearCart($request->user()->id);

        return $transaction;
    }
}
