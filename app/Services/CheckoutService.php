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

    public function getUserCart(Request $request)
    {
        return $this->checkoutRepository->getUserCart($request);
    }

public function handleCheckout(Request $request, $selectedItems = [])
{
    // Ambil dari request jika kosong
    $selectedItems = $selectedItems ?: $request->input('selected_items', []);

    // Validasi ulang selectedItems
    if (!is_array($selectedItems) || empty($selectedItems)) {
        throw new \InvalidArgumentException('Silakan pilih produk sebelum checkout.');
    }

    // Pastikan semua item di dalam array adalah angka (ID produk yang valid)
    foreach ($selectedItems as $item) {
        if (!is_numeric($item)) {
            throw new \InvalidArgumentException('Selected items harus berisi ID yang valid.');
        }
    }

    // Ambil cart berdasarkan ID yang dipilih
    $carts = $this->checkoutRepository->getUserCart($request)->whereIn('id', $selectedItems);

    if ($carts->isEmpty()) {
        throw new \InvalidArgumentException('Tidak ada produk yang ditemukan di keranjang.');
    }

    // Buat transaksi
    $transaction = $this->checkoutRepository->createTransaction($request);
    
    // Buat detail transaksi
    $this->checkoutRepository->createTransactionDetails($carts, $transaction->id, $request);

    return $transaction;
}


    
    public function getSelectedItems($userId)
    {
        return $this->checkoutRepository->getSelectedItems($userId);
    }


}
