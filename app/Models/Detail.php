<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'detail';
    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class); 
    }

    public function order()
    {
        return $this->belongsTo(Order::class); 
    }
}


