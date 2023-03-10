<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Jugador extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = ['pivot'];
    //protected $with =['pareja'];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function parejas(){
        return $this->belongsToMany(Pareja::class);
    }

}
