<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller{

    use AuthenticatesUsers;

    protected $redirectTo = '/organizador/invitados';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $user->last_logIn = date('Y-m-d H:i:s', time());
        $user->save();

        if(Auth::user()->hasRole('administrador')){
            return redirect()->route('administrador.usuarios');
        }
        if(Auth::user()->hasRole('organizador')){
            if(Auth::user()->certificado != null){
                return redirect()->route('organizador.home');
            }else{
                return redirect()->route('organizador.ajustes');
            }
        }
        if(Auth::user()->hasRole('usuario')){
            return redirect()->route('usuario.invitados');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/');
    }
}
