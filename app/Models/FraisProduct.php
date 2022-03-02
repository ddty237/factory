<?php

namespace App\Models;

use App\Models\DataFacturation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FraisProduct extends Model
{
    protected $table = "frais_products";
    use HasFactory;

    protected $fillable = ['name','description','resource_id','montant'];
}
