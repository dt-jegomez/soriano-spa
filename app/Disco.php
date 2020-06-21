<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    protected $table = 'discos';
    protected $fillable = [
        'nombre',
        'album', 
        'artista',
        'genero', 
        'anio',
        'foto',
    ];

    public function scopeListInteres($query){
        return $query->select('artista', 'genero')->listaPluck();
    }
    public function scopeListaPluck($query){
        $a =  $query->get()->pluck('artista')->unique();
        $b =  $query->get()->pluck('genero')->unique();

        return $a->concat($b);
    }
}
