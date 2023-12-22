<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertsona extends Model
{
    use HasFactory;

    public function atazak(){
        return $this->hasMany(Ataza::class);
    }

}
