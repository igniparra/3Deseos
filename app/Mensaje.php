<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model{

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

    public function pendientes(){
        $envios =  WhatsappEnviado::where('estado_id', 1)->first();
        if($envios != null){
            return true;
        }else{
            return false;
        }
    }

}
