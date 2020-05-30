<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

use App\User;
use Mail;
use Session;

class ResetPasswordController extends Controller{
    use ResetsPasswords;

    protected $redirectTo = '/reset/redirect';

    public function showResetForm($token, $email){
        return view('auth.passwords.reset', ['token'=>$token, 'email'=>$email]);
    }

    public function email(Request $request){
        $messages = [
            'email.email'=> 'El correo electronico no es valido.<br>',
        ];

        $this->validate($request, array(
            'email'=>'required|email',
        ), $messages);

        $usuario = User::where('email', $request->input('email'))->first();

        if($usuario != null){
            $token = Password::getRepository()->create($usuario);
            $name = explode(" ", $usuario->name);
            $usuario->setAttribute('nickname', $name[0]);

            Mail::send('emails.resetPass', ['token' => $token, 'usuario' =>$usuario], function (Message $message) use ($usuario) {
                $message->from('info@input-data.com', '3 Deseos');
                $message->to($usuario->email);
                $message->subject($usuario->nikname.' Recuperar Contraseña');
            });
        }

        Session::flash('success', 'Te enviamos un link a tu email para que puedas restablecer la contraseña!');

        return redirect('/password/reset');
    }

    public function resetRedirect(){
        if(Auth::user()->hasRole('administrador')){
            return redirect()->route('administrador.usuarios');
        }
        if(Auth::user()->hasRole('organizador')){
            return redirect()->route('organizador.invitados');
        }
    }

    public function __construct()
    {
        $this->middleware('guest');
    }
}
