<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervalo extends Model
{
    use HasFactory;

    public function jugador(){
        return $this->belongsTo(User::class);
    }

    public function pista(){
        return $this->belongsTo(Pista::class);
    }
}
