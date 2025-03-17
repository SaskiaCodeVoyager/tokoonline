<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\Order_itemInterface;
// use App\Contracts\Interfaces\ProductInterface;
use App\Models\Order_item;
use App\Traits\EloquentTrait;
use Illuminate\Http\Request;

class Order_itemRepository extends BaseRepository implements Order_itemInterface
{

  use EloquentTrait;
  public function __construct(Order_item $model)
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
      return Order_item::findOrFail($id);
  }
  
  public function getAllOrdered($column, $direction)
  {
      return Order_item::orderBy($column, $direction);
  }

  public function create(array $data)
    {
        return Order_item::create($data);
    }


}
