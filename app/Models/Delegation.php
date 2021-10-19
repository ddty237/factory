<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delegation extends Model
{
    protected $table = "delegations";
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
