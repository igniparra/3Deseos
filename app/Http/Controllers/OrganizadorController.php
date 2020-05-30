<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizadorController extends BaseController{

    /* -------- Mensajes ----------*/
    public function home(){

        return view('organizador.home', []);
    }

    private $messages = [
        'name.required'=> 'El nombre es obligatoria.',
    ];

}
