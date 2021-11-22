<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProduct extends Model
{
    protected $table = "product_sub_categories";
    use HasFactory;
    protected $fillable = ['product_id','product_description'];
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function dataBilling()
    {
        return $this->hasMany(BillingDataController::class);
    }

}
