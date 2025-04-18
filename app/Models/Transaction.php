<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    // use HasFactory;

    use SoftDeletes, HasUuids;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'users_id', 
        'transaction_status', 
        'total_price',
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'id', 'transaction_detail_id');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, TransactionDetail::class, 'transactions_id', 'id', 'id', 'products_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

}
