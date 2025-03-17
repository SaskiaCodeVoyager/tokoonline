<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Http\Requests\admin\ProductRequest;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Repositories\CategoryRepository;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private ProductInterface $productInterface;
    private CategoryRepository $categoryRepository;

    public function __construct(
        ProductInterface $productInterface,
        CategoryRepository $categoryRepository
        )
    {
        $this->productInterface = $productInterface;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->productInterface->latest(request())->paginate(10);
        $categories = $this->categoryRepository->all();
        return view('pages.admin.product.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all(); // Misalkan Anda menambahkan metode ini di repository
        return view('pages.admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        $this->productInterface->create($data);
// Menambahkan pesan flash untuk memberi tahu pengguna
    session()->flash('success', 'Produk berhasil disimpan.');

    return redirect()->route('product');
    }

    public function edit($id)
    {
        $item = $this->productInterface->findById($id);
        $categories = $this->categoryRepository->all();
        return view('pages.admin.product.edit', compact('item', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('photos')) {
            $data['photos'] = $request->file('photos')->store('assets/product', 'public');
        }

        $this->productInterface->update($id, $data);

        return redirect()->route('product');
    }

    public function destroy(string $id)
    {
        $this->productInterface->delete($id);
        return redirect()->route('product');
    }
}