<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pareja extends Model
{
    use HasFactory;

    public function jugadors(){
        return $this->belongsToMany(Jugador::class);
    }

    public function partidas(){
        return $this->belongsToMany(Partida::class)->withPivotValue('sorteo_saque');
    }
}
