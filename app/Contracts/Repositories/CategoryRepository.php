<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Traits\EloquentTrait;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    use EloquentTrait;

    public function __construct(Category $model)
    {// Pastikan ini memanggil konstruktor dari BaseRepository
        $this->model = $model;
    }

    public function latest(Request $request)
    {
        return $this->model->latest()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->input('search') . '%');
            });
    }

    public function all()
    {
        return $this->model->all(); // Menggunakan instance model yang sudah diinisialisasi
    }
}
