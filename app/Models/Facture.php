<?php

namespace App\Models;

use App\Models\Status;
use App\Models\DataFacturation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    protected $table = "factures";
    use HasFactory;

    protected $fillable = ['numero_facture','arriere','data_facturation_id','periode','status_id'];

    public function status()
    {
        return $this->hasOne(Status::class,'id','status_id');
    }

    public function data_facturation()
    {
        return $this->hasMany(DataFacturation::class,'id','data_facturation_id');
    }
}
