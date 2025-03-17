<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CartInterface;
use App\Contracts\Repositories\CartRepository;
use App\Contracts\Repositories\ProductRepository;
use App\Http\Requests\StoreCartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    private CartInterface $cartInterface;
    private CartService $cartService;
    private ProductRepository $productRepository;
    
    public function __construct(
        CartInterface $cartInterface,
        CartService $cartService,
        ProductRepository $productRepository
    ) {
        $this->cartInterface = $cartInterface;
        $this->cartService = $cartService;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        // Retrieve all ordered carts with pagination
        $carts = $this->cartInterface->getAllOrdered('created_at', 'desc')->paginate(20);
        
        // Retrieve all products
        $products = $this->productRepository->all();
    
        // Return the view with carts and products
        return $this->renderCartView($carts, $products);
    }
    
    /**
     * Render the cart view with the provided carts and products.
     *
     * @param mixed $carts
     * @param mixed $products
     * @return \Illuminate\View\View
     */
    protected function renderCartView($carts, $products)
    {
        return view('pages.cart', compact('carts', 'products'));
    }

    public function add($id)
    {
        // Logic to add item to cart
        // You may want to implement this method based on your application's requirements
    }

    public function delete($id)
    {
        try {
            $this->cartInterface->delete($id);
            return redirect()->route('cart')->with('success', 'Order berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Gagal menghapus order: ' . $e->getMessage());
        }
    }
}