<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;

    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name', 'slug', 'photo'
    ];

    protected $hidden = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'categories_id'); // Assuming your related model is Product
    }
}
