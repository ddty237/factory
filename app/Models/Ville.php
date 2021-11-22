<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Delegation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    protected $table = "villes";
    use HasFactory;

    protected $fillable = ['name'];

    protected $guarded = [];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function delegation()
    {
        return $this->belongsTo(Delegation::class);
    }
}
