<?php

namespace App\Models;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delegation extends Model
{
    protected $table = "delegations";
    use HasFactory;

    protected $fillable = ['name','nickname'];

    public function villes()
    {
        return $this->hasMany(Ville::class);
    }
}
