<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RarnRecapitulatives extends Model
{
    protected $table = "rarn_recapitulatives";
    use HasFactory;

    protected $guarded = [];

    public function rarnProduct()
    {
        return $this->belongsTo(RarnProduct::class,'format');
    }
}
