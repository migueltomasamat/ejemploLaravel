<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    public function parejas(){
        return $this->belongsToMany(Pareja::class)->withPivot('sorteo_saque');
    }

    public function intervalo(){
        return $this->hasOne(Intervalo::class);
    }
}
