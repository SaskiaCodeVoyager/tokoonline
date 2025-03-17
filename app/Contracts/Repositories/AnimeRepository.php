<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AnimeInterface;
use App\Models\Anime;
use App\Traits\EloquentTrait;
use Illuminate\Http\Request;

class AnimeRepository extends BaseRepository implements AnimeInterface
{

  use EloquentTrait;
  public function __construct(Anime $model)
  {
      $this->model = $model;
  }

  public function latest(Request $request){
      $this->model->query()->latest()
      ->when($request->input('search'),function($query) use ($request){
          $query->where('title',($request->input('search') ?? ''));
      });
  }
  
  public function all()
  {
      return $this->model->all(); // ✅ Pastikan metode all() ada
  }
}
