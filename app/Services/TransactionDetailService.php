<?php
namespace App\Services;

use App\Models\TransactionDetail;

class TransactionDetailService
{
    public function getTransactionDetailsByTransactionId(string $transactionId)
    {
        return TransactionDetail::with(['transaction', 'product'])
            ->where('transactions_id', $transactionId)
            ->get();
    }

    public function getFirstTransactionDetailByTransactionId(string $transactionId)
    {
        return TransactionDetail::with(['transaction', 'product'])
            ->where('transactions_id', $transactionId)
            ->firstOrFail();
    }
}