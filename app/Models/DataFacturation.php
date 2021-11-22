<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataFacturation extends Model
{
    protected $table = "data_facturation";
    use HasFactory;

    protected $fillable = ['client_id','product_id','montant_facture','observation_general'];
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produit()
    {
        return $this->belongsTo(Product::class);
    }

    public function subProduct()
    {
        return $this->belongsTo(SubProduct::class);
    }
}
