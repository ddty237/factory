<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Facture;
use App\Models\RarnProduct;
use App\Models\FraisProduct;
use App\Models\RecapProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataFacturation extends Model
{
    protected $table = "data_facturation";
    use HasFactory;

    protected $fillable = ['client_id','product_id','montant_facture','observation_general','reference_contrat','scan_donnee','scan_contrat','user_id','recap_products_id'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(RecapProduct::class,'recap_products_id');
    }

    public function rarns()
    {
        return $this->hasMany(RarnProduct::class);
    }

    public function observations()
    {
        return $this->hasMany(SubproductObservation::class);
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function frais()
    {
        return $this->hasMany(FraisProduct::class,'resource_id');
    }
}
