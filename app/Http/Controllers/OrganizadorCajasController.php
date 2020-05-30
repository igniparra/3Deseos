<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mensaje;
use Auth;
use Session;

class OrganizadorCajasController extends BaseController{

    public function preparacion(){

        return view('organizador.cajasPreparacion', []);
    }

    private $messages = [
        'name.required'=> 'El nombre es obligatoria.',
    ];

}
