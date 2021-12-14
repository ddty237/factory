<?php

namespace App\Models;

use App\Models\SubProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function subProduct()
    {
        return $this->belongsTo(SubProduct::class,'product_sub_categorie_id');
    }
}
