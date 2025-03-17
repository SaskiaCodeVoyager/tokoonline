<?php


namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;
use App\Contracts\Interfaces\Eloquents\EloquentInterface;

interface AnimeInterface extends EloquentInterface
 {
    public function latest(Request $request);
 }
