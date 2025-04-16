<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    // use HasFactory;

    use SoftDeletes, HasUuids;

    protected $table = 'transaction_details';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'transactions_id',
        'products_id',
        'first_name',
        'last_name', 
        'address', 
        'city', 
        'country' , 
        'zip_code',
        'phone',
        'qty'
    ];
    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id', 'transactions_id');
    }
}
