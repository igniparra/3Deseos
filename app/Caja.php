<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model{

    public function donante(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function estado(){
        return $this->belongsTo('App\CajaEstado', 'estado_id', 'id');
    }

    public function chico(){
        return $this->belongsTo('App\Chico', 'chico_id', 'id');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id', 'id');
    }

    public function archivos(){
        return $this->hasMany('App\Archivo', 'caja_id', 'id');
    }
}
