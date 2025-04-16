<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    private CheckoutService $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $checkouts = $this->checkoutService->getUserCart($request);

        // dd($checkouts);

        return view('pages.checkout', [
            'checkouts' => $checkouts
        ]);
    }

    /**
     * Process the checkout.
     */
public function process(Request $request)

{
    // Ambil inputan selected_items dan pastikan bentuknya array
    $selectedItems = $request->input('selected_items', []);

    if (!is_array($selectedItems) || count($selectedItems)) {
        return redirect()->back()->with('error', 'Silakan pilih produk sebelum checkout!');
    }

    try {
        $transaction = $this->checkoutService->handleCheckout($request, $selectedItems);
        return redirect()->route('success')->with('success', 'Checkout berhasil!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Ambil data produk yang dipilih
    $selectedItems = $request->input('qty'); // Pastikan ini sesuai dengan name input di form

    // Cek apakah ada produk yang dipilih
    if (empty($selectedItems) || !is_array($selectedItems) || count(array_filter($selectedItems)) == 0) {
        return redirect()->back()->with('error', 'Silakan pilih produk sebelum checkout!');
    }

    // Lanjut ke proses checkout kalau valid
    return redirect()->route('success')->with('success', 'Checkout berhasil!');
}


    /**
     * Display the success page.
     */
    public function success()
    {
        return view('pages.success');
    }
}