<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\OrderInterface;
// use App\Contracts\Interfaces\ProductInterface;
use App\Models\Order;
use App\Traits\EloquentTrait;
use Illuminate\Http\Request;

class OrderRepository extends BaseRepository implements OrderInterface
{

  use EloquentTrait;
  public function __construct(Order $model)
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
      return Order::findOrFail($id);
  }
  
  public function getAllOrdered($column, $direction)
  {
      return Order::orderBy($column, $direction);
  }

  public function create(array $data)
    {
        return Order::create($data);
    }

    public function all()
    {
        return $this->model->all(); // Menggunakan instance model yang sudah diinisialisasi
    }


}
