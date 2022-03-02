<?php

namespace App\Models;

use App\Models\RarnRecapitulatives;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BillingDataController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RarnProduct extends Model
{
    protected $table = "rarn_products";
    use HasFactory;

    protected $fillable = ['bloc_numero','format_id','quantites','date_attribution','data_facturation_id'];

    public function DataFacturation()
    {
        return $this->belongsTo(BillingDataController::class,'id','data_facturation_id');
    }

    public function nameRarnProduct()
    {
        return $this->belongsTo(RarnRecapitulatives::class,'format_id');
    }
}
