<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $table = "directions";
    use HasFactory;

    protected $guarded = [];
}
