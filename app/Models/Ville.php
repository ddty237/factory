<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = "villes";
    use HasFactory;

    protected $fillable = ['name'];

    protected $guarded = [];
}
