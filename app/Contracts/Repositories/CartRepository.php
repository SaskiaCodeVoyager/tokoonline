<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CartInterface;
use App\Models\Cart;
use App\Traits\EloquentTrait;
use Illuminate\Http\Request;

class CartRepository extends BaseRepository implements CartInterface
{

  use EloquentTrait;
  public function __construct(Cart $model)
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
      return Cart::findOrFail($id);
  }
  
  public function getAllOrdered($column, $direction)
  {
      return Cart::orderBy($column, $direction);
  }

  public function create(array $data)
    {
        return Cart::create($data);
    }

    public function all()
    {
        return $this->model->all(); // Menggunakan instance model yang sudah diinisialisasi
    }


}
