<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;
use App\Contracts\Interfaces\Eloquents\EloquentInterface;

interface TransactionInterface extends EloquentInterface
 {
   public function latest(Request $request);
   public function findById($id);
   public function create(array $data);
   public function edit($id, array $data);
   public function destroy($id); // Pastikan ada parameter $id
   public function all(); 
 }
 
