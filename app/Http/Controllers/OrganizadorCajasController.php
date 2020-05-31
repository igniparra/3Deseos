<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Caja;
use App\Archivo;
use Auth;
use Session;

class OrganizadorCajasController extends BaseController{

    public function preparacion(){

        return view('organizador.cajasPreparacion', []);
    }

    public function controlar(){

        return view('organizador.cajasControlar', []);
    }

    public function validar($id){

        $caja = Caja::find($id);
        $caja->estado_id ++;
        $caja->save();

        Session::flash('success', 'La caja fue validada existosamente!');

        return redirect()->action('OrganizadorCajasController@controlar');
    }

    public function reportar($id){

        $caja = Caja::find($id);
        $caja->estado_id = 13;
        $caja->save();

        Session::flash('warning', 'La caja fue reportada existosamente!');

        return redirect()->action('OrganizadorCajasController@controlar');
    }

    public function repartir(){

        return view('organizador.cajasRepartir', []);
    }

    public function entregar($id){

        $caja = Caja::find($id);
        $caja->estado_id ++;
        $caja->save();

        Session::flash('success', 'La caja fue entregada existosamente!');

        return redirect()->action('OrganizadorCajasController@repartir');
    }

    public function files(Request $request, $id){

        $caja = Caja::find($id);
        $caja->estado_id ++;
        $caja->save();

        if ($request->file('files') != null) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $fileName = str_random(16).".".$file->extension();
                $file->move(base_path().'/public/archivos/', $fileName);
                $file = new Archivo;
                $file->caja_id = $caja->id;
                $file->url =  '/archivos/'. $fileName;
                $file->save();
            }
        }

        Session::flash('success', 'La caja fue entregada y las fotos o videos cargados!');

        return redirect()->action('OrganizadorCajasController@repartir');
    }

    public function repartidas(){

        return view('organizador.cajasRepartidas', []);
    }

    private $messages = [
        'name.required'=> 'El nombre es obligatoria.',
    ];

}
