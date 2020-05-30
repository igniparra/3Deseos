<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chico extends Model{

    public function genero(){
        return $this->belongsTo('App\Genero', 'genero_id', 'id');
    }

    public function gusto(){
        return $this->belongsTo('App\Categoria', 'categoria_id', 'id');
    }
}
