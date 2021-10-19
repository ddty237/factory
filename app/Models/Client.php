<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function delegation()
    {
        return $this->hasOne(Delegation::class);
    }

    public function categorie()
    {
        return $this->hasOne(Categorie::class);
    }
}
