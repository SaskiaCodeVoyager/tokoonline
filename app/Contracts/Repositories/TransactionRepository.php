<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TransactionInterface;
use App\Models\Transaction;
use App\Traits\EloquentTrait;
use Illuminate\Http\Request;

class TransactionRepository extends BaseRepository implements TransactionInterface
{
    use EloquentTrait;

    public function __construct(Transaction $model)
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
        return Transaction::find($id); // Menggunakan find, bukan findOrFail
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