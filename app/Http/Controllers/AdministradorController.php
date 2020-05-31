<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\User_role;
use App\Ayuda;
use App\AyudaRuta;
use Session;
use Auth;
use Mail;
use File;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class AdministradorController extends BaseController{

    /* -------- Usuarios ----------*/
    public function usuarios($edit = null){
        if($edit != null){
            $usuarioEdit = User::find($edit);
        }else{
            $usuarioEdit = null;
        }
        $usuarios = User::where('active', 1)->orderBy('name', 'asc')->get();
        $usuariosInactivos = User::where('active', 0)->orderBy('name', 'asc')->get();
        $ddRoles = Role::orderBy('id', 'asc')->pluck('description','id');

        return view('administrador.usuarios', ['usuarios' => $usuarios, 'usuariosInactivos' => $usuariosInactivos, 'usuarioEdit' => $usuarioEdit, 'ddRoles' => $ddRoles]);
    }

    public function usuarioGuardar(Request $request){
        $this->validate($request, array(
            'name'=>'required|max:50',
            'email'=>'required|email|max:50|unique:users,email',
            'img'=>'image',
        ), $this->messages);

        $usuario = new User;
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt(str_random(16));
        if ($request->file('img') != null) {
            $fileName = str_random(16).".".$request->file('img')->extension();
            $request->file('img')->move(base_path() . '/public/images/users/', $fileName);
            $usuario->img = '/images/users/'. $fileName;
        }else{
            $usuario->img = '/images/users/default.png';
        }
        $usuario->save();

        $userRol = new User_role;
        $userRol->user_id = $usuario->id;
        $userRol->role_id = $request->input('rol');
        $userRol->save();

        $token = Password::getRepository()->create($usuario);
        try{
            Mail::send('emails.nuevoUsuario', ['token' => $token, 'usuario' =>$usuario], function (Message $message) use ($usuario) {
                $message->from('info@invita-me.com', 'Invita ME');
                $message->to($usuario->email);
                $message->subject($usuario->nikname.' Bienvenido a Invita ME');
            });
        }
        catch(\Exception $e){
            //
        }
        Session::flash('success', 'El Usuario se genero exitosamente!<br>Le enviamo un email a '.nickname().' para que continue con la configuracion de su cuenta.');

        return redirect()->action('AdministradorController@usuarios');
    }

    public function usuarioActualizar(Request $request, $id){
        $this->validate($request, array(
            'name'=>'required|max:50',
            'email'=>'required|email|max:50|unique:users,email,'.$id,
            'img'=>'image',
        ), $this->messages);

        $usuario = User::find($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        if ($request->file('img') != null) {
            if($usuario->img != '/images/users/default.png'){
                File::delete(base_path()."/public/images/users/".$usuario->img);
            }
            $fileName = str_random(16).".".$request->file('img')->extension();
            $request->file('img')->move(base_path() . '/public/images/users/', $fileName);
            $usuario->img = '/images/users/'. $fileName;
        }
        if ($request->input('imgReset') == 1) {
            File::delete(base_path()."/public/images/users/".$usuario->img);
            $usuario->img = '/images/users/default.png';
        }
        $usuario->save();

        Session::flash('success', 'El Usuario se actualizo exitosamente!');

        return redirect()->action('AdministradorController@usuarios');
    }

    public function usuarioEliminar($id){
        if(Auth::User()->id != $id){
            User_role::where('user_id', $id)->delete();
            $user = User::find($id);
            $user->password = bcrypt(str_random(25));
            $user->active = 0;
            $user->save();
            Session::flash('success', 'El Usuario se elimino exitosamente!');
        }else{
            Session::flash('fail', 'No te puedes eliminar a ti mismo!');
        }
        return redirect()->action('AdministradorController@usuarios');
    }

    public function usuarioReset($id){
        $usuario = User::find($id);

        $token = Password::getRepository()->create($usuario);
        $name = explode(" ", $usuario->name);
        $usuario->setAttribute('nickname', $name[0]);

        Mail::send('emails.resetPass', ['token' => $token, 'usuario' =>$usuario], function (Message $message) use ($usuario) {
            $message->from('info@invita-me.com', 'Invita ME');
            $message->to($usuario->email);
            $message->subject($usuario->nikname.' Recuperar Contraseña');
        });

        Session::flash('success', 'Se le envio un link a '.$usuario->name.' al email '.$usuario->email.' para que pueda restablecer su contraseña!');

        return redirect()->action('AdministradorController@usuarios');
    }

    public function usuarioActivar($id){
        $usuario = User::find($id);
        $usuario->active = 1;
        $usuario->save();

        $token = Password::getRepository()->create($usuario);

        Mail::send('emails.nuevoUsuario', ['token' => $token, 'usuario' =>$usuario], function (Message $message) use ($usuario) {
            $message->from('info@invita-me.com', 'Invita ME');
            $message->to($usuario->email);
            $message->subject($usuario->nikname.' Bienvenido a Invita ME');
        });

        Session::flash('success', 'El Usuario se reactivo exitosamente!<br>Le enviamo un email a '.$usuario->nickname().' para que continue con la configuracion de su cuenta.');

        return redirect()->action('AdministradorController@usuarios');
    }

    public function usuarioRol($user, $rol, $es){
        if(Auth::User()->id == $user && $rol == 1){
            Session::flash('fail', 'No te puedes quitar el permiso de Administrador!');
            return redirect()->action('AdministradorController@usuarios');
        }
        if($es){ // Saco Permiso
            $aux = User_role::select()->where('user_id', '=', $user)->where('role_id', '=', $rol)->first();
            User_role::find($aux->id)->delete();
        }else{ // Agrego Permiso
            $userRol = new User_role;
            $userRol->user_id = $user;
            $userRol->role_id = $rol;
            $userRol->save();
        }
        return redirect()->action('AdministradorController@usuarios');
    }

    // Var //
    private $pagination = 25;
    private $messages = [
        'name.required'=> 'El nombre es obligatoria.<br>',
        'name.max' => 'El nombre es muy largo.<br>',
        'email.required'=> 'El email es obligatorio.<br>',
        'email.email'=> 'El email no es valido.<br>',
        'email.max'=> 'El email es muy largo.<br>',
        'email.unique'=> 'El email ya existe.<br>',
        'celular.required'=> 'El celular es obligatoria.<br>',
        'celular.max' => 'El celular es muy largo.<br>',
        'nacimiento.required'=> 'La fecha de nacimiento es obligatoria.<br>',
        'img.image' => 'La imagen deve ser jpeg, png, bmp, gif, o svg.<br>',
        'nombre.required' => 'El nombre es obligatoria.<br>',
        'nombre.max' => 'El nombre es muy largo.<br>',
        'telefono.max' => 'El nombre es muy largo.<br>',
        'password.required'=> 'La contraseña es obligatoria.<br>',
        'password_confirm.required'=> 'La confirmacion contraseña es obligatoria.<br>',
        'password_confirm.same'=> 'Las contraseñas deben ser iguales.<br>',
        'titulo.max'=> 'El titulo es muy larga, hasta 100 caracteres.<br>',
        'descripcion.max'=> 'La descripcion es muy larga, hasta 1000 caracteres.<br>',
    ];

    public function __construct(){
        parent::__construct();
        $this->middleware('auth');
    }
}
