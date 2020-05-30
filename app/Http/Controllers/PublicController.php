<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Invitado;
use App\EventoInvitado;
use App\Comida;


use Session;
use Auth;
use Mail;
use File;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class PublicController extends BaseController{

    public function web($token_evento, $token_invitado = null){
        if($token_evento != null){
            $evento = Evento::where('token', $token_evento)->first();
        }else{
            $evento = null;
        }
        if($token_invitado != null){
            $invitado = Invitado::where('token', $token_invitado)->first();
            if($invitado->evento($token_evento)){ // Si esta invitado
                if(0){ //ver estoado
                    $invitado = null;
                }
            }else{
                $invitado = null;
            }
        }else{
            $invitado = null;
        }
        $ddComida = Comida::pluck('nombre', 'id');
        $ddComida[1] = "No Asistira";
         //si no encuentra la web tirar error

        return view('webs.'.$token_evento, ['evento' => $evento, 'invitado' => $invitado, 'ddComida' => $ddComida]);
    }

    public function confrimar(Request $request, $tokenEvento, $tokenInvitado){
        $evento = Evento::where('token', $tokenEvento)->first();
        //dd($request->input());

        if($evento->comida != NULL)
            foreach ($request->input() as $key => $row) {
                if($key != '_token'){
                    if($row  != 1){
                        $ei = EventoInvitado::where('invitado_id', $key)->where('evento_id', $evento->id)->first();
                        $ei->estado_id = 3; //Confirmado
                        $ei->comida_id = $row;
                        $ei->save();
                    }else{
                        $ei = EventoInvitado::where('invitado_id', $key)->where('evento_id', $evento->id)->first();
                        $ei->estado_id = 4; // No asistira
                        $ei->comida_id = 7; // No come
                        $ei->save();
                    }
                }
            }
        else{
            foreach ($request->input() as $key => $row) {
                if($key != '_token'){
                    if($row  == 3){
                        $ei = EventoInvitado::where('invitado_id', $key)->where('evento_id', $evento->id)->first();
                        $ei->estado_id = 3; //Confirmado
                        //$ei->comida_id = $row;
                        $ei->save();
                    }else{
                        $ei = EventoInvitado::where('invitado_id', $key)->where('evento_id', $evento->id)->first();
                        $ei->estado_id = 4; // No asistira
                        //$ei->comida_id = 7; // No come
                        $ei->save();
                    }
                }
            }
        }
        // Confirmacion por whapp?

        //Session::flash('success', 'Confirmacion recibida existosamente!');

        return redirect()->action('PublicController@web', [$tokenEvento, $tokenInvitado]);
    }


    // Var //
    private $messages = [
    ];
}
