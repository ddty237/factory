<?php

namespace App\Models;


use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    protected $table = "categories";
    use HasFactory;

    protected $guarded = [];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
