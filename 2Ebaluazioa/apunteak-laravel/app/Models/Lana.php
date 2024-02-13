<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lana extends Model
{
    use HasFactory;

    public function pertsona(){
        return $this->belongsTo(Pertsona::class);
    }
}
