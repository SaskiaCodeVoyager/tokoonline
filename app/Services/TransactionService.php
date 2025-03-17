<?php
namespace App\Services;

use App\Models\Transaction;
use Illuminate\Pagination\LengthAwarePaginator;

class TransactionService
{
    public function getAllTransactions(int $perPage = 10): LengthAwarePaginator
    {
        return Transaction::with(['transactionDetail'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function findTransactionById(string $id): Transaction
    {
        return Transaction::findOrFail($id);
    }

    public function updateTransaction(string $id, array $data): Transaction
    {
        $transaction = $this->findTransactionById($id);
        $transaction->update($data);
        return $transaction;
    }
}