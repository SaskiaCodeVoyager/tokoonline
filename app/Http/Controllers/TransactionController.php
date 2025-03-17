<?php

// app/Http/Controllers/TransactionController.php
namespace App\Http\Controllers;

use App\Services\TransactionService;
use App\Services\TransactionDetailService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionService;
    protected $transactionDetailService;

    public function __construct(TransactionService $transactionService, TransactionDetailService $transactionDetailService)
    {
        $this->transactionService = $transactionService;
        $this->transactionDetailService = $transactionDetailService;
    }

    public function index()
    {
        $query = $this->transactionService->getAllTransactions();
    
        return view('pages.admin.transaction.index', [
            'query' => $query
        ]);
    }

    public function create()
    {
        // Logic for creating a transaction
    }

    public function store(Request $request)
    {
        // Logic for storing a transaction
    }

    public function show(string $id)
    {
        // Logic for showing a transaction
    }

    public function edit(string $transactions_id)
    {
        $transaction = $this->transactionService->findTransactionById($transactions_id); // Fetch the transaction
        $items = $this->transactionDetailService->getFirstTransactionDetailByTransactionId($transactions_id);
        $itemDetails = $this->transactionDetailService->getTransactionDetailsByTransactionId($transactions_id);
        
        return view('pages.admin.transaction.edit', [
            'transaction' => $transaction, // Pass the transaction to the view
            'items' => $items,
            'itemDetails' => $itemDetails
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $this->transactionService->updateTransaction($id, $data);

        return redirect()->route('transaction');
    }

    public function destroy(string $id)
    {
        // Logic for deleting a transaction
    }
}