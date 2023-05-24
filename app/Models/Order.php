<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'order';
    protected $dates = ['deleted_at'];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
