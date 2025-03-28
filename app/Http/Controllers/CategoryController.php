<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Category::paginate(10);

        return view('pages.admin.category.index', [
            'query' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        Category::create($data);

        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Category::findOrFail($id);

        return view('pages.admin.category.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $item = Category::findOrFail($id);

        $item->update($data);

        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Temukan kategori berdasarkan ID
    $category = Category::findOrFail($id);

    // // Cek apakah kategori digunakan dalam produk lain menggunakan query langsung
    // if ($category->products()->exists()) {
    //     return redirect()->back()->withErrors(['msg' => 'Kategori ini tidak bisa dihapus karena sedang digunakan dalam produk.']);
    // }

    // Hapus kategori jika tidak digunakan
    $category->delete();

    // Redirect kembali ke halaman kategori dengan pesan sukses
    return redirect()->route('category')->with('success', 'Kategori berhasil dihapus.');
}


}
