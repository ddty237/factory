<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    protected $table = "factures";
    use HasFactory;

    protected $fillable = ['numero_facture','arriere','data_facturation_id','periode','status_id'];

    public function status()
    {
        return $this->hasOne(Status::class);
    }
}
