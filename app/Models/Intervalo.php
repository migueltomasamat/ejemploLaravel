<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervalo extends Model
{
    use HasFactory;

    public function user(){
        return $this->BelongsTo(User::class);
    }

    public function pista(){
        return $this->belongsTo(Pista::class);
    }
}
