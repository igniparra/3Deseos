<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chico extends Model{

    public function gusto(){
        return $this->belongsTo('App\Categoria', 'categoria_id', 'id');
    }

    public function edad(){
        $edad = (strtotime('Y') - strtotime($this->fecha_nacimiento)) / (60*60*25*365);
        return number_format($edad, 0, '', '');;
    }
}
