<?php
namespace App\Http\Controllers;

use Request;
//use App\Obra;
//use App\Log;
//use App\Ayuda;
//use App\AyudaRuta;
use View;

class BaseController extends Controller
{
    public function __construct() {
        /* -------- Obras ----------*/
        //$obras = Obra::orderBy('id', 'asc')->get();
        //View::share('obras', $obras);


        /* -------- Log ----------
        $flag = 0;
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $logs = Log::where('fin', '>', date("Y-m-d H:i:s", time()-600))->get();
        foreach ($logs as $log) {
            if($log->ip == $this->getIp()){
                date_default_timezone_set('America/Argentina/Buenos_Aires');
                $date = date('Y-m-d H:i:s', time());
                $log->fin = $date;
                $log->inicio = $log->inicio;
                $log->hash = bcrypt($date);
                $log->save();
                $flag++;
            }
        }
        if($flag == 0){
            $log = new log;
            $log->ip = $this->getIp();
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $date = date('Y-m-d H:i:s', time());
            $log->inicio = $date;
            $log->fin = $date;
            $log->hash = bcrypt($date);
            $log->save();
        }
        */
    }

    private function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }

}
