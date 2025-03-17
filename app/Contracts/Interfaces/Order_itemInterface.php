<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;
use App\Contracts\Interfaces\Eloquents\EloquentInterface;

interface Order_itemInterface extends EloquentInterface
 {
    public function latest(Request $request);
    public function findById($id);
    public function getAllOrdered($column, $direction);
    public function create(array $data);
 }
