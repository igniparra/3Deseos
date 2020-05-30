<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model{

    public function evento(){
        return $this->belongsTo('App\Evento', 'evento_id', 'id')->first();
    }

    public function estado(){
        $estado = $this->belongsTo('App\MensajeEstado', 'estado_id', 'id')->get();
        return $estado[0]->nombre;
    }

    public function envios(){
        return $this->hasMany('App\WhatsappEnviado', 'mensaje_id', 'id');
    }

}
