<?php

namespace App\Models;

use App\Models\Direction;
use App\Models\SubProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function subProducts()
    {
        return $this->hasMany(SubProduct::class);
    }
}
