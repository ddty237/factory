<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFacturation extends Model
{
    protected $table = "data_facturation";
    use HasFactory;

    protected $guarded = [];
}
