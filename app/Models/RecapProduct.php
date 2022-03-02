<?php

namespace App\Models;

use App\Models\Direction;
use App\Models\DataFacturation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecapProduct extends Model
{

    protected $table = "recap_products";
    use HasFactory;

    protected $fillable = ['name','description','direction_id'];

    public function dataBilling()
    {
        return $this->belongsTo(DataFacturation::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}
