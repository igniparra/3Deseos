<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Caja;

class User extends Authenticatable
{
    use Notifiable;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Add
    public function roles(){
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name', $role)->first()) {
            return 1;
        }
        return 0;
    }

    public function idRole($role){
        if ($this->roles()->where('name', $role)->first()) {
            $aux = $this->roles()->where('name', $role)->first();
            return $aux->id;
        }
        return false;
    }

    public function nickname(){
        $name = explode(" ", $this->name);
        return $name[0];
    }

    public function chicosActivos(){
        return $this->hasMany('App\Chico', 'organizacion_id', 'id')->where('activo', 1);
    }

    public function chicosInactivos(){
        return $this->hasMany('App\Chico', 'organizacion_id', 'id')->where('activo', 0);
    }

    public function cajasPreparacion(){
        $cajas = Caja::where('estado_id', '<=', 8)->get();
        foreach ($cajas as $key => $caja) {
            if($caja->chico->organizacion_id != $this->id){
                unset($cajas[$key]);
            }
        }
        return $cajas;
    }

    public function cajasControlar(){
        $cajas = Caja::where('estado_id', 9)->get();
        foreach ($cajas as $key => $caja) {
            if($caja->chico->organizacion_id != $this->id){
                unset($cajas[$key]);
            }
        }
        return $cajas;
    }

    public function cajasRepartir(){
        $cajas = Caja::where('estado_id', 10)->get();
        foreach ($cajas as $key => $caja) {
            if($caja->chico->organizacion_id != $this->id){
                unset($cajas[$key]);
            }
        }
        return $cajas;
    }

    public function cajasRepartidas(){
        $cajas = Caja::whereIn('estado_id', [11,12])->get();
        foreach ($cajas as $key => $caja) {
            if($caja->chico->organizacion_id != $this->id){
                unset($cajas[$key]);
            }
        }
        return $cajas;
    }

    public function cajasReportadas(){
        $cajas = Caja::where('estado_id', 13)->get();
        foreach ($cajas as $key => $caja) {
            if($caja->chico->organizacion_id != $this->id){
                unset($cajas[$key]);
            }
        }
        return $cajas;
    }
}
