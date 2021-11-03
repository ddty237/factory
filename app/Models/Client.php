<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Delegation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'delegation_id',
        'code_postal',
        'adresse',
        'phone',
        'compte_auxilliaire',
        'categorie_id',
        'scan_titre',
        'reference_titre',
    ];

    protected $guarded = [];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function delegation()
    {
        return $this->belongsTo(Delegation::class);
    }

    public function dataBilling()
    {
        return $this->hasMany(BillingDataController::class);
    }
}
