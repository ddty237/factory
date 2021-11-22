<?php

namespace App\Models;

use App\Models\Ville;
use App\Models\Categorie;
use App\Models\Delegation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'ville_id',
        'code_postal',
        'adresse',
        'phone',
        'compte_auxilliaire',
        'categorie_id',
        'scan_titre',
        'reference_titre',
        'user_id'
    ];

    protected $guarded = [];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function dataBilling()
    {
        return $this->hasMany(BillingDataController::class);
    }
}
