<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'detail';

    public function product()
    {
        return $this->belongsTo(Product::class); 
    }

    public function order()
    {
        return $this->belongsTo(Order::class); 
    }
}


