<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Session;
use File;
use Auth;

class OrganizadorAjustesController extends BaseController{

    public function ajustes($edit = null){
        if($edit != null){
            $edit = Auth::User();
        }
        
        return view('organizador.ajustes', ['edit'=>$edit]);
    }

    public function guardar(Request $request){

        $this->validate($request, array(
            'nombre'=>'required|max:100',
            'direccion'=>'required|max:100',
            'cargo'=>'required|max:100',
            'categoria'=>'required',
            'telefono'=>'required',
            'file'=>'mimes:pdf,jpeg,jpg,bmp,png|max:10000',
        ), $this->messages);

        $usuario = Auth::User();
        $usuario->nombre = $request->input('nombre');
        $usuario->direccion = $request->input('direccion');
        $usuario->cargo = $request->input('cargo');
        $usuario->categoria = $request->input('categoria');
        $usuario->telefono = $request->input('telefono');
        if ($request->file('file') != null) {
            $fileName = str_random(16).".".$request->file('file')->extension();
            $request->file('file')->move(base_path() . '/public/certificados/', $fileName);
            $usuario->certificado = '/certificados/'. $fileName;
        }
        $usuario->save();

        Session::flash('success', 'Los datos fueron guardados exitosamente!');

        return redirect()->action('OrganizadorAjustesController@ajustes');
    }

    public function actualizar(Request $request){

        $this->validate($request, array(
            'nombre'=>'required|max:100',
            'direccion'=>'required|max:100',
            'cargo'=>'required|max:100',
            'categoria'=>'required',
            'telefono'=>'required',
        ), $this->messages);

        $usuario = Auth::User();
        $usuario->nombre = $request->input('nombre');
        $usuario->direccion = $request->input('direccion');
        $usuario->cargo = $request->input('cargo');
        $usuario->categoria = $request->input('categoria');
        $usuario->telefono = $request->input('telefono');
        $usuario->save();

        Session::flash('success', 'Los datos fueron actualizados exitosamente!');

        return redirect()->action('OrganizadorAjustesController@ajustes');
    }

    // Var //
    private $messages = [
        'name.required'=> 'El nombre es obligatoria.',
        'name.max' => 'El nombre es muy largo.',
        'email.required'=> 'El email es obligatorio.',
    ];

    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }

}
