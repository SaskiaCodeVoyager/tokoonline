<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ProductInterface;
use App\Models\Product;
use App\Traits\EloquentTrait;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductInterface
{
    use EloquentTrait;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function latest(Request $request)
    {
        return $this->model->query()->latest()
            ->when($request->input('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->input('search') . '%');
            });
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function edit($id, array $data)
    {
        $item = $this->findById($id);
        return $item->update($data);
    }

    public function destroy($id)
    {
        $item = $this->findById($id);
        return $item->delete();
    }

    public function all()
    {
        return $this->model->all(); // Menggunakan instance model yang sudah diinisialisasi
    }
}