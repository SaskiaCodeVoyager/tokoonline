<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('category_photos', 'public');
            $data['photo'] = $photoPath;
        }

        Category::create($data);

        return redirect()->route('category')->with('success', 'category created successfully.');
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

        // Jika ada file foto baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama
            if ($item->photo) {
                Storage::disk('public')->delete($item->photo);
            }

            // Simpan foto baru
            $photoPath = $request->file('photo')->store('category_photos', 'public');
            $data['photo'] = $photoPath;
        }


        $item->update($data);

        return redirect()->route('category')->with('success', 'category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Temukan kategori berdasarkan ID
    $category = Category::findOrFail($id);

    // Cek apakah kategori memiliki produk terkait
    if ($category->products()->exists()) {
        return redirect()->back()->withErrors([
            'msg' => 'Category cannot be deleted because it has associated products.'
        ]);
    }

    // Hapus foto terkait sebelum menghapus kategori
    if ($category->photo) {
        Storage::disk('public')->delete($category->photo);
    }

    // Hapus kategori beserta produk jika user memilih menghapus semuanya
    $category->products()->forceDelete(); // atau forceDelete jika ingin permanen
    $category->forceDelete();

    return redirect()->route('category')->with('success', 'category and products deleted successfully.');
}



}
