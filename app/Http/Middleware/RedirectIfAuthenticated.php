<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @param  string|null  $guard
    * @return mixed
    */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->check()){
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
                dd("no sos permitido");
                return redirect()->route('organizador.home');
            }
        }

        return $next($request);
    }
}
