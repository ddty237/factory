<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubproductObservation extends Model
{
    protected $table = "subproduct_observation";
    use HasFactory;
    protected $fillable = [
        'product_id',
        'data_facturation_id',
        'product_sub_categorie_id',
        'observation',
        'montant'
    ];
    protected $guarded = [];
}
