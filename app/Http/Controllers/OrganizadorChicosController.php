<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chico;
use App\Genero;
use App\Categoria;

use Session;
use File;
use Auth;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class OrganizadorChicosController extends BaseController{

    public function chicos($edit = null){
        if($edit != null){
            $edit = Auth::User();
        }

        $ddGeneros = Genero::pluck('nombre', 'id');
        $ddCategorias = Categoria::where('activa', 1)->pluck('nombre', 'id');

        return view('organizador.chicos', ['edit'=>$edit, 'ddCategorias'=>$ddCategorias, 'ddGeneros'=>$ddGeneros]);
    }

    public function guardar(Request $request){

        $this->validate($request, array(
            'nombre'=>'required|max:100',
            'fecha'=>'required',
            'genero_id'=>'required',
            'categoria_id'=>'required',
        ), $this->messages);

        $chico = new chico();
        $chico->organizacion_id = Auth::User()->id;
        $chico->nombre = $request->input('nombre');
        $chico->fecha_nacimiento = date("Y-m-d H:i:s", strtotime($request->input('fecha')));
        $chico->genero_id = $request->input('genero_id');
        $chico->categoria_id = $request->input('categoria_id');
        $chico->save();

        Session::flash('success', 'El chico se guardados exitosamente!');

        return redirect()->action('OrganizadorChicosController@chicos');
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

    public function eliminar($id){

        Chico::find($id)->delete();
        // Chek q no tenga Cajas

        Session::flash('success', 'El chico fue eliminado exitosamente!');

        return redirect()->action('OrganizadorChicosController@chicos');
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
